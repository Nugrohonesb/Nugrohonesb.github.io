<?php 
    // memanggil file koneksi.php untuk melakukan koneksi database
    include '../../../asset/inc/config.php';

    if (isset($_POST['update'])) {
        $urutan = $_POST['urutan'];
        $id = $_POST['id'];
        $nama_guru = $_POST['nama_guru'];

        $query = "UPDATE tb_teachers SET id='$id', nama_guru='$nama_guru' WHERE urutan='$urutan'";
        $result = mysqli_query($koneksi, $query);

        //periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            header("Location:../../../index.php?page=teachers");
        }
}
?>