<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama_pelajaran = $_POST['nama_pelajaran'];
        $teacher_id = $_POST['teacher_id'];

        // include database connection file
        include_once("../../../asset/inc/config.php");

        // Insert file into table
        $result = mysqli_query($koneksi, "INSERT INTO tb_courses(id,nama_pelajaran,teacher_id) VALUES ('$id','$nama_pelajaran','$teacher_id')");

        // Show message when user added
        header("Location:../../../index.php?page=courses");
    }
?>