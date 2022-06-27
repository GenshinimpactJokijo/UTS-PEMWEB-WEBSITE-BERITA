<?php
session_start();
include "include/db_connect.php";
if(isset($_GET['type'], $_GET['id'])){
    $type = $_GET['type'];
    $id = $_GET['id'];
    
    
    

   $query = "INSERT INTO commentLikes 
                       VALUES 
                       ('$idRelation', '', '');    
                    ";
    switch($type) {
        case 'comment':
            $db->query("INSERT INTO commentlikes (IdLike, IdBerita)
             SELECT {$_SESSION['id']}, {$id}
             FROM berita
             WHERE EXISTS (
                 SELECT berita.id FROM berita WHERE berita.id = {$id})
                 AND NOT EXISTS (
                     SELECT Id
                     FROM commentlikes WHERE idlike = {$_SESSION['id']}
                     AND berita = {$id})
                LIMIT 1
                 ");

                 
                  if( mysqli_affected_rows($db) > 0) {
            echo "<script>
                  alert('DATA BERHASIL DIUPDATE!');
                  </script>";
          
           }else {
               
             echo "<script> alert('data gagal DIUPDATE!'); 
             
             </script>";
           }
        
            break;
           
    }
          
    }


?>