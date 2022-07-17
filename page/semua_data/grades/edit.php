<?php 
    // memanggil file koneksi.php untuk melakukan koneksi database
    include '../../../asset/inc/config.php';

    if (isset($_POST['update'])) {
        $urutan = $_POST['urutan'];
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $grade = $_POST['grade'];

        $query = "UPDATE tb_grades SET student_id='$student_id', course_id='$course_id', grade='$grade' WHERE urutan='$urutan'";
        $result = mysqli_query($koneksi, $query);

        //periksa query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
        } else {
            header("Location:../../../index.php?page=grades");
        }
    }
?>