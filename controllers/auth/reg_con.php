<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= trim($_POST['password']);
    $phone= $_POST['phone'];
$error= validateregister($name,$email,$phone,$password);
  if(!empty($error)){
    setMessage("danger",$error);
    header("location:index.php?page=register");
    exit;
  }
  
  if(register_user($name,$email,$phone,$password))
    {
      setMessage("success", "Registration successful!");
      header("location:index.php");
      exit;
    }
    else{
        setMessage("danger", "Registration failed!");
        header("location:index.php?page=register");
        exit;
    }
}