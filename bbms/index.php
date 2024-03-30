<?php
include('connection.php');
session_start()
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		
	</style>
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blood Bank Mangement System</h2> </div>
		<div id="body">
		    <br><br>
		    <form action="" method="post">
		    <table align="center">
		    	<tr>
		    		<td width="200" height="50px"><b>Enter Username:</b></td>
		    		<td width="100px" height="50px"><input type="text" name="un" placeholder="Enter Username" style="width: 180px; height: 40px; border-radius: 10px;" required></td>
		    	</tr>
		    	<tr>
		    		<td width="200x" height="70px"><b>Enter Password:</b></td>
		    		<td width="200x" height="70px"><input type="Password" name="ps" placeholder="Enter Password" style="width: 180px; height: 40px; border-radius: 10px; " required></td>
		    	</tr>
		    	<tr>
		    		<td><input type="submit" name="sub" value="Login" style="width: 50px; height: 30px; border-radius: 5px; background-color: red; color: white; border:none; border-radius: 30px;
        height: 40px;
        width: 100px;
        font-size: 19px;
        font-weight: 550;
        background-color: red;
        border: red;
        color: white;
        transition: all 0.3s ease;
        margin-left: 3%;"></td>
		    	</tr>
		    </table>
		</form>
		<?php
		if(isset($_POST['sub']))
		{
			$un=$_POST['un'];
			$ps=$_POST['ps'];
			$q=$db->prepare("SELECT * FROM admin where uname='$un' && pass='$ps'");
			$q->execute();
			$res=$q->fetchALL(PDO::FETCH_OBJ);
			if($res){
				$_SESSION['un']=$un;
				header("Location:admin-home.php");
			}
			else{
				echo "<script> alert('wrong user');</script>";
			}
		}
		?>
		</div>
		<div id="footer"><h4 align="center">Group Project For Project Exhibition</h4></div>
	</div>
</div>
</body>
</html>
