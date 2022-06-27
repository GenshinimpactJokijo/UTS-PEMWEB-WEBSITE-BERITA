<?php
  include "include/db_connect.php";
    if($_GET["kategori"] == "Teknologi") $kategori = 'Teknologi';
    else if($_GET["kategori"] == "Hiburan") $kategori = 'Hiburan';
    else if($_GET["kategori"] == "Olahraga") $kategori = 'Olahraga';
    else if($_GET["kategori"] == "Politik") $kategori = 'Politik';
    else if($_GET["kategori"] == "Edukasi") $kategori = 'Edukasi';
    else if($_GET["kategori"] == "Ekonomi") $kategori = 'Ekonomi';

  $query = "SELECT Id, judul, kategori, penulis, kontenberita, DATE_FORMAT(tanggalpublikasi, '%W, %D %M %Y') 'tanggalpublikasi', Picture FROM `berita` WHERE kategori = '$kategori' ORDER BY RAND() LIMIT 4";
  $result = $db->query($query);
  while($ktgr = $result->fetch_assoc()){
    $hasil[] = $ktgr;
  }

  include "view/kategori.php";
?>