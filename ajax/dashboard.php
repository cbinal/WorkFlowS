<?php
/* 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */
function getCurrenciesMB($params){
  // echo json_encode($params);
  $folder = $params["year"].$params["month"];
  $file = $params["day"].$params["month"].$params["year"];
  $url = "https://www.tcmb.gov.tr/kurlar/$folder/$file.xml";
  if($params["day"]==0){$url = "https://www.tcmb.gov.tr/kurlar/today.xml";}
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HEADER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  $response = curl_exec($curl);
  if ($response === false) {
      throw new Exception\ConnectionFailed('Sunucu Bağlantısı Kurulamadı: ' . $curl->error());
  }
  curl_close($curl);
  $jsonResponse = (array) simplexml_load_string($response);
  // print_r($jsonResponse["Currency"][0]);
  if($params["requestedCurr"]!='') {
    // echo "requestedCurr doğru geldi.";
    foreach($jsonResponse["Currency"] as $item){
      $arrItem = (array) $item;
      // print_r($arrItem["@attributes"]);
      if($arrItem["@attributes"]["Kod"]==$params["requestedCurr"]){
        echo json_encode($item);
      }
    }
  } else {
    echo json_encode((array) simplexml_load_string($response));
  }
  // echo "<br>".json_encode($doviz->Currency[0]->BanknoteSelling);
}

function api ($tickers,$fields=true) {
  // set url
  $url = 'http://query.yahooapis.com/v1/public/yql';
  $url .= '?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20%28%22'.implode(',',$tickers).'%22%29&env=store://datatables.org/alltableswithkeys';

  // set fields
  if ($fields===true || empty($fields)) {
      $fields = array(
              'Symbol','Name','Change','ChangeRealtime','PERatio',
              'PERatioRealtime','Volume','PercentChange','DividendYield',
              'LastTradeRealtimeWithTime','LastTradeWithTime','LastTradePriceOnly','LastTradeTime',
              'LastTradeDate'
              );
  }

  // make request
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $resp = curl_exec($ch);
  $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch); 

  // parse response
  if (!empty($fields)) {
      $xml = new SimpleXMLElement($resp);
      $data = array();
      $row = array();
      $time = time();
      if(is_object($xml)){
          foreach($xml->results->quote as $quote){
              $row = array();
              foreach ($fields as $field) {
                  $row[$field] = (string) $quote->$field;
              }
              $data[] = $row;
          }
      }
  } else {
      $data = $resp;
  }

  echo json_encode($data);
}

function getCurrenciesInstant($params){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=".$params["to"]."&from=".$params["from"]."&amount=1",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: text/plain",
      "apikey: pG8Ms7Ffen3aYc8XNQL9Xraoa9wPd2Z1"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  echo json_encode($response);
  // echo "<br>".json_encode($doviz->Currency[0]->BanknoteSelling);
}

function getCurrenciesInstantG($params){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.google.com/search?q=usd",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: text/plain"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
  ));
  $response = curl_exec($curl);
  curl_close($curl);
  echo json_encode($response);
  // echo "<br>".json_encode($doviz->Currency[0]->BanknoteSelling);
}

$action = $_POST['action'];
$params = $_POST['params'];
/* 
$action = $_GET['action'];
$folder = $_GET['folder'];
$file = $_GET['file'];
 */
if (function_exists($action)) {
  call_user_func($action,$params);
} else {
  echo "bulunamadı.".$action;
}
