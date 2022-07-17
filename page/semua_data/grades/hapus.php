<?php
	include "../../../asset/inc/config.php";
	$urutan = mysqli_real_escape_string($koneksi,$_GET['urutan']);
	$query = mysqli_query($koneksi,"DELETE FROM tb_grades WHERE urutan='$urutan' ");
	header('location:../../../index.php?page=grades');
?>