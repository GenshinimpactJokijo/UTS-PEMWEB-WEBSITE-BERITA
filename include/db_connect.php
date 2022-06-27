<?php
    include "model/berita.php";
    $host = "localhost";
    $username = "root";
    $dbname = "uts";
    $password = "";
    $db = new mysqli($host, $username, $password, $dbname);

    $result = $db->query("SELECT * FROM berita");
    $result1 = $db->query("SELECT * FROM user");
    $berita = [];

    foreach($result as $berita) {
        $news[] = new berita($berita['Id'], $berita['judul'], $berita['kategori'], $berita['penulis'], $berita['kontenberita'], $berita['tanggalpublikasi'], $berita['Picture']);
    }
   
?>