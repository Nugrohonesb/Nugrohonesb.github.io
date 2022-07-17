<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama_siswa = $_POST['nama_siswa'];
        $email = $_POST['email'];

        // include database connection file
        include_once("../../../asset/inc/config.php");

        // Insert file into table
        $result = mysqli_query($koneksi, "INSERT INTO tb_students(id,nama_siswa,email) VALUES ('$id','$nama_siswa','$email')");
        
        // Show message when user added
        header("Location:../../../index.php?page=students");
    }
?>