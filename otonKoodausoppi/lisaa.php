<!DOCTYPE html>
<html>

	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
		<link rel="stylesheet" href="styles.css">
	
	</head>
	
	<body>
		
		<a href="index.php">Takaisin pääsivulle</a>
		
		<form method="POST">
		
			<label for="nimi">Tapahtuman nimi</label>
			<input name="nimi" type="text">
			<label for="pvm">Tapahtuman pvm</label>
			<input name="pvm" type="date">
			
			<div><input name="submit" type="submit"></div>
			
		</form>
		
		<?php
		
		$conn = new mysqli("localhost", "root", "", "otontietokanta");
		
		if(isset($_POST["submit"])) {
			$sql = "INSERT INTO tapahtumat(nimi, pvm) VALUES ('{$_POST["nimi"]}', '{$_POST["pvm"]}')";
			$conn->query($sql);
			echo "Tapahtuma lisätty!";
		}
		
		?>
			
	</body>

</html>