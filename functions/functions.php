<?php


$pswLength = null;

if (!empty($_GET['typeNumber'])){
    $pswLength = checkData($_GET['typeNumber']);
}

function checkData ($data){
    if (!is_numeric($data)){
        return false;
    }
    return $data;
}

function generatePsw ($length) {
    $password = '';
    $lowerLet = 'abcdefghijklmnopqrstuvwxyz';
    $capitalLet = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $numbers =  '0123456789' ;
    $specialChar = '!@#$%^&*()_+-={}[]|:;"<>,.?/';

    $allChar = [ $lowerLet , $capitalLet , $numbers , $specialChar ];


    
    foreach ($allChar as $char){
        $password .= $char[array_rand(str_split($char))];
    }

    while (strlen($password) < $length){
        $random = $allChar[array_rand($allChar)];
        $password .= $random[array_rand(str_split($random))];
    }

    return $password;
}

?>