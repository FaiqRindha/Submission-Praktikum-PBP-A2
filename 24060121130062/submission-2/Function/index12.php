<!-- 
File      : index12.php		10/09/23
Penulis   : Varrel / 24060121130062
Deskripsi : implementasi modul pertemuan 2 (dasar PHP - function)
-->

<?php
    //menghitung harga setelah diskon
    //parameter input: harga dan diskon
    function hitung_diskon($harga,$diskon){
        $harga = $harga - ($harga*$diskon/100);
        return $harga;
    }
    //contoh pemanggilan fungsi
    $harga = 10000;
    $diskon = 20;
    $harga_diskon = hitung_diskon($harga,$diskon);
    echo 'Harga sebelum diskon = '.$harga.'<br />';
    echo 'Harga setelah diskon = '.$harga_diskon.'<br />';
?>