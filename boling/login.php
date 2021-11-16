<?php
include("dbconnect.php");
$uname=$_POST['username'];
$pass=$_POST['password'];

session_start();




if(isset($_POST['username'])){

	$_SESSION['username'] = $uname;

	$sql="select * from user where username='".$uname."' and password= '".$pass."' limit 1"; 

	$result=mysqli_query($conn,$sql);

	if (mysqli_num_rows($result)==1) {
		while($row = mysqli_fetch_array($result)){

				$admin = "admin";
				$usr = "user";

			$role = $row['role'];
		}

		switch ($role) {
			case 'admin':
				echo "<script>window.alert('Welcome ".$_SESSION['username']." ')</script>";
				echo "<script> window.location.href='adminhome.php' </script>";
				die;

				break;
			
			case 'user':
				echo "<script>window.alert('Welcome ".$_SESSION['username']." ')</script>";
				echo "<script> window.location.href='profile.php' </script>";
				die;
				break;
		}


	}
	else{
		echo "<script>window.alert('Sorry , username or password you entered is wrong ')</script>";
		echo "<script> window.location.href='login.html' </script>";
				die;

	}
}
?>

