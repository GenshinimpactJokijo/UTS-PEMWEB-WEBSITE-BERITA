<?php
session_start();
include "include/db_connect.php";


if(isset($_POST['submit'])) {
    $password = $_POST['Password'];
    $Username = $_POST['Username'];
     
     if(isset($_POST['g-recaptcha-response'])) $captcha= $_POST['g-recaptcha-response'];
     if(!$captcha){
            echo "<h2>Please check the captcha form</h2>";
            exit;
        }
    $str= "https://www.google.com/recaptcha/api/siteverify?secret=6LcG1cIcAAAAANGECsIjYmDrAvTjqQnZmdUKFXvj"."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
    
        $response= file_get_contents($str);
        $response_arr=(array) json_decode($response);

    
    $statement = $db->prepare("SELECT * from user WHERE Username=?");
    $statement->bind_param("s", $Username);
    $statement->execute();
    $result = $statement->get_result();
    

    if($result->num_rows > 0)
      $account = $result->fetch_assoc();
      $_SESSION['id'] = $account['id'];
     
     
    
    if($password == "" || $Username == ""){
          echo "<script>alert(\"Username ato password kosong/salah\")</script>";
          echo "<script>document.location.href='?view=login'</script>";
        }
        if(password_verify($password, $account['password'])) {
            echo "<form id='form' action='?view=adminuser' method='POST'>
                    <input type='hidden' name='Username' value='{$account['Username']}'>
                  
                 </form>
                 <script>
                    document.getElementById('form').submit();
                 </script>
            ";
          
           
        }else {
            echo "
                <script>
                    alert(\"Username atau Password Kosong/Salah\");
                   
                </script>
            ";
               echo "
                <script>
                     document.location.href = '?view=login';
                </script>
            ";
        }
}

 include "view/login.php";

?>