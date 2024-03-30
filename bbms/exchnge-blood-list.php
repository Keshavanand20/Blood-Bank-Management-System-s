<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exchange Blood Rgistration</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		#form1{
	width: 80%;
	height: 320px;
	background-color: red;
	color: white;
	border-radius: 10px;
}
.name{
	color: white;
}
.btn:hover{
	transform: scale(1.1);
	transition: all 0.4s ease;
}

	</style>
}
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
			<h1>Exchange Blood Donor Regiteration</h1>
			<center><div id="form1">
				<form action="" method="post">
				<table>
					<tr>
						<td width="200px" height="50px" class="name">Enter Name</td>
						<td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name" required></td>
						<td width="200px" height="50px" class="name">Enter Father's Name</td>
						<td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name" required></td>
					</tr>
					<tr>
						<td width="200px" height="50px" class="name">Enter Address</td>
						<td width="200px" height="50px"><textarea name="address" required></textarea></td>
						<td width="200px" height="50px" class="name">Enter City</td>
						<td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City" required></td>
					</tr>
					<tr>
						<td width="200px" height="50px" class="name">Enter Age</td> 
						<td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age" required></td>
						<td width="200px" height="50px" class="name">Enter E-Mail</td>
						<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail" required></td>
						</td>
					</tr>
					<tr>
						<td width="200px" height="50px" class="name">Enter Mobile No</td>
						<td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile No" required></td>
					</tr>
					<tr>
						<td width="200px" height="50px" class="name">Select Blood Group</td>
						<td width="200px" height="50px">
							<select name="bgroup">
								<option>O+</option>
								<option>AB+</option>
								<option>AB-</option>
							</select>
						</td>
						<td width="200px" height="50px" class="name">Exchange Blood Group</td>
						<td width="200px" height="50px">
							<select name="exbgroup">
								<option>O+</option>
								<option>AB+</option>
								<option>AB-</option>
							</select>
						</td>
					</tr>
						<td>
							<input type="submit" class="btn" name="sub" value="Save" style="border-radius: 30px;
        height: 30px;
        width: 70px;
        font-size: 19px;
        font-weight: 550;
        background-color: white;
        color: red;
        transition: all 0.3s ease;
        margin-left: 350%;">>
						</td>
					</tr>
				</table>
			</form>
			<?php
			if(isset($_POST['sub']))
			{
				//front end data input
				$name=$_POST['name'];
				$fname=$_POST['fname'];
				$address=$_POST['address'];
				$city=$_POST['city'];
				$age=$_POST['age'];
				$bgroup=$_POST['bgroup'];
				$mno=$_POST['mno'];
				$email=$_POST['email'];
				$exbgroup=$_POST['exbgroup'];
				//front end data input end 

				//select and insert
				$q="SELECT * FROM donor_registration WHERE bgroup='$bgroup'";
				$st=$db->query($q);
				$num_row=$st->fetch();
				$id=($num_row['id']);
				$name=($num_row['name']);
				$b1=($num_row['bgroup']);
				$mno=($num_row['mno']);
				$q1="INSERT INTO out_stock_b (bname,name,mno) value(?,?,?)";
				$st1=$db->prepare($q1);
				$st1->execute([$b1,$name,$mno]);
				//select and insert closes

				//delete code 
				$delete_q="delete from donor_registration where id='$id'";
				$st=$db->prepare($delete_q);
				$st->execute();
				//delete end


				//exchange info insert
				$q=$db->prepare("INSERT INTO exchange_b (name,fname,address,city,age,bgroup,mno,email,ebgroup) VALUES (:name,:fname,:address,:city,:age,:bgroup,:mno,:email,:ebgroup)");
				$q->bindValue('name',$name);
				$q->bindValue('fname',$fname);
				$q->bindValue('address',$address);
				$q->bindValue('city',$city);
				$q->bindValue('age',$age);
				$q->bindValue('bgroup',$bgroup);
				$q->bindValue('mno',$mno);
				$q->bindValue('email',$email);
				$q->bindValue('ebgroup',$exbgroup);
				if($q->execute())
				{
					echo "<script>alert('Registration Successfull')</script>";
				}
				else
				{
					echo "<script>alert('Registration Fail')</script>";
				}
				//exchange info insert end
			}
			?>
				
			</div></center>
		</div>
		<div id="footer">

		</div>
	</div>
</div>
</body>
</html>
