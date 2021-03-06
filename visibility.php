<?php
    class Produk {
        public $judul, $penulis, $penerbit, $diskon = 0;
        
        public $harga;
        
        

        public function getLabel() {
            return "$this->penulis, $this->penerbit";
        }

        public function getInfoProduk() {
            $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

            return $str;
        }

        public function __construct( $judul = "judul" ,$penulis = "penulis" ,$penerbit = "penerbit" ,$harga = 0 ) {
             $this->judul = $judul;
             $this->penulis = $penulis;
             $this->penerbit = $penerbit;
             $this->harga = $harga;
        }

        public function getHarga(){
            return $this->harga - ( $this->harga * $this->diskon / 100);
        }

    }

    class CetakInfoProduk {
        public function cetak( Produk $produk) { 
            $str  = "{$produk->judul} | {$produk->getlabel()} (Rp. {$produk->harga})";
            return "$str";
        }
    }

    class Komik extends Produk {
        public $jmlHal;

        public function __construct($judul = "judul" ,$penulis = "penulis" ,$penerbit = "penerbit" ,$harga = 0, $jmlHal = 512)
        {
            parent::__construct($judul  ,$penulis ,$penerbit , $harga);

            $this->jmlHal = $jmlHal;
        }

        public function getInfoProduk(){
            $str = "Komik : ".parent::getInfoProduk()." | {$this->getlabel()} - {$this->jmlHal} Halaman.";
            return $str;
        }
    }

    class Game extends Produk {
        public $jmlMain;

        public function __construct($judul = "judul" ,$penulis = "penulis" ,$penerbit = "penerbit" ,$harga = 0, $waktuMain = 50) {
            parent::__construct($judul ,$penulis ,$penerbit ,$harga);

            $this->waktuMain = $waktuMain;
        }

        public function setDiskon( $diskon ) {
            $this->diskon = $diskon;
        }

        public function getInfoProduk(){
            $str = "Game : ".parent::getInfoProduk()." | {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
            return $str;
        }
    }

    $produk1 = new Komik("Naruto", "Daffa", "Bintang Utama", 25000, 100);
    $produk2 = new Game("Point Blank", "Zeppeto", "Gamescool" , 90000, 50);

    echo $produk1->getInfoProduk();
    echo "<br>";
    echo $produk2->getInfoProduk();
    echo "<hr>";


    // $produk1->diskon = 90;
    $produk2->setDiskon(70); 
    echo $produk2->getHarga();

?>