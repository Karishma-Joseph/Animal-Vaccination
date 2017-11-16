<html>
	<head>
	</head>
	
	<body>
		<?php
			$eid = $_POST['eid'];
			$password = $_POST['psw'];
			
			$db = mysqli_connect("localhost","root","","av");
			
			$q = "SELECT * FROM Login WHERE EMAIL_ID = '$eid' AND PASSWORD = '$password'";
			$result = mysqli_query($db,$q)
					  or die("Failed to query database");
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			 $count = mysqli_num_rows($result);
			 
			 if($count == 1) {
				header("location: welcome.php");
			}else {
				echo "Your Login Name or Password is invalid";
				header("location: loginfail.html");
				
			}
			
		?>
	</body>
</html>