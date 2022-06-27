<?php
session_start();
 include "view/detailberita.php";
 
  if(isset($_SESSION['id'])){
 $idUser = $_SESSION['id'];
 
 if(isset($_GET['id'])){
     $idBerita = $_GET['id'];
 }
     
 
 $result = $db->query("SELECT * FROM comments WHERE IDBerita = '$idBerita'");
  
  foreach($result as $comment) {
    $komentar[] = $comment;
    
  }

  if(isset($_GET['tujuan'])) {
    if($_SESSION['id']) {
      echo "id berita ";
     
      echo "<br>";
      echo "id user ";
     

      $liked = 0;

      $tujuan = $_GET['tujuan'];
      $result = $db->query("SELECT * FROM likecomments WHERE IdKomen = '$tujuan'");
      /*MENGECEK APAKAH SUDAH ADA DATA LIKE DI DATABASE, KALAU SUDAH ADA DI SET FLAGNYA JADI 1*/
     foreach($result as $like) {
        if($_SESSION['id'] == $like['IdUser'] && $like['IdKomen'] == $tujuan) {
          $liked = 1;
        }
      }
  
      /*MENGECEK FLAG, DISINILAH PENENTUAN JUMLAH LIKE AKAN DITAMBAHKAN ATAU TIDAK */

      if($liked == 1) {
        $db->query("DELETE FROM likecomments WHERE IdUser = '$idUser' AND IdKomen = '$tujuan'");
      } else {
        
        $db->query("INSERT INTO likecomments VALUES('$idUser', '$tujuan', '$idBerita')");
      }
     
      echo "<script>document.location.href = '?view=detailberita&id={$idBerita}'</script>";
    } else {
      echo "<script>document.location.href = '?view=login'</script>";
    }
  }
}

  if(isset($_POST['submitcomment'])) {
    if($_SESSION['id']) {
    $resultUser = $db->query("SELECT * FROM `user` WHERE `user`.`id` = '$idUser'");
      $account = $resultUser->fetch_assoc();
      $comment = $_POST['Comment'];
      $username = $account['Username'];
     
      $picture = $account['Picture'];
     
      $query1 = $db->query("INSERT INTO comments VALUES('$idBerita', NULL , '$comment', '$username', NOW() , '$picture')");
    
   
       var_dump($query1);
       var_dump($db->error);
   
    
      
      echo "<script>document.location.href = '?view=detailberita&id={$idBerita}'</script>";
    } else{
      echo "<script>document.location.href = '?view=login'</script>";
    }
}
  
 
?>