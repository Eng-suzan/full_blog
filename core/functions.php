<?php

session_start();

function setMessage($type, $message)
{
    $_SESSION['message'] = [
        "type" => $type,
        "text" => $message,
    ];
}
function showMessage()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='alert alert-$type'>$text</div>";

        unset($_SESSION['message']);
    }
}
function register_user($name, $email, $phone, $password)
{
    $conn = $GLOBALS['conn'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, phone, password) 
    VALUES ('$name', '$email', '$phone', '$hashed_password')";

    $res = mysqli_query($conn, $sql);

    if ($res) {
        $user_id = mysqli_insert_id($conn);
        $_SESSION['user'] = [
            "id" => $user_id,
            "name" => $name,
            "email" => $email,
        ];
        return true;
    } else {
        return false;
    }
}
function login_user($email, $password)
{

    $conn = $GLOBALS['conn'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($res);
    if (mysqli_num_rows($res) == 0) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $email,
        ];
        return true;
    } else {
        return false;
    }
}
function getblogs()
{
    $conn = $GLOBALS['conn'];
    $user_id = $_SESSION['user']['id'];
    $sql = "SELECT * FROM posts where user_id='$user_id'";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}
function validatestoreblog($title, $content, $image)
{
    $fields =
        [
            "title" => $title,
            "content" => $content,
            "image" => $image,
        ];
    foreach ($fields as $fildname => $value) {
        if ($error = validateRequired($value, $fildname)) {
            return $error;
        }
    }
}
function storeblog($title, $content, $image)
{
    $conn = $GLOBALS['conn'];
    $realpath = realpath(__DIR__ . "/../assets/img");

    $pathname = $realpath . "/" . $image['name'];

    $newpath = "/assets/img/" . $image['name'];

    move_uploaded_file($image['tmp_name'], $pathname);

    $sql = "INSERT INTO posts
     (title, content,  created_at, user_id,image) VALUES
     ('$title', '$content', NOW(), '{$_SESSION['user']['id']}', '$newpath')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function findblog($id)
{
    $conn = $GLOBALS['conn'];
    $sql = "SELECT * FROM posts WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) == 0) {
        setMessage(("success"), "Blog not found!");
        header("location:index.php?page=blogs");
        exit;
    }
    return mysqli_fetch_assoc($res);
}

function deleteblog($id)
{
    $blog = findblog($id);
    $conn = $GLOBALS['conn'];
    $imagepath = realpath(__DIR__ . "/.." . $blog['image']);
    if ($imagepath && file_exists($imagepath)) {
        unlink($imagepath);
    }

    $sql = "DELETE FROM posts WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}
function updateblog($id, $title, $content, $image)
{
    $blog = findblog($id);
    $conn = $GLOBALS['conn'];


    if ($image['error'] === 0) {
        $path = realpath(__DIR__ . "/.." . $blog['image']);
    } else {

        $imagepath = realpath((__DIR__ . '/../assets/img') . "/" . basename($blog['image']));
        if ($imagepath && file_exists($imagepath)) {
            unlink($imagepath);
        }
        $realpath = realpath(__DIR__ . "/../assets/img");
        $pathname = $realpath . "/" . $image['name'];
        $path = "/assets/img/" . $image['name'];
        move_uploaded_file($image['tmp_name'], $pathname);
    }
    $sql = "UPDATE posts SET title='$title', content='$content', image='$path' WHERE id='$id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}
