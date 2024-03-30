<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Out Stock Blood List</title>
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
			<h1>Out Stock Blood List</h1>
			<center><div id="form">
				<table>
					<tr>
						<td><center><b><font color="blue">Name</font></b></center></td>
						<td><center><b><font color="Blue">Mobile No</font></b></center></td>
						<td><center><b><font color="Blue">Blood Group</font></b></center></td>						
					</tr>
					<?php
					$q=$db->query("SELECT * FROM out_stock_b");
					while($r1=$q->fetch(PDO::FETCH_OBJ))
					{
						?>
					<tr>
						<td><center><?= $r1->name; ?></center></td>
						<td><center><?= $r1->mno; ?></center></td>
						<td><center><?= $r1->bname; ?></center></td>
					</tr>
					<?php
					
				    }
				    ?>
					
				</table>	
			</div></center>
		</div>
		<div id="footer">
		</div>
	</div>
</div>
</body>
</html>
