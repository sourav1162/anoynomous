<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "main";

	$conn = mysqli_connect($server,$username,$password,$dbname);

	$id=$_GET['id'];

	$sql="DELETE FROM `tab1` WHERE id=?";
	$preSql = mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($preSql,'i',$id);
	mysqli_stmt_execute($preSql);

	header("Location: http://localhost/crud/index.php");
	exit();
?>