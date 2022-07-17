<?php 
    // memanggil file koneksi.php untuk melakukan koneksi database
    include '../../../asset/inc/config.php';

    if (isset($_POST['update'])) {
        $urutan = $_POST['urutan'];
        $id = $_POST['id'];
        $nama_siswa = $_POST['nama_siswa'];
        $email = $_POST['email'];

        $query = "UPDATE tb_students SET id='$id', nama_siswa='$nama_siswa', email='$email' WHERE urutan='$urutan'";
        $result = mysqli_query($koneksi, $query);

        //periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            header("Location:../../../index.php?page=students");
        }
    }
?>