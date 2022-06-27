<?php
  if(isset($_GET["view"])) {
    if(strcmp($_GET["view"], "dashboard") == 0) include "controller/dashboard.php";
    else if(strcmp($_GET["view"], "login") == 0) include "controller/login.php";
    else if(strcmp($_GET["view"], "register") == 0) include "controller/register.php";
     else if(strcmp($_GET["view"], "insertberita") == 0) include "controller/insertberita.php";
      else if(strcmp($_GET["view"], "deleteberita") == 0) include "controller/delete_berita.php";
      else if(strcmp($_GET["view"], "editberita") == 0) include "controller/edit_berita.php";
      else if(strcmp($_GET["view"], "likecomments") == 0) include "controller/like.php";
         else if(strcmp($_GET["view"], "logout") == 0) include "controller/logout.php";
    else if(strcmp($_GET["view"], "kategori") == 0) include "controller/kategori.php";
            else if(strcmp($_GET["view"], "konten") == 0) include "controller/konten.php";
    else if(strcmp($_GET["view"], "detailberita") == 0) include "controller/detailberita.php";
    else if(strcmp($_GET["view"], "adminuser") == 0) include "controller/adminuser.php";
    else echo "<h1>Page NOT FOUND!</h1>";
  } else include "view/dashboard.php";
?>