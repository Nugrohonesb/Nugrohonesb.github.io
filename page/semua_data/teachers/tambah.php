<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama_guru = $_POST['nama_guru'];

        // include database connection file
        include_once("../../../asset/inc/config.php");

        // Insert file into table
        $result = mysqli_query($koneksi, "INSERT INTO tb_teachers(id,nama_guru) VALUES ('$id','$nama_guru')");

        // Show message when user added
        header("Location:../../../index.php?page=teachers");
    }
?>