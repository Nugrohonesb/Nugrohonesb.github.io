<?php 
    // memanggil file koneksi.php untuk melakukan koneksi database
    include '../../../asset/inc/config.php';

    if (isset($_POST['update'])) {
        $urutan = $_POST['urutan'];
        $id = $_POST['id'];
        $nama_pelajaran = $_POST['nama_pelajaran'];
        $teacher_id = $_POST['teacher_id'];

        $query = "UPDATE tb_courses SET id='$id', nama_pelajaran='$nama_pelajaran', teacher_id='$teacher_id' WHERE urutan='$urutan'";
        $result = mysqli_query($koneksi, $query);

        //periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            header("Location:../../../index.php?page=courses");
        }
    }
?>