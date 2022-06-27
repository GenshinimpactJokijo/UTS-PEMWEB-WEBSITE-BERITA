<?php
include "include/db_connect.php";
    $idberita = $_GET['id'];
    $resultberita = $db->query("SELECT * FROM `berita` WHERE `berita`.`Id` = '$idberita'");
    $brt = $resultberita->fetch_assoc();
     session_start();

  
    $id = $_SESSION['id'];
    $result = $db->query("SELECT * FROM `user` WHERE Id = '$id'");
    $mhs = $result->fetch_assoc();
   
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>UMNews</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <form action="" method="post">
            <label for="id">ID Berita</label>
            <input disabled type="number" name="id" placeholder="<?="{$brt['Id']}";?>" value="<?="{$brt['Id']}";?>" size="30"><br><br>
            <input type="hidden" name="id" value="<?="{$brt['Id']}";?>"><br></br>

            <label for="Judul">Judul Berita : </label>
            <input type="text" name="judul" value="<?="{$brt['judul']}";?>" size="40"><br><br>
               <label for="kategori" value="<?="{$brt['kategori']}";?>">Kategori:</label>
                        <select name="kategori" id="kategori">
                          <option value="Olahraga">Olahraga</option>
                          <option value="Teknologi">Teknologi</option>
                          <option value="Ekonomi">Ekonomi</option>
                          <option value="Politik">Politik</option>
                          <option value="Hiburan">Hiburan</option>
                        </select>
         
            <br>
            <label for="penulis">Penulis Berita : </label>
            <input id="penulis" name="penulis" value="<?="{$brt['penulis']}";?>" size="40"><br><br>

            <label for="konten">Konten Berita :</label><br>
            <textarea  id="konten" name="konten" cols="100" rows="10"><?="{$brt['kontenberita']}";?></textarea>
            <br><br>

            <label for="tanggal">Tanggal Publikasi :</label>
            <input type="date" id="tanggal" name="tanggal" value="<?="{$brt['tanggalpublikasi']}";?>" size="40"><br><br>
            
            <label for="gambar">Gambar :</label>
            <input type="text" id="gambar" size="100" name="gambar" value="<?="{$brt['Picture']}";?>"><br><br>

            <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </form>
            <form action="?view=adminuser" method="POST">
              <button type="submit" name="back" class="btn btn-danger">Cancel</button>
            </form>
    </div>
<?php
    
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $kategori = $_POST['kategori'];
        $penulis = $_POST['penulis'];
        $konten = $_POST['konten'];
        $tanggal = $_POST['tanggal'];
        $gambar = $_POST['gambar'];

        $result1 = $db->query("UPDATE `berita` SET `Id` ='$id', `judul`='$judul', `kategori`='$kategori', `penulis`='$penulis', `kontenberita`='$konten', `tanggalpublikasi`='$tanggal', `Picture`='$gambar' WHERE `berita`.`Id` = '$id'");

           if( mysqli_affected_rows($db) > 0) {   
            echo "<script>document.location.href='?view=adminuser'</script>";
           }else {
             echo "<script> alert('Update Gagal!'); 
             </script>";
           }
    }
?>
</body>
</html>