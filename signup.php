
<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<script type="text/javascript" >
   history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
</script>
	
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body  style="background-image: url(https://images.unsplash.com/photo-1489875347897-49f64b51c1f8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80);background-size: cover;">

		<div class="nav1">
	</div>
	<div class="container">
		<form name="f1" action="" method="post">
			<table class="table table-hover" style="width: 50%;font-weight: 700;background-color: rgba(0,0,0,0.6);margin-top: 15%;margin-left: 25%;color:white;">
					
				<tr> 
					<td>User Name</td>
					<td style="text-align: center;padding-top: .5em;padding-bottom: .5em"><input type="text" name="uname" placeholder="Enter username"></td>
				</tr>
				<tr>
					<td>Create Password</td>
					<td style="text-align: center;padding-top: .5em;padding-bottom: .5em"><input type="password" name="pass" placeholder="Enter password"></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td style="text-align: center;padding-top: .5em;padding-bottom: .5em"><input type="password" name="cpass" placeholder="Confirm Password"></td>
				</tr>
			</table>
		<input type="submit" name="submit" value="Submit" class="btn btn-primary btn large" style="margin-left: 45%;width: 100px;">
		</form>
	</div>

</body>
</html>


<?php
$connection = mysqli_connect("localhost", "root", "") or die("unable  to connect");
mysqli_select_db($connection,"blog_samples");

if(isset($_POST['submit']))
{ 
	$uname=$_POST['uname'];
	$pas=$_POST['pass'];
	$pas1=$_POST['cpass'];
	if($uname!='' && $pas!='')
	{
	if($pas==$pas1)
	{
		$query1 = "CREATE TABLE login(username varchar(10) unique,password varchar(30))";
		$run1=mysqli_query($connection,$query1);
	
	$check=	("SELECT * FROM login WHERE username='$uname'");
	$result = mysqli_query($connection,$check);
	
	if(mysqli_num_rows($result) == 0)
	{
			$query2 = ("insert into login(username,password) values('$uname','$pas')");
			$run2=mysqli_query($connection,$query2);
			$flag=1;
	}
	else
	{
			echo "<script type='text/javascript'>alert('username already exist');</script>";
	}
if($flag==1)
		header("Location: index.php");
	
}

	else
	echo "<script type='text/javascript'>alert('password did not match');</script>";
}
else
{
	echo"<script>alert('Fields are Empty');</script>";
}

}	
mysqli_close($connection); 
?>

