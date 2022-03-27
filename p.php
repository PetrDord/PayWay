<?php
/**
 * Poslat zprávu echo, kterou server akceptuje a odpoví bez chybové hlášky.
 */
$data = array("merchantId"=>"727aa02b", "dttm"=>date("Ymdhis"), "signature"=>"-----BEGIN PRIVATE KEY-----
MIIBUwIBADANBgkqhkiG9w0BAQEFAASCAT0wggE5AgEAAkEAt3DAZHOCrD1mUb2K
zaJarqlJsNCpBrp/kSHO9N4n1P3wNG1KO51h92LoUQ+JSNgLl7VUxvlc525n1dYl
E31WuwIDAQABAkATcS3S97Mn0jIgA7jMZqK51FNtHBBuGCIhHbYzmcAbAMkZsNfD
MDlTyfZsd8dgey7y0sSTbniNZlUzKa2ttUXBAiEA31jz/jEMtuNjVMbEp/xDsMkr
Todh+X99eNYb8JBjhSsCIQDSQjrPUf32ocWOu6v2vVZiZhm10mLVJcoQxwLHqbDM
sQIgYm6eobFWTCfsuAkd1Hb+EiSmnGZYDJBeaOnbyGqqIZ8CIHX5O05ATyMnOdYQ
bziOm/2yFBL07QdzoKExSNoG2HDBAiBX89bE4YvpBiYurrkkzIq5EsMVlZPNgUTd
jx3tf9EZdg==
-----END PRIVATE KEY-----");
$data["signature"] = base64_encode($data["signature"]);
$c = curl_init();
curl_setopt($c, CURLOPT_URL, "http://payway.bubileg.cz/api/echo");
curl_setopt($c, CURLOPT_POST, 1);
curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$r = curl_exec($c);
curl_close($c);
var_dump($r);


