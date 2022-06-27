<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php include "assets/bootstrapjs.php" ?>
    <link rel="stylesheet" href="assets/footer.css">
    <link rel="stylesheet" href="assets/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>UMNews</title>
  </head>
  <body>
    <!-- UNTUK NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-sm-top" style="background-color: black;">
      <div class="container-fluid">
        <a class="navbar-brand fs-2" style="color: #0dcaf0; margin-left: 100px;" href="?view=dashboard"><b>UMNews</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="?view=dashboard">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=kategori&kategori=Teknologi">Teknologi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=kategori&kategori=Hiburan">Hiburan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=kategori&kategori=Olahraga">Olahraga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=kategori&kategori=Politik">Politik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?view=kategori&kategori=Ekonomi">Ekonomi</a>
            </li>
          </ul>
        </div>
      <?php
        include 'include/db_connect.php';
        $counter = 0;
        $isi = "SELECT Id, judul, kategori, penulis, kontenberita, DATE_FORMAT(tanggalpublikasi, '%W, %D %M %Y') 'tanggalpublikasi', Picture FROM berita ORDER BY RAND() LIMIT 7";
        $resultbrt = $db->query($isi);

        while($isibrt = $resultbrt->fetch_assoc()){
          $hasil[] = $isibrt;
        }
       //Kalau SUDAH LOGIN//
        if(isset($_SESSION['id'])){
          $id = $_SESSION['id'];
          $result = $db->query("SELECT * FROM `user` WHERE id = '$id'");
          $mhs = $result->fetch_assoc();

            if($mhs['Jenis'] == "user"){
                echo "<p class=\"me-3\" style=\"color: white;\">{$mhs['Username']}</p>";
                echo "<img class='img-size rounded-circle me-3' src= 'Profileimg/{$mhs['Picture']}' width='50' height='50'>";
                echo "<div class=\"d-grid gap-3 d-md-block\">
                      <a type=\"button\" href=\"?view=logout\" class=\"btn btn-danger\" style=\"margin-right: 100px;\">Logout</a>
                      </div></div></nav>";
                echo "<div class=\"container\" style=\"margin-bottom: 30px;\">
                      <div class=\"row\">";  
              foreach($hasil as $data){
                if($counter == 0){
                    echo "<div class=\"col-md-8\">
                            <div data-aos='fade-down' data-aos-easing='linear'
     data-aos-duration='1200' class=\"card zoom\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"><a>
                          <div class=\"card-body\" style=\"padding: 43.5px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 48px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}<a/>";
                    echo "<table>
                            <tbody>";
                    echo "<td class=\"card-text\">{$data['kategori']}</td>";
                    echo "<td class=\"card-caption\" style=\"width: 500px;\">{$data['tanggalpublikasi']}</td>";
                    echo  "</tbody>
                          </table>
                          </div>
                          </div>
                          </div>";
                } else if ($counter == 1){
                    echo "<div class=\"col-6 col-md-4\">
                            <div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"card\" style=\"margin-bottom: 10px;\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom right-content\"></a>";
                    echo "<div class=\"card-body\" style=\"padding: 10px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>";
                } else if ($counter == 2){
                    echo "<div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"card\" style=\"margin-bottom: 10px;\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\" style=\"padding: 10px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                } else if ($counter == 3){
                    echo "<div class=\"container\" style=\"margin-bottom: 15px;\">";
                    echo "<div class=\"row row-cols-1 row-cols-sm-2 row-cols-md-4\">
                            <div class=\"col\">
                              <div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 4){
                    echo "<div class=\"col\">
                              <div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 5){
                    echo "<div class=\"col\">
                              <div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 6){
                    echo "<div class=\"col\">
                              <div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                }
                $counter++;
              }
            } else {
                echo "<a class='nav-link active' aria-current='page' href='?view=adminuser'>Tabel CRUD</a>";
                echo "<p class=\"me-3\" style=\"color: white;\">{$mhs['Username']}</p>";
                echo "<img class='img-size rounded-circle me-3' src= 'Profileimg/{$mhs['Picture']}' width='50' height='50'>";
                echo "<div class=\"d-grid gap-3 d-md-block\">
                      <a type=\"button\" href=\"?view=logout\" class=\"btn btn-danger\" style=\"margin-right: 100px;\">Logout</a>
                      </div></div></nav>";
                echo "<div class=\"container\" style=\"margin-bottom: 30px;\">
                      <div class=\"row\">";
                foreach($hasil as $data){
                if($counter == 0){
                    echo "<div class=\"col-md-8\">
                            <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"><a>
                          <div class=\"card-body\" style=\"padding: 43.5px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 48px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}<a/>";
                    echo "<table>
                            <tbody>";
                    echo "<td class=\"card-text\">{$data['kategori']}</td>";
                    echo "<td class=\"card-caption\" style=\"width: 500px;\">{$data['tanggalpublikasi']}</td>";
                    echo  "</tbody>
                          </table>
                          </div>
                          </div>
                          </div>";
                } else if ($counter == 1){
                    echo "<div class=\"col-6 col-md-4\">
                            <div class=\"card\" style=\"margin-bottom: 10px;\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom right-content\"></a>";
                    echo "<div class=\"card-body\" style=\"padding: 10px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>";
                } else if ($counter == 2){
                    echo "<div class=\"card\" style=\"margin-bottom: 10px;\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\" style=\"padding: 10px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                } else if ($counter == 3){
                    echo "<div class=\"container\" style=\"margin-bottom: 15px;\">";
                    echo "<div class=\"row row-cols-1 row-cols-sm-2 row-cols-md-4\">
                            <div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 4){
                    echo "<div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 5){
                    echo "<div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 6){
                    echo "<div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                }
                $counter++;
              }
            
            } 
        } else {
              echo "<div class=\"d-grid gap-3 d-md-block\">
                    <a type=\"button\" href=\"?view=login\" class=\"btn btn-info\" style=\"margin-right: 100px;\">Login</a>
                    </div></div></nav>"; 
              echo "<div class=\"container\" style=\"margin-bottom: 30px;\">
                    <div class=\"row\">"; 
              foreach($hasil as $data){
                if($counter == 0){
                    echo "<div class=\"col-md-8\">
                            <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"><a>
                          <div class=\"card-body\" style=\"padding: 43.5px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 48px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}<a/>";
                    echo "<table>
                            <tbody>";
                    echo "<td class=\"card-text\">{$data['kategori']}</td>";
                    echo "<td class=\"card-caption\" style=\"width: 500px;\">{$data['tanggalpublikasi']}</td>";
                    echo  "</tbody>
                          </table>
                          </div>
                          </div>
                          </div>";
                } else if ($counter == 1){
                    echo "<div class=\"col-6 col-md-4\">
                            <div class=\"card\" style=\"margin-bottom: 10px;\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom right-content\"></a>";
                    echo "<div class=\"card-body\" style=\"padding: 10px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>";
                } else if ($counter == 2){
                    echo "<div class=\"card\" style=\"margin-bottom: 10px;\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\" style=\"padding: 10px;\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                } else if ($counter == 3){
                    echo "<div class=\"container\" style=\"margin-bottom: 15px;\">";
                    echo "<div class=\"row row-cols-1 row-cols-sm-2 row-cols-md-4\">
                            <div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 4){
                    echo "<div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 5){
                    echo "<div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>";
                } else if ($counter == 6){
                    echo "<div class=\"col\">
                              <div class=\"card\">";
                    echo "<a href=\"?view=detailberita&id={$data['Id']}\"><img src=\"{$data['Picture']}\" class=\"card-img-top zoom\"></a>";
                    echo "<div class=\"card-body\">";
                    echo "<a class=\"card-title link-light\" style=\"font-size: 24px;\" href=\"?view=detailberita&id={$data['Id']}\">{$data['judul']}</a>";
                    echo "<p class=\"card-text\" style=\"font-size: 14px;\">{$data['kategori']}</p>";
                    echo "<p class=\"card-caption\" style=\"font-size: 10px;\">{$data['tanggalpublikasi']}</p>";
                    echo "</div>
                          </div>
                          </div>
                          </div>
                          </div>";
                }
                $counter++;
              }
        }
  ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
              <script>AOS.init();</script>
        <!-- Footer -->
    <div class="footer-basic">
      <footer>
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="?view=dashboard">Home</a></li>
          <li class="list-inline-item"><a href="?view=kategori&kategori=Teknologi">Teknologi</a></li>
          <li class="list-inline-item"><a href="?view=kategori&kategori=Hiburan">Hiburan</a></li>
          <li class="list-inline-item"><a href="?view=kategori&kategori=Olahraga">Olahraga</a></li>
          <li class="list-inline-item"><a href="?view=kategori&kategori=Politik">Politik</a></li>
          <li class="list-inline-item"><a href="?view=kategori&kategori=Ekonomi">Ekonomi</a></li>
          <p class="copyright mt-4">UMNews © 2020</p>
          <p class="copyright">Kelompok 6 IF330-C</p>
        </ul>
      </footer>
    </div>
</body>
</html>
