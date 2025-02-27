<?php
if (isset($_POST['username'])){
    if (isset($_POST['password'])){
        if (isset($_POST['to'])){
            if (isset($_POST['from'])){
                if (isset($_POST['text'])){
                    $data = [
                        'UserName' => $_POST['username'],
                        'PassWord' => $_POST['password'],
                        'To' => $_POST['to'],
                        'From' => $_POST['from'],
                        'Text' => $_POST['text'],
                        'IsFlash' => false
                    ];
                    $fields_string = "";
                        if (!is_null($data)) {
                            $fields_string = http_build_query($data);
                        }
                        $handle = curl_init();
                        curl_setopt($handle, CURLOPT_URL, "https://rest.payamak-panel.com/api/SendSMS/SendSMS");
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($handle, CURLOPT_POST, true);
                        curl_setopt($handle, CURLOPT_POSTFIELDS, $fields_string);
                        $response     = curl_exec($handle);
                        $code         = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        $curl_errno   = curl_errno($handle);
                        $curl_error   = curl_error($handle);
                        if ($curl_errno) {
                            echo $curl_errno;
                            return;
                        }
                        curl_close($handle);
                        echo "Ok";
                        echo "\n";
                        echo $response;
                        
                }else{
                        echo "Error : Text";
                }
            }else{
                    echo "Error : from";
            }       
        }else{
                echo "Error : to";
        }          
    }else{
            echo "Error : password";
    }              
}else{
        echo "Error : username";
}    