<?php
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $student_id = $_POST['student_id'];
        $course_id = $_POST['course_id'];
        $grade = $_POST['grade'];

        // include database connection file
        include_once("../../../asset/inc/config.php");

        // Insert file into table
        $result = mysqli_query($koneksi, "INSERT INTO tb_grades(student_id,course_id,grade) VALUES ('$student_id','$course_id','$grade')");

        // Show message when user added
        header("Location:../../../index.php?page=grades");
    }
?>