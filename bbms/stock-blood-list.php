<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donor Rgistration</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		td{
			width: 200px;
			height: 40px;
			color: white;
		}
		
	</style>
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header"><h2><a href="admin-home.php" style="text-decoration: none; color: white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blood Bank Mangement System</a></h2>
		<a href="logout.php" align="right" style="margin-left: 90%; text-decoration: none;" ><font color="black" >Logout</font></a> </div>
		<div id="body">
			<br>
			<?php
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1>In Stock Blood List</h1>
			<center><div id="form">
				<table>
					<tr>
						<td><center><b><font color="orange">Type</font></b></center></td>
						<td><center><b><font color="orange">Quantity</font></b></center></td>
						
					</tr>
					
					<tr>
						<td><center>O+</center></td>
						<td><center>
							<?php
							$q=$db->query("SELECT * FROM donor_registration where bgroup='O+'");
							echo $row=$q->rowcount();
							?>
						</center></td>
					</tr>
					<tr>
						<td><center>AB+</center></td>
						<td><center>
							<?php
							$q=$db->query("SELECT * FROM donor_registration where bgroup='AB+'");
							echo $row=$q->rowcount();
							?>
						</center></td>
					</tr>
					<tr>
						<td><center>AB-</center></td>
						<td><center>
							<?php
							$q=$db->query("SELECT * FROM donor_registration where bgroup='Ab-'");
							echo $row=$q->rowcount();
							?>
						</center></td>
					</tr>
					
					
				</table>	
			</div></center>
		</div>
		<div id="footer">
		</div>
	</div>
</div>
</body>
</html>
