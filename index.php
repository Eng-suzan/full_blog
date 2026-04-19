<?php

require_once "config/db.php";
require_once "core/functions.php";
require_once "core/validations.php";
require_once "views/layouts/header.php";

$page = $_GET['page'] ?? 'home';
showMessage();
switch ($page) {
    case 'home':
        include "views/home.php";
        break;
    case 'about':
        include "views/about.php";
        break;
  case "post":
       
        include 'views/post.php';
        break;
    case 'contact':
        include "views/contact.php";
        break;

    case 'register':
        include "views/auth/register.php";
        break;
    case 'sign-in':
        include "controllers/auth/reg_con.php";
        break;
    case 'login':
        include "views/auth/login.php";
        break;
    case 'blogs':
            include "controllers/blogs/blog_con.php"; 
        include "views/blogs/index.php";

        break;

    case 'auth-login':
        include "controllers/auth/login_con.php";
        break;
    case 'logout':
        include "views/auth/logout.php";
        break;
         case 'create_blog':
        include "views/blogs/create_blog.php";
        break;

    case 'store_blog':
        include "controllers/blogs/blog_con.php";
        break;
case 'delete_blog':
        include "controllers/blogs/blog_con.php";
        break;
    case'edit_blog':
        include "views/blogs/edit.php";
        break;
        case 'update_blog':
        include "controllers/blogs/blog_con.php";
        break;
    default:

        include "views/404.php";
}







require_once "views/layouts/footer.php";
