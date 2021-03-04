<!DOCTYPE html>
<html>
<head>
	<title>Practice</title>
	<link rel="icon" href="https://icons.iconarchive.com/icons/graphicloads/100-flat/256/student-icon.png" type="image/gif">
</head>
<body>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<label>Name:</label>
			<input type="text" name="sName" placeholder="Enter student name" autocomplete="off" autofocus="autofocus">
		</div>
		<div>
			<label>Roll:</label>
			<input type="text" name="sRoll" placeholder="Enter student roll" autocomplete="off">
		</div>
		<div>
			<label>Subject 1:</label>
			<input type="text" name="sSub1" placeholder="Enter subject 1 marks" autocomplete="off">
		</div>
		<div>
			<label>Subject 2:</label>
			<input type="text" name="sSub2" placeholder="Enter subject 2 marks" autocomplete="off">
		</div>
		<div>
			<button type="submit" name="submit">Insert</button>
		</div>
	</form>

	<!--PHPcode start-->

	<?php

		$server="localhost";
		$username="root";
		$pass="";
		$db="main";
		$conn=mysqli_connect($server,$username,$pass,$db);

		// if (!$conn) {
		// 	echo "Sorry connection error";
		// }else{
		// 	echo "Connection Successfull";
		// }

		if (isset($_POST['submit'])) {
			$sql="INSERT INTO `tab1`(name,roll,sub1,sub2,total) VALUES(?,?,?,?,?)";
			$preSql=mysqli_prepare($conn,$sql);

			$name=$_POST['sName'];
			$roll=$_POST['sRoll'];
			$sub1=$_POST['sSub1'];
			$sub2=$_POST['sSub2'];
			$total=$sub1+$sub2;

			mysqli_stmt_bind_param($preSql,'siiii',$name,$roll,$sub1,$sub2,$total);
			mysqli_stmt_execute($preSql);

			// if (mysqli_stmt_execute($preSql)) {
			// 	echo "Inserted";
			// }else{
			// 	echo "Not Inserted";
			// }
		}

	?>

	<br />
	<br />
	<br />
	<table border="3">
		<tr>
			<th>Name</th>
			<th>Roll</th>
			<th>Subject 1</th>
			<th>Subject 2</th>
			<th>Total</th>
			<th>Operation</th>
		</tr>

<?php

	$conn=mysqli_connect($server,$username,$pass,$db);

	$sql="SELECT id,name,roll,sub1,sub2,total FROM `tab1`";
	$preSql=mysqli_prepare($conn,$sql);
	mysqli_stmt_execute($preSql);
	$getResult=mysqli_stmt_get_result($preSql);
	while ($rows=mysqli_fetch_array($getResult)) {
		?>

		<tr>
			<td><?php echo $rows['name']; ?></td>
			<td><?php echo $rows['roll']; ?></td>
			<td><?php echo $rows['sub1']; ?></td>
			<td><?php echo $rows['sub2']; ?></td>
			<td><?php echo $rows['total']; ?></td>
			<td><a href="delete.php?id=<?php echo $rows['id']; ?>">Delete Record</a></td>
		</tr>

		<?php
	}

?>

	</table>


	<!--PHP code end-->

</body>
</html>