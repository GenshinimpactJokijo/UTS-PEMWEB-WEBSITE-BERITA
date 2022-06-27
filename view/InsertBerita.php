<?php
    session_start();
    include "include/db_connect.php";
 
    $id = $_SESSION['id'];
    $result = $db->query("SELECT * FROM `user` WHERE Id = '$id'");
    $mhs = $result->fetch_assoc();
?>
  
  
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php include "assets/bootstrapjs.php" ?>
      <title>UMNews</title>
  </head>
  <body>
      <div class = "container" style="width: 70%;">
        <div class="row justify-content-sm">
            <div class="col-12">
                <form action="?view=insertberita" method="POST" enctype="multipart/form-data">
                      <div class="col mt-5 mb-3">
                          <label for="Judul" class="form-label">Judul</label>
                          <input type="text" class="form-control" id="Judul" name="Judul" value="" placeholder="Judul Berita" >
                      </div>
                    <div class="mb-3">
                        <label for="Kategori">Kategori:</label>
                        <select class="form-select" name="Kategori" id="kategori">
                          <option value="Olahraga">Olahraga</option>
                          <option value="Teknologi">Teknologi</option>
                          <option value="Ekonomi">Ekonomi</option>
                          <option value="Politik">Politik</option>
                          <option value="Hiburan">Hiburan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="Penulis" name="Penulis" placeholder="Penulis Berita" >
                    </div>
                    <div class="mb-3">
                     <label for="Konten" class="form-label">Konten Berita</label>
                     
                        <textarea type="text" class="form-control" id="Konten" name="Konten" placeholder="konten Berita" cols="30" rows="5"  >
                        </textarea>
                    </div>
                      <div class="mb-3">
                        <label for="Tanggal" class="form-label">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="Tanggal" name="Tanggal" placeholder="tanggal Berita" >
                    </div>
                   
                    <div class="col-lg-12 input-container">
                      <label class="form-label" for="Picture">Gambar</label>
                      <input class="form-control form-control-file" type="text" name="Picture" id="Picture">
                    </div>
                      <button type="submit" name="Publish" class="btn btn-info float-right mt-3">Publish</button>
                      <a role="button" type="submit" name="back" class="btn btn-danger mt-3" href="?view=adminuser">Cancel</a> 
                </form>
           </div>
          </div>
          </div>
</body>
</html>