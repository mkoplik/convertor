<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $amount = $_POST["amount"];
    $from_currency = $_POST["from_currency"];
    $to_currency = $_POST["to_currency"];
    

    $api_url = "https://open.er-api.com/v6/latest/{$from_currency}";
    $response = file_get_contents($api_url);
    $exchange_rates = json_decode($response, true);

  
    $conversion_rate = $exchange_rates["rates"][$to_currency];
    $converted_amount = $amount * $conversion_rate;

    
    $result = "<p>{$amount} {$from_currency} = {$converted_amount} {$to_currency}</p>";
}
require_once("index.php");
?>
