<html>
<head>
	<title>Animal Vaccination</title>

	<style>
	body{
		color: black;
		background-image: url("image.jpg");
		background-repeat: no-repeat;
		background-size: 100%;
		font-size: 20px
	     }
	</style>

	<br><br><br>
	<center><h1> FMD VACCINATION DATABASE </h1></center>
</head>

<body>
	<br><br><br><br>
	<center>
	</center>

	<br><br>
	<center>
		<?php

			$db = mysqli_connect('localhost','root','','animal_vaccination')
			or die('Error connecting to MySQL server.');

			if(isset($_POST['submit']))
				echo "Successful";

			$taluk=$_POST['TALUK'] or die ('taluk dead');
			$teams=$_POST['NUMBER_OF_TEAMS'] or die ('teams dead');
			$days=$_POST['NUMBER_OF_DAYS'] or die ('days dead');

			$tid="SELECT TID FROM PLACE WHERE TALUK='$taluk'";
			mysqli_query($db,$tid) or die ('dead');
			$result = mysqli_query($db,$tid);
			$row = mysqli_fetch_array($result);
			$res = $row['TID'];

			$select="INSERT INTO MAN_POWER (TID, TEAMS, DAYS) VALUES('$res', $teams, $days)";
			$db->query($select) or die ("Man Power already exists for taluk $taluk");
			echo "Man Power added";

		?>
	</center>

	<br><br>
	<center>
		<a href="main.html"><button>HOME</button></a>
		<br><br>
		<a href="add2.html"><button>ADD MORE MAN POWER</button></a>
	</center>
</body>
</html>
