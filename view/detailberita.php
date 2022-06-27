<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "assets/bootstrapjs.php" ?>
  <link rel="stylesheet" href="assets/konten.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <title>UMNews</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark sticky-sm-top" style="background-color: black;">
    <div class="container-fluid">
      <a class="navbar-brand fs-2" style="color: #0dcaf0; margin-left: 100px;" href="?view=dashboard"><b>UMNews</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
  </nav>
  <?php
  include "include/db_connect.php";
  if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query = "SELECT Id, judul, kategori, penulis, kontenberita, DATE_FORMAT(tanggalpublikasi, '%W, %D %M %Y') 'tanggalpublikasi', Picture FROM berita WHERE Id = '$id'";
    $result = $db->query($query);

    $hasil = $result->fetch_assoc();
    echo "<div class='container' style='padding: 25px;'>";
    echo "<nav style='--bs-breadcrumb-divider: \">\";' aria-label='breadcrumb'>";
    echo " <ol class='breadcrumb'>
        <li class='breadcrumb-item'><a class='link-info' style='text-decoration: none;' href='?view=dashboard'>Home</a></li>
        <li class='breadcrumb-item active' aria-current='page'>{$hasil['kategori']}</li>
      </ol>
    </nav>";
    echo "<h1>";
    echo $hasil['judul'];
    echo "</h1>";
    echo "<p>";
    echo "<b>Penulis : {$hasil['penulis']}</b>";
    echo "<br>";
    echo $hasil['tanggalpublikasi'];
    
    echo "</p>";
    echo " <div class='row'>";
    echo "<div class='col-12' data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200'>
          <img src='{$hasil['Picture']}' class='card-img-top' style='margin-bottom:50px;'>
          </div>";
    echo "<div data-aos='fade-down'
     data-aos-easing='linear'
     data-aos-duration='1200' class='Justify col-12'>";
    echo "<p id='kontenberita'>{$hasil['kontenberita']}</p>";
  }
?>
  <div data-aos='fade-down' data-aos-easing='linear' data-aos-duration='1200' style="margin-top: 30px;">
    <!-- User comment -->
    <h5 data-aos='fade-down' data-aos-easing='linear' data-aos-duration='1200' class="mb-3"><b>Comments</b></h5>
    <div class="input-group mb-3">
      <form class="myForm" method="post">

        <textarea name="Comment" class="form-control" id="Comment" placeholder="Type here..." cols="200"
          rows="5"></textarea>
        <input type="Submit" name="submitcomment" value="SUBMIT" class="btn btn-info mt-3">

      </form>
    </div>

    <?php
           
              $result = $db->query("SELECT * FROM comments WHERE IDBerita = '$id'");
                        foreach($result as $comment) {
                        $idKomentar = $comment['IdKomen'];
                     
                        $SUM = $db->query("SELECT COUNT(*) AS TotalLike FROM likecomments WHERE IdKomen = '$idKomentar'");
                        $jumlahLike = $SUM->fetch_assoc()['TotalLike'];
             
                        
                        $username = $comment['Username'];
           
                        
                        $resultUsername = $db->query("SELECT * FROM user WHERE Username = '$username'");
                        $comment['ComPP'] = $resultUsername->fetch_assoc()['Picture'];
                 

                        
                  

                  echo "
                  
                   <div class='pembungkus d-flex'>
                    <div class='flex-shrink-0'>
                      <img src=\"Profileimg/{$comment['ComPP']}\" alt=\"user-profile\" class='img-size rounded-circle' width='100' height='100'>
                    </div>
  
                  <div class='pembungkus flex-shrink-1 ms-3 shadow-sm bg-body rounded bg-secondary p-4 mb-3'>
                      <h5 class='g-color-gray-dark-v1 mb-0'>{$comment['Username']}</h5><span style='font-size:10px;' class='g-color-gray-dark-v4 g-font-size-10'>{$comment['TanggalKomen']}</span>
                      <p>{$comment['Konten']}</p>
                      <ul class='list-inline d-sm-flex my-0'>
                      <li class='list-inline-item g-mr-20'>
                      <a style='text-decoration:none;'href=\"?view=detailberita&id={$id}&tujuan={$idKomentar}\" class='u-link-v5 g-color-gray-dark-v4 g-color-primary--hover'>
                        <img src='assets/TOMBOLLIKE.png' width=20 height=20 >{$jumlahLike}
                      </a>
                      <p style='font-size:10px;'>Klik hati untuk like, Klik kembali untuk unlike</p>
                      
                      </li>
                      </ul>
                      </div>
                    </div>
                   
                  ";
                }
              ?>
  </div>
  </div>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
  AOS.init();

  function kontenbrt() {
    const getPara = document.getElementById('kontenberita');
    const newContent = getPara.textContent.split("\n").map(text => !text.length ? "<br><br>" : text)
    getPara.innerHTML = newContent.join("")
  }
  kontenbrt()
  </script>

</body>

</html>