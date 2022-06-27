<?php
  class berita{
        public $id;
        public $judul;
        public $kategori;
        public $penulis;
        public $konten;
        public $tanggal;
        public $gambar;

        function __construct($id, $judul, $kategori, $penulis, $konten, $tanggal, $gambar) {
            $this->id = $id;
            $this->judul = $judul;
            $this->kategori = $kategori;
            $this->penulis = $penulis;
            $this->konten = $konten;
            $this->tanggal = $tanggal;
            $this->gambar = $gambar;
        }
  }
?>