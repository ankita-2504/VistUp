<?php
function Encrypted($string) {
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $encryption_iv = '1234567891011121';
    $encryption_key = "Digiportal";
    $encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv);
    return $encryption;
}
function Decrypted($string) {
    $ciphering = "AES-128-CTR";
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;
    $decryption_iv = '1234567891011121';
    $decryption_key = "Digiportal";
    $encryption = openssl_decrypt($string, $ciphering, $decryption_key, $options, $decryption_iv);
    return $encryption;
}
echo Encrypted("Hello Sajal Das.");	
echo Decrypted("Ltpc9W+e4NB+D22TWF+Gog==");
?>