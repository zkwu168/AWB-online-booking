<?php
use App\Http\AdyenClient;

// Set your X-API-KEY with the API key from the Customer Area.
$client = new \Adyen\Client();

$client->setEnvironment(\Adyen\Environment::TEST);
$client->setXApiKey("AQEvhmfuXNWTK0Qc+iSDtEEAl9a+e7hoOKFlaEB16VSfuhs1Q27dlEdRbPee67pgIUMQwV1bDb7kfNy1WIxIIkxgBw==-ha5dExr2IxJAyjh4KdrbSPIrPYTL6CuRBjcbcNB3+7A=-(N~5$xB4?s?[~a3h");
$service = new \Adyen\Service\Checkout($client);
 
$params = array(
    "countryCode" => "NL",
    "shopperLocale" => "nl-NL",
    "amount" => array(
        "currency" => "EUR",
        "value" => 1000
    ),
    "channel" => "Web",
    "merchantAccount" => "SFEXPRESSEUROPECOLTDECOM"
);
$result = $service->paymentMethods($params);
dd($result);
?>