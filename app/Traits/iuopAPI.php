<?php
namespace App\Traits;

use App\Models\Shipment;
use App\Models\ShipmentTracking;

trait iuopAPI 
{
  //real account
    private $customerCode="ICxxxxxxxxxxx24"; 
    private $appKey="vxxxxxxxxxxxxxxm"; 
    private $appSecret="b6xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx528a"; 
    private $apiURL="https://iuop.sf.global/iuop-api/order/service"; 
    private $importCustomsType = 2 ;

    public function orderService($shipment,$orderOperateType=1)
    {
        $timestamp = round(microtime(true) * 1000);
       
        $cargoContents='';
        foreach($shipment->shipmentCargos as $cargo){
            $cargoContents .='{'.
                '"amount":"'.$cargo->amount.'",'.
                '"commodityName":"'.$cargo->name.'",'.
                '"commodityNum":"'.$cargo->count.'",'.
                '"originCountry":"'.$cargo->source_area.'",'.
                '"unit":"'.$cargo->unit.'",'.  
                '"commodityNameEn":"",'.//optional
                '"brand": "",'. //optional
                '"hs_code":"'.$cargo->hs_code.'",'.  //optional    
                '"weight":""'. 
            '},';
        }
        $cargoContents = rtrim($cargoContents,",");  

        $json = '{'.
            '"sysSource":"MySystem",'.
            '"requestId":"'.$timestamp.'",'.
            '"lang":"zh-CN",'.
            '"customerCode":"'.$this->customerCode.'",'.
            '"orderOperateType":'.$orderOperateType.','.
            '"obj":{'.
                '"cargoTypeCode":"C223",'.
                '"customerOrderNo":"'.$shipment->reference_no_1.'",'.
                '"declaredCurrency":"'.$shipment->currency.'",'.
                //'"orderTime":"'.date("Y-m-d H:i:s").'",'.
                '"parcelNum":1,'.
                '"parcelTotalWidth":'.$shipment->status_plus->actual_width.','.
                '"parcelTotalHeight":'.$shipment->status_plus->actual_height.','.
                '"parcelTotalLength":'.$shipment->status_plus->actual_length.','.
                '"parcelTotalWeight":"'.$shipment->actual_weight.'",'.
                '"parcelWeightUnit":"KG",'.
                '"pickupAppointTime":"",'.
                '"pickupAppointTimeZone":"",'. //Europe/London
                '"pickupType":"0",'.
                '"remark":"",'.
                '"customsInfo":{'.
                    '"importCustomsType":"'.$this->importCustomsType.'",'.
                    '"receiverCountry":"'.$shipment->d_country.'",'.
                    '"senderCountry":"'.$shipment->j_country.'"'.
                '},'.
                '"parcelInfoList":['.
                $cargoContents.

                '],'.
                '"paymentInfo":{'.
                    '"payMethod":"1",'. // shipper pay
                    '"taxPayMethod":"2"'. //receiver pay
                '},'.
                '"senderInfo":{'.
                    '"address":"'.$shipment->j_address.'",'.
                    '"company":"'.$shipment->j_company.'",'.
                    '"contact":"'.$shipment->j_contact.'",'.
                    '"country":"'.$shipment->j_country.'",'.
                    '"email":"'.$shipment->j_email.'",'.
                    '"fixedPhoneCode":"44",'.
                    '"fixedPhoneNumber":"'.$shipment->j_tel.'",'.
                    '"phoneCode":"",'.
                    '"phoneNumber":"",'.
                    '"postCode":"'.$shipment->j_post_code.'",'.
                    '"postingCargoType":"'.$shipment->sender_type.'",'.
                    '"regionFirst":"'.$shipment->j_province.'",'.
                    '"regionSecond":"'.$shipment->j_city.'"'.
                '},'.
                '"receiverInfo":{'.
                    '"address":"'.$shipment->d_address.'",'.
                    '"certCardNo":"'.$shipment->order_cert_no.'",'.
                    '"certType":"'.$shipment->order_cert_type.'",'.
                    '"company":"'.$shipment->d_company.'",'.
                    '"contact":"'.$shipment->d_contact.'",'.
                    '"country":"'.$shipment->d_country.'",'.
                    '"email":"'.$shipment->d_email.'",'.
                    '"eori":"",'.
                    '"fixedPhoneCode":"86",'.
                    '"fixedPhoneNumber":"'.$shipment->d_tel.'",'.
                    '"phoneCode":"",'.
                    '"phoneNumber":"",'.
                    '"postCode":"'.$shipment->d_post_code.'",'.
                    '"postingCargoType":"'.$shipment->receiver_type.'",'.
                    '"regionFirst":"'.$shipment->d_province.'",'.
                    '"regionSecond":"'.$shipment->d_city.'",'.
                    '"regionThird":"",'.
                    '"vat":""'.
                '}'.
            '}'.
        '}';

        $json = $this->json_sort($json);

        $headers = $this->createHeaders('order',$json,$timestamp);
        $result = json_decode($this->postIuopApiQuery($headers,$json)); //Place order and save response from API server




//Parse response message
switch ($orderOperateType) {
    case 1:
        if (is_object($result))
        {

            $sfAwb = $result->data->waybillNo;

            $response = $this->orderResult($shipment->reference_no_1);

            $sfAwbUrl = $response->data->printUrl;
            
            $awb_ref = substr($sfAwbUrl , strpos($sfAwbUrl, "=")+1);

            $saveRsponse=array(
                "sf_awb_url" => $sfAwbUrl,
                "api_response" => json_encode($response),               
            );
            $shipmentTracking = ShipmentTracking::create($saveRsponse);

            $shipment->mailno = $sfAwb;
            $shipment->tracking_id = $shipmentTracking->id;
            $shipment->sf_api_ref = $awb_ref;
            $shipment->save(); 

            return $sfAwb;

        }
      break;
    case 5 :
     
        break;
    default:
        return false;
  }



    }

    public function orderResult($ref)
    {
        $timestamp = round(microtime(true) * 1000);
        
        $json = '{'.
            '"sysSource":"MySystem",'.
            '"requestId":"'.$timestamp.'",'.
            '"lang":"zh-CN",'.
            '"customerCode":"'.$this->customerCode.'",'.
            '"obj":{'.
                '"customerOrderNo":"'.$ref.'"'.
             '}'.
        '}';
        $json = $this->json_sort($json);
        $headers = $this->createHeaders('orderResultQuery',$json,$timestamp);

        return json_decode($this->postIuopApiQuery($headers,$json));
    }


    public function orderDetailsQuery($AWBno)
    {
        $timestamp = round(microtime(true) * 1000);
        
        $json = '{'.
            '"sysSource":"MySystem",'.
            '"requestId":"'.$timestamp.'",'.
            '"lang":"zh-CN",'.
            '"customerCode":"'.$this->customerCode.'",'.
            '"obj":{'.
                '"sfWaybillNo":'.$AWBno."'".
             '}'.
        '}';

        $json = $this->json_sort($json);
        $headers = $this->createHeaders('orderDetailQuery',$json,$timestamp);
        dd(json_decode($this->postIuopApiQuery($headers,$json)));
        return json_decode($this->postIuopApiQuery($headers,$json));
    }

    public function freightQuery()
    {
        $timestamp = round(microtime(true) * 1000);
        
        $json = '{'.
            '"sysSource":"MySystem",'.
            '"requestId":"'.$timestamp.'",'.
            '"lang":"zh-CN",'.
            '"customerCode":"'.$this->customerCode.'",'.
            '"obj":{'.
                '"cargoTypeCode":"C223",'.
                '"receiverCountry":"CN",'.
                '"receiverPostCode":"518003",'.
                '"senderCountry":"GB",'.
                '"senderPostCode":"UB108UF",'.
                '"weight":"12.01"'.
            '}'.
        '}';

        $headers = $this->createHeaders('orderDetailQuery',$json,$timestamp);

        return json_decode($this->postIuopApiQuery($headers,$json));
    }

    private function createHeaders($useMethod,$json,$timestamp)
    {
        $requestId = "828bfxxxxxxxxxxxxxxxxxxxxxxxxx20";
        $strSign =  sprintf("appkey=%s",$this->appKey).
            sprintf("&requestid=%s",$requestId).
            sprintf("&timestamp=%d",(string)$timestamp).
            sprintf("&param_json=%s",$json).
            sprintf("&appsecret=%s",$this->appSecret);
        $sign=sha1($strSign,false);

        $headers = [
            'Content-Type: application/json',
            'appKey: '.$this->appKey,
            'signature: '. $sign,
            'requestId: '. $requestId,
            'timestamp: '. $timestamp,
            'use-method:'. $useMethod,
            'v: 2'
        ];
        return $headers;
    }

    private function postIuopApiQuery($headers,$json)
    {
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_URL,"https://iuop.sit.sf.global/iuop-api/open/iuop-iuop/api/external/order");
        curl_setopt($ch, CURLOPT_URL,$this->apiURL);
        //curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$json);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        return $server_output;
    }


}
