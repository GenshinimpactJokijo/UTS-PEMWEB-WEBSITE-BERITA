<?php 
    require "controller/untukupload.php";
    include "include/db_connect.php";
    if( isset($_POST["submit"]) ) {
        if(strcmp($_POST['password'], $_POST['confirm_password']) != 0) {
            echo "<script>
                alert('Password tidak SESUAI');
                document.location.href='?view=register';
            </script>";
            die;
        }

        $FirstName = $_POST["FirstName"];
        $LastName = $_POST["LastName"];
        $Username = $_POST["Username"];
        $Gender = $_POST["Gender"];
        $TanggalLahir = $_POST["TanggalLahir"];
        $id = uniqid('');
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $gambar = uploadFile();
          $Jenis = 'user';
        if($gambar === false) {
            echo "<script>
                alert(\"Mahasiswa Gagal Ditambahkan!\");
            </script>";
            echo "<script>
                document.location.href='?view=register';
            </script>";
            die;
        } 
      
        $query = "INSERT INTO user
                       VALUES 
                       ('$FirstName', '$LastName', '$Username', '$Gender', '$TanggalLahir', '$id', '$password', '$gambar', '$Jenis');    
                    ";
        mysqli_query($db, $query);

    if(mysqli_affected_rows($db) > 0){
        move_uploaded_file($_FILES["Picture"]["tmp_name"], "Profileimg/{$gambar}");
        echo "<script>alert('User berhasil ditambahkan')</script>";
        header("Location: ?view=login");
    } else {
        echo $db->error;
        echo "<script>alert('gagal registrasi')</script>";
    }
}


include "view/register.php";
?>

