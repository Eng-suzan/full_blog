<?php
if($_SERVER['REQUEST_METHOD'] === 'POST')
{

    $email= $_POST['email'];
    $password= trim($_POST['password']);
  
$error= validateLogin($email,$password);
  if(!empty($error)){
    setMessage("danger",$error);
    header("location:index.php?page=login");
    exit;
  }
  
  if(login_user($email,$password))
    {
      setMessage("success", "Login successful!");
      header("location:index.php");
      exit;
    }
    else{
        setMessage("danger", "Login failed!");
        header("location:index.php?page=login");
        exit;
    }
}