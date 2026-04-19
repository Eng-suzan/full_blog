<?php
//var_dump($_FILES);

//$realpath=realpath(__DIR__ ."/../../assets/img");
//$pathname=$realpath."/".$_FILES['image']['name'];

//move_uploaded_file($_FILES['image']['tmp_name'], $pathname);


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if($_GET['action'] === 'store'){


    $title= $_POST['title'];
    $content= $_POST['content'];
    $image= $_FILES['image'];
  
$error= validatestoreblog($title,$content,$image);
  if(!empty($error)){
    setMessage("danger",$error);
    header("location:index.php?page=create_blog");
    exit;
  }
  
  if(storeblog($title,$content,$image)){
    
      setMessage("success", "Blog created successfully!");
      header("location:index.php?page=blogs");
      exit;
    }
    else{
        setMessage("danger", "Failed to create blog!");
        header("location:index.php?page=create_blog");
        exit;
    }
}
else if($_GET['action'] === 'delete'){
   $id=$_POST['id'];

    if(deleteblog($id)){
    
      setMessage("success", "Blog deleted successfully!");
      header("location:index.php?page=blogs");
      exit;
    }
    else{
        setMessage("danger", "Failed to delete blog!");
        header("location:index.php?page=blogs");
        exit;
    }
}

else if($_GET['action'] === 'update'){
   $id=$_POST['id'];
    $title= $_POST['title'];
    $content= $_POST['content'];
    $image= $_FILES['image'];
     if(updateblog($id, $title, $content, $image)){
      setMessage("success", "Blog updated successfully!");
      header("location:index.php?page=blogs");
      exit;
    }
    else{
        setMessage("danger", "Failed to update blog!");
        header("location:index.php?page=blogs");
        exit;
    }
}



}

?>