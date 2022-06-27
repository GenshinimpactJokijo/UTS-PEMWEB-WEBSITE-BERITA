<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <?php include "assets/bootstrapjs.php"?>
    <link rel="stylesheet" href="assets/footer.css">
    <link rel="stylesheet" href="assets/category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>UMNews</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-sm-top" style="background-color: black;">
      <div class="container-fluid">
        <a class="navbar-brand fs-2" style="color: #0dcaf0; margin-left: 100px;" href="?view=dashboard"><b>UMNews</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="?view=dashboard">Home</a>
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
    $counter = 0;
    session_start();
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
      $result = $db->query("SELECT * FROM `user` WHERE id = '$id'");
      $mhs = $result->fetch_assoc();

      if($mhs['Jenis'] == "user"){
        echo "<p class=\"me-3\" style=\"color: white;\">{$mhs['Username']}</p>";
        echo "<img class='img-size rounded-circle me-3' src= 'Profileimg/{$mhs['Picture']}' width = '50' height = '50'>";
        echo "<div class=\"d-grid gap-3 d-md-block\">
              <a type=\"button\" href=\"?view=logout\" class=\"btn btn-danger\" style=\"margin-right: 100px;\">Logout</a>
              </div></div></nav>";
        
        echo "<div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class=\"container\" style=\"max-width: 60%;\">";
        echo "<h1><a class=\"title-link link-info \">{$kategori}</a></h1>";
        foreach($hasil as $kategori){
          if($counter ==0){
          echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card\" style=\"margin-bottom: 60px;\">";
          echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"card-img-top zoom\"><a>";
          echo "<div class=\"card-body\" style=\"padding: 43.5px;\">";
          echo "<a class=\"card-title link-light\" style=\"font-size: 48px;\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}<a/>";
          echo "<table>
                  <tbody>
                    <td class=\"card-text\">{$kategori['kategori']}</td>
                    <td class=\"card-caption\" style=\"width: 500px;\">{$kategori['tanggalpublikasi']}</td>
                  </tbody>
                </table>
                </div>
                </div>";
          } else if ($counter == 1){
            echo "<h3 data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' >Berita Menarik Lainnya</h3>";
            echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card mb-3\">
                  <div class=\"row g-0\">
                  <div class=\"col-md-4\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
            echo "<div class=\"col-md-8\">
                  <div class=\"card-body\">
                  <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
            echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
            echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
            echo "</div>
                  </div>
                  </div>
                  </div>";
          } else if ($counter == 2){
            echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card mb-3\">
                  <div class=\"row g-0\">
                  <div class=\"col-md-4\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
            echo "<div class=\"col-md-8\">
                  <div class=\"card-body\">
                  <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
            echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
            echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
            echo "</div>
                  </div>
                  </div>
                  </div>";
          } else {
            echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card mb-3\">
                  <div class=\"row g-0\">
                  <div class=\"col-md-4\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
            echo "<div class=\"col-md-8\">
                  <div class=\"card-body\">
                  <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
            echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
            echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
            echo "</div>
                  </div>
                  </div>
                  </div>
                  </div>";
          }
          $counter++;
        } 
      } else {
          echo "<p class=\"me-3\" style=\"color: white;\">{$mhs['Username']}</p>";
          echo "<img class='img-size rounded-circle me-3' src= 'Profileimg/{$mhs['Picture']}' width = '50' height = '50'>";
          echo "<div class=\"d-grid gap-3 d-md-block\">
                <a type=\"button\" href=\"?view=logout\" class=\"btn btn-danger\" style=\"margin-right: 100px;\">Logout</a>
                </div></div></nav>";
          echo "<div class=\"container\" style=\"max-width: 60%;\">";
          echo "<h1><a class=\"title-link link-info\">{$kategori}</a></h1>";
          foreach($hasil as $kategori){
            if($counter ==0){
            echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card\" style=\"margin-bottom: 60px;\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"card-img-top zoom\"><a>";
            echo "<div class=\"card-body\" style=\"padding: 43.5px;\">";
            echo "<a class=\"card-title link-light\" style=\"font-size: 48px;\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}<a/>";
            echo "<table>
                    <tbody>
                      <td class=\"card-text\">{$kategori['kategori']}</td>
                      <td class=\"card-caption\" style=\"width: 500px;\">{$kategori['tanggalpublikasi']}</td>
                    </tbody>
                  </table>
                  </div>
                  </div>";
            } else if ($counter == 1){
              echo "<h3>Berita Menarik Lainnya</h3>";
              echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card mb-3\">
                    <div class=\"row g-0\">
                    <div class=\"col-md-4\">";
              echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
              echo "<div class=\"col-md-8\">
                    <div class=\"card-body\">
                    <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
              echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
              echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
              echo "</div>
                    </div>
                    </div>
                    </div>";
            } else if ($counter == 2){
              echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card mb-3\">
                    <div class=\"row g-0\">
                    <div class=\"col-md-4\">";
              echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
              echo "<div class=\"col-md-8\">
                    <div class=\"card-body\">
                    <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
              echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
              echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
              echo "</div>
                    </div>
                    </div>
                    </div>";
            } else {
              echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card mb-3\">
                    <div class=\"row g-0\">
                    <div class=\"col-md-4\">";
              echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
              echo "<div class=\"col-md-8\">
                    <div class=\"card-body\">
                    <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
              echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
              echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
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
              <a type=\"button\" href=\"?view=login\" class=\"btn btn-info btn-outline-dark\" style=\"margin-right: 100px;\">Login</a>
              </div></div></nav>"; 
        echo "<div class=\"container\" style=\"max-width: 60%;\">";
        echo "<h1 data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200'><a class=\"title-link link-info\">{$kategori}</a></h1>";
        foreach($hasil as $kategori){
          if($counter ==0){
          echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card\" style=\"margin-bottom: 60px;\">";
          echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"card-img-top zoom\"><a>";
          echo "<div  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card-body\" style=\"padding: 43.5px;\">";
          echo "<a class=\"card-title link-light\" style=\"font-size: 48px;\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}<a/>";
          echo "<table>
                  <tbody>
                    <td  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card-text\">{$kategori['kategori']}</td>
                    <td  data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1500' class=\"card-caption\" style=\"width: 500px;\">{$kategori['tanggalpublikasi']}</td>
                  </tbody>
                </table>
                </div>
                </div>";
          } else if ($counter == 1){
            echo "<h3>Berita Menarik Lainnya</h3>";
            echo "<div class=\"card mb-3\">
                  <div class=\"row g-0\">
                  <div class=\"col-md-4\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
            echo "<div class=\"col-md-8\">
                  <div class=\"card-body\">
                  <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
            echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
            echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
            echo "</div>
                  </div>
                  </div>
                  </div>";
          } else if ($counter == 2){
            echo "<div class=\"card mb-3\">
                  <div class=\"row g-0\">
                  <div class=\"col-md-4\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
            echo "<div class=\"col-md-8\">
                  <div class=\"card-body\">
                  <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
            echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
            echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
            echo "</div>
                  </div>
                  </div>
                  </div>";
          } else {
            echo "<div class=\"card mb-3\">
                  <div class=\"row g-0\">
                  <div class=\"col-md-4\">";
            echo "<a href=\"?view=detailberita&id={$kategori['Id']}\"><img src=\"{$kategori['Picture']}\" class=\"img-fluid rounded-start\"><a></div>";
            echo "<div class=\"col-md-8\">
                  <div class=\"card-body\">
                  <h3><a class=\"card-title link-light\" href=\"?view=detailberita&id={$kategori['Id']}\">{$kategori['judul']}</h3></a>";
            echo "<p class=\"card-text\">{$kategori['kategori']}</p>";
            echo "<p class=\"card-caption\">{$kategori['tanggalpublikasi']}";
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
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
              <script>AOS.init();</script>
</body>
</html>