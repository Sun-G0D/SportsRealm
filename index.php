<?php include_once("index.html");

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://api.bit.io/api/v1beta/repos/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => [
    "Accept: application/json",
    "Authorization: Bearer 3DD9L_zbptdCr4Xa7XbRB6whRpzj2"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$juice = 3+4;

echo $juice;
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

?>