
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'login');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $username_error="";
   $password_error="";
   $combine_error="";
	$username=@$_POST['username'];
	$password=@$_POST['password'];
   //$username="testuser";
   //$password="testpassword";
		if(isset($_POST['submit']))
		{
			if($username)
			{
   				if(!$password)
    			{
    				$username_error="Please Enter username";
    				$password_error="Please Enter password";
    			}
				$sql = "SELECT * FROM users where username='$username' and password='$password'";
    			$result = mysqli_query($conn,$sql);
    			$row = mysqli_num_rows($result);
    			if($row == 1) 
    			{
    				header("location: Dashboard.html");
    			}
    			else
    			{
    				$combine_error="Please enter valid credentials";
    			}
    		}
    		if(!$username)
    		{
    			$username_error="Please Enter username";
    			$password_error="Please Enter password";
    		}
    		if(!$password and !$username)
    		{
    			$username_error="Please Enter username";
    			$password_error="Please Enter password";
    		}

		}
?>
<html>
	<head>
		<title>
			Login with your account
		</title>
	</head>
	<body>
		<form action="login.php" method="POST">
		Username:<input type="text" name="username"><?php echo $username_error; ?><br/>
		Password:<input type="password" name="password"><?php echo $password_error; ?><br/>
		<input type="submit" value="Login" name="submit"> 
		<br/><?php echo $combine_error; ?>
	</form>
	</body>
</html>