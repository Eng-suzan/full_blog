<?php

function validateRequired($value, $fildName)
{
    return empty($value) ? "$fildName is required" : null;
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? null : "invalid email";
}

function validatepassword($password)
{
    if(strlen($password)<6){
        return "password must be 6 char";
    }
    if(!preg_match("/[A-Z]/",$password)){
        return "password must contain at least one uppercase letter";
    }
    if(!preg_match("/[a-z]/",$password))
{
    return "password must contain at least one lowercase letter";

}
if(!preg_match("/[0-9]/",$password)){
    return "password must contain at least one number";
}}
function validateregister($name,$email,$phone,$password){
    
   $fields = [
    "name"=>$name,
    "email"=>$email,
    "phone"=>$phone,
    "password"=>$password,
];
foreach($fields as $fildName=>$value){
    $error = validateRequired($value,$fildName);
    if($error){
        return $error;
    }
   }
   if($error = validateEmail($email)){
    return $error;
   }
   if($error = validatepassword($password)){
    return $error;
   }
}
   function validateLogin($email,$password){
    $fields = [
        "email"=>$email,    
        "password"=>$password,
    ];
    foreach($fields as $fildName=>$value){
        $error = validateRequired($value,$fildName);
        if($error){
            return $error;
        }
       }
       if($error = validateEmail($email)){
        return $error;
       }
       if($error = validatepassword($password)){
        return $error;
       }
   }


