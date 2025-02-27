<?php

$data=array('username' =>"Test", 'password'=>"Test", 'to' =>"0912...,0912...", 'from' => "500000000", "text" =>"این یک پیامک تست است");
$post_data = http_build_query($data);
$handle = curl_init('https://rest.payamak-panel.com/api/SendSMS/SendSMS');
curl_setopt($handle, CURLOPT_HTTPHEADER, array(
    'content-type' => 'application/x-www-form-urlencoded'
));
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
$response = curl_exec($handle);
var_dump($response);