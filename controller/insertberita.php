<?php
    include "controller/untukUpload.php";
    include "view/insertberita.php";
    if(isset ($_POST["Publish"])){
          $judul = $_POST["Judul"];
           $kategori = $_POST["Kategori"];
           $penulis = $_POST["Penulis"];
           $konten = $_POST["Konten"];
          $tanggal = $_POST["Tanggal"];
           $id = uniqid('');
           $gambar = $_POST["Picture"];
        
      
        $query = "INSERT INTO berita 
                       VALUES 
                       ('$id', '$judul', '$kategori', '$penulis', '$konten', '$tanggal', '$gambar');    
                    ";
        mysqli_query($db, $query);
        
        if(mysqli_affected_rows($db) > 0){
            move_uploaded_file($_FILES["Picture"]["tmp_name"], "BeritaImg/{$gambar}");
            echo "<script>alert('User berhasil ditambahkan')</script>";
            header("Location: ?view=adminuser");
        } else {
            echo $db->error;
            echo "<script>alert('gagal registrasi')</script>";

        }
    }   
    
?>