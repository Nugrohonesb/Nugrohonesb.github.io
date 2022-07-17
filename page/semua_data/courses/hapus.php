<?php
	include "../../../asset/inc/config.php";
	$urutan = mysqli_real_escape_string($koneksi,$_GET['urutan']);
	$query = mysqli_query($koneksi,"DELETE FROM tb_courses WHERE urutan='$urutan' ");
	header('location:../../../index.php?page=courses');
?>