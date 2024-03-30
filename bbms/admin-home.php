<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		.abc{
			border-radius: 30px;
        font-size: 19px;
        font-weight: 550;
        background-color: red;
        color: white;
        margin-left: 3%;
		}
		.abc:hover{
	transform: scale(1.05);
	transition: all 0.4s ease;
}
	</style>
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header"><h2><a href="admin-home.php" style="text-decoration: none; color: white; font-family: sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blood Bank Mangement System</a></h2> 
			<a href="logout.php" align="right" style="margin-left: 90%; text-decoration: none;" ><font color="black" >Logout</font></a></div>
		<div id="body">
			<br>
			<?php
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1>Welcome Admin</h1><br><br>
			<ul>
				<li class="abc"><a href="donor-reg.php">Donor Registration</a></li>
				<li class="abc"><a href="donor-list.php">Donor List</a></li>
				<li class="abc"><a href="stock-blood-list.php">In Stock Blood List</a></li>
			</ul><br><br><br><br>
			<ul>
				<li class="abc"><a href="out-stock-blood-list.php">Out Stock Blood List</a></li>
				<li class="abc"><a href="exchnge-blood-list.php">Exchange Blood Registration</a></li>
				<li class="abc"><a href="exchnge-blood-list1.php">Exchange Blood List</a></li>
			</ul>
		</div>
		<div id="footer"><h4 align="center">Group Project For Project Exhibition</h4>
			

		</div>
	</div>
</div>
</body>
</html>
