<?php
/**
 * Ověření podpisu zprávy ze serveru
 */
$a = file_get_contents("http://payway.bubileg.cz/api");
$gate="-----BEGIN PUBLIC KEY-----
MFwwDQYJKoZIhvcNAQEBBQADSwAwSAJBAK9i4eHStEr9M/Iix2WbQvB+i71H/eb6
da9M+/HvIBXywE+Q+bpTq2IGNK+EMWvVsQ0wNfLiBVez+vzA4r6JdC8CAwEAAQ==
-----END PUBLIC KEY-----";
$raw = json_decode($a, true);
$signature = $raw["signature"];
unset($raw["signature"]);
$data = implode("|", $raw);
$key = openssl_get_publickey($gate);
$siganture = base64_decode($signature);
var_dump(openssl_verify($data, $siganture, $key));
?>
