<?php
namespace App\Traits;
use App\Models\Shipment;
use App\Models\ShipmentTracking;
use App\Models\Counters;

use Illuminate\Support\Facades\Storage;

trait YodelFcrClient 
{

    public function genEcrByObject($shipment)
    {

        $noOfRecords = 1;
        $dateStr = date("d/m/Y");
        $timeStr = date("H:i:s");
        $readyDateStr = date('d/m/Y', strtotime(' +1 day'));
        $readyTimeStr = '09:00';
        $readyUnitilTimeStr = '17:00';
        $noOfRecord=sprintf('%08d', 1);
        //Header

        $header1='HD'.$dateStr.$timeStr;
        $header2='000002'."\r\n";

        //RC
        $noOfRecords += 1;
        $rc='RC'.
            $dateStr.
            $timeStr.
            str_pad('SF Express (Europe) Co. Ltd', 35).
            '00000000'.
            '9657703'.
            '3'.
            '                                   '.
            str_pad('SF Express (Europe) Co. Ltd', 35).
            str_pad('Operations Department', 35).
            str_pad('Suite 1, 1 Heathrow Boulevard', 35).
            str_pad('286 Bath Road', 35).
            str_pad('West Drayton', 35).
            str_pad('', 35).
            str_pad('UB7 0DQ', 10).
            'UK'.
            str_pad('MR', 8).
            str_pad('Johnny', 12).
            str_pad('Kong', 35).
            str_pad('', 35).
            str_pad('0743xxxxx', 25)."\r\n" ;    //email

        // 'CR' Collection Header Record
        $noOfRecords += 1;
         $cr='CR'.
            $readyDateStr.
            $readyTimeStr.
            str_repeat(' ', 10).   // Ready until date - Spaces for future use
            $readyUnitilTimeStr.   // Ready until time * Please note that there must be a difference of at least four hours between the ‘Ready at time’ and Ready until time’.
            str_pad($shipment->reference_no_1, 35).  //Customer reference  (35)
            str_repeat(' ', 20).
            str_repeat(' ', 15).
            str_repeat(' ', 10).
            str_repeat(' ', 3).
            str_repeat(' ', 10).
            str_repeat(' ', 5).
            str_repeat(' ', 10).
            str_repeat(' ', 3).
            str_repeat(' ', 35).
            str_repeat(' ', 35).
            str_repeat(' ', 69)."\r\n" ;

        // 'AS' Sender Address Record
        $noOfRecords += 1;
         $as='AS'.
            str_pad($shipment->j_company?: $shipment->j_contact, 35).
            str_pad($shipment->j_contact, 35).
            str_pad($shipment->j_address, 35).    // Address line1
            str_pad('', 35).                      // Address line2
            str_pad($shipment->j_city, 35).
            str_pad($shipment->j_province, 35).
            str_pad($shipment->j_post_code, 10).
            str_pad('UK', 2).                    //Collection Country
            str_pad('', 8).                      //Contact Title
            str_pad('', 12).                     //Contact First Name ot Initials
            str_pad($shipment->j_contact, 35).                      //Contact Surname
            str_pad('', 35).                      //Contact Job title
            str_pad($shipment->j_tel, 20).                      //Contact Telephone
            str_pad($shipment->j_email, 40)."\r\n" ;                     //Contact Email
            
        // 'CA' Special Instruction Record
        //$cr='CA'.
            
           
        // 'CO' Consignment Details
        $noOfRecords += 1;
        $content = $shipment->shipmentCargos[0]->name;

        $co='CO'.
            sprintf('%05d', 1).                     //Consignment Number
            str_pad('2VPR', 4).                   //Service Code
            sprintf('%04d','1').                     //Number of Parcels
            '0001'.                              //Number of Consignments	‘0001’	4	M	0001 to be hard-coded
            sprintf('%08s',number_format($shipment->cargo_total_weight, 2, '.','')).          //Consignment Weight (in kg) , Two decimal places -  NNNNN.NN
            sprintf('%03d',$shipment->cargo_length).
            sprintf('%03d',$shipment->cargo_width).
            sprintf('%03d',$shipment->cargo_height).
            'CM'.
            str_pad('', 20).    //Consignment Sender Reference	Alphanumeric	20	C	Spaces – for future use 
            str_pad($content, 20)."\r\n" ;    //Consignment Contents	Alphanumeric	20	M	Contents

            //  Customs Detais need to be added if shipment id to Norhtern Ireland

        //'AD' Delervery Address Record for Layout 000002 (non Collect+ )
        $noOfRecords += 1;
        $ad='AD'.
            str_pad('SF International Depot, c/o Whistl', 35).
            str_pad('SF Online Booking Service', 35).
            str_pad('Summerhouse Road', 35).      //Address Line1
            str_pad('Moulton Park Industrial Estate', 35).      //Address Line2
            str_pad('Northampton', 35).      //Town
            str_pad('', 35).      //County
            str_pad('NN3 6WD', 10).      //Postcode
            str_pad('United-Kingdom', 20)."\r\n" ;      //Country

        //'PA' Parcel Record (Yodel AWB)
        // $cd='PA'. 

        //'TR' Trailer Record
        $noOfRecords += 1;
        $tr='TR'. 
        sprintf('%08d',$noOfRecords)."\r\n" ;
        
        
        $fcrString= $header1.sprintf('%08d',$noOfRecords).$header2.$rc.$cr.$as.$co.$ad.$tr;

        $fileCount = $this->getFcrCounter();

        $saveFcrToFile="FCR"."9657703.".$fileCount;
    
        Storage::disk('local')->put($saveFcrToFile, $fcrString);
  
    }

    private function getFcrCounter(){
        $count = Counters::where('key', '=', 'yodel_fcr')->first();

        $fileCount=sprintf('%05d', $count->value);
        
        if ($count->value==99999){
            $count->value=1;
        }else{
            $count->value += $count->step;
        }
        
        $count->save();
      
        return $fileCount;
    }



}
