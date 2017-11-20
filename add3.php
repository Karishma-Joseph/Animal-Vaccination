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
		<?php
	
			$db = mysqli_connect('localhost','root','','animal_vaccination')
 			or die('Error connecting to MySQL server.');
	
			if(isset($_POST['submit']))
				echo "Successful";

			$taluk=$_POST['TALUK'];
			$cattle=$_POST['CATTLE'];
			$buffalo=$_POST['BUFFALO'];
			$pig=$_POST['PIG'];

			$tid="SELECT TID FROM PLACE WHERE TALUK='$taluk'";
			$result = mysqli_query($db,$tid) or die('dead');
			$row = mysqli_fetch_array($result);
			$res = $row['TID'];

			$cattle1="SELECT CATTLE FROM TOTAL_LIVESTOCK WHERE TID='$res'";
			$result2 = mysqli_query($db,$cattle1) or die('dead');
			$row2 = mysqli_fetch_array($result2);
			$res2 = $row2['CATTLE'];

			$buffalo1="SELECT BUFFALO FROM TOTAL_LIVESTOCK WHERE TID='$res'";
			$result3 = mysqli_query($db,$buffalo1) or die('dead');
			$row3 = mysqli_fetch_array($result3);
			$res3 = $row3['BUFFALO'];
			
			$pig1="SELECT PIG FROM TOTAL_LIVESTOCK WHERE TID='$res'";
			$result4 = mysqli_query($db,$pig1) or die('dead');
			$row4 = mysqli_fetch_array($result4);
			$res4 = $row4['PIG'];
			
			if($res2!=NULL)
			{
				if($cattle<=$res2 && $buffalo<=$res3 && $pig<=$res4)
				{
					$select="INSERT INTO VACCINATED_LIVESTOCK (TID, VCATTLE, VBUFFALO, VPIG) VALUES('$res', $cattle, $buffalo, $pig)";
					$db->query($select) or die ("Vaccinated Livestock already exists for taluk $taluk");
					echo "Vaccinated Livestock added";
				}
				else
				{
					echo "Error; Vaccinated Livestock greater than Total Livestock";
				}
			}
			else
			{
				echo "Error; Total Livestock doesn't exist";
			}

		?>
	</center>
		
	<br><br>
	<center>
		<a href="main.html"><button>HOME</button></a>
		<br><br>
		<a href="add3.html"><button>ADD MORE LIVESTOCK</button></a>
	</center>
</body>
</html>
