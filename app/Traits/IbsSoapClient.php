<?php
namespace App\Traits;
use SoapClient;
use App\Models\Shipment;
use App\Models\ShipmentTracking;

trait ibsSoapClient 
{
    public function getAWBbyId($id)
    {
        $shipment = Shipment::all();
        $this->getAWBbyObject($shipment);
    }

    public function getAWBbyObject1($shipment)
    {

        //Place order via OSMS SOAP API, AWB will be gernerated and return with a download link 


        //IBS Client AC Info
        $pmsLoginAction = 'http://osms.sf-express.com/osms/services/OrderWebService?wsdl';
        $apiService = "ReConfrimWeightOrder";
        $checkword = 'fxxxxxxxxxxxxxxx'; // API key
        $creditAccount = "0xxxxxxx1671"; //Client Credit account 
        $express_type = "229";
        $osms_Account = 'OSMS_6094';  //Client API account  *


        $xml = '<?xml version="1.0" encoding="utf-8"?>'.
        '<Request service="'. $apiService.'" lang="zh_CN">'.
        '<Head>'.$osms_Account.'</Head>'.
        '<Body>'.
        '<Order'.
        ' orderid="'.$shipment->reference_no_1.'"'.
        ' reference_no1="'.$shipment->reference_no_1.'"'.
        ' express_type="'.$express_type.'"'.
        ' custid="'.$creditAccount.'"'.
        ' tax="DDP"'.
        ' j_company="'.$shipment->j_company.'"'.
        ' j_contact="'.$shipment->j_contact.'"'.
        ' j_tel="'.$shipment->j_tel.'"'.
        ' j_mobile="'.''.'"'.
        ' j_address="'.$shipment->j_address.'"'.
        ' j_province="'.$shipment->j_province.'"'.
        ' j_city="'.$shipment->j_city.'"'.
        ' j_county="'.$shipment->j_county.'"'.
        ' j_country="'.$shipment->j_country.'"'.
        ' j_post_code="'.$shipment->j_post_code.'"'.
        ' d_company="'.$shipment->d_company.'"'.
        ' d_contact="'.$shipment->d_contact.'"'.
        ' d_tel="'.$shipment->d_tel.'"'.
        ' d_mobile="'.$shipment->d_mobile.'"'.
        ' d_address="'.$shipment->d_address.'"'.
        ' d_province="'.$shipment->d_province.'"'.
        ' d_city="'.$shipment->d_city.'"'.
        ' d_county="'.$shipment->d_county.'"'.
        ' d_country="'.$shipment->d_country.'"'.
        ' d_post_code="'.$shipment->d_post_code.'"'.
        ' currency="'.$shipment->currency.'"'.
        ' parcel_quantity="'.$shipment->parcel_quantity.'"'.
        ' pay_method="'.$shipment->pay_method.'"'.
        ' tax_pay_type="'.$shipment->tax_pay_type.'"'.
        ' print_size="7" >';
    
        $cargoContents='';
        foreach($shipment->shipmentCargos as $cargo){
            $cargoContents .='<Cargo'.
            ' name="'.$cargo->name.'"'.
            ' count="'.$cargo->count.'"'.
            ' total_value="'.$cargo->total_value.'"'.
            ' currency="'.$cargo->currency.'"'.
            ' unit="'.$cargo->unit.'"'.
            ' amount="'.$cargo->amount.'"'.
            ' hs_code="'.$cargo->hs_code.'"'.
            ' source_area="'.$cargo->source_area.'"></Cargo>';
        }
        
        $xml .=$cargoContents.'</Order></Body></Request>';
 
        set_time_limit(0);
        header('Content-type:text/json;charset=UTF-8');


        //base64 encryption
        $data=base64_encode($xml);

        $validateStr = base64_encode(md5($xml.$checkword, false));

        $client = new SoapClient ($pmsLoginAction);

        $result=$client->sfexpressService(array('data'=>$data,'validateStr'=>$validateStr,'customerCode'=> $osms_Account));
       // $xmlObject = simplexml_load_string($result);
       $string = <<<END
       $result->Return
       END;       
       $xmlObj=simplexml_load_string($string);

        if($xmlObj->Head == 'OK')
        {
            $saveRsponse=array(
                "sf_awb_url" => $xmlObj->Body->OrderResponse->printUrl,
                "api_response" => $xmlObj->asXML(),               
            );
            $shipmentTracking = ShipmentTracking::create($saveRsponse);
            //print_r($xmlObj->Head); 
            //print_r($xmlObj->Body->OrderResponse->mailNo);
            //print_r($xmlObj->Body->OrderResponse->printUrl); //Returned AWB in PDF format
            //print_r($xmlObj->Body->OrderResponse->invoiceUrl);
            //print_r($xmlObj->Body->OrderResponse->Identity);
            //print_r($xmlObj->Body->OrderResponse->IdentityUpload);

            $para_array= explode('mailno=',$xmlObj->Body->OrderResponse->printUrl);
            $awb_ref = end($para_array);

            $shipment->mailno = $xmlObj->Body->OrderResponse->mailNo;
            $shipment->tracking_id = $shipmentTracking->id;
            $shipment->sf_api_ref = $awb_ref;
            $shipment->save(); 
            return $xmlObj->Body->OrderResponse->mailNo;

        }

    }


}
