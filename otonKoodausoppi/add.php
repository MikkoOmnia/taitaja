<!DOCTYPE html>
<html>

	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
		<link rel="stylesheet" href="styles.css">
	
	</head>
	
	<body>
		
		<a href="index.php">Takaisin pääsivulle</a>
		
		<table>
			<h1>Tapahtuma</h1>
			<tr>
				<th>ID</th>
				<th>Nimi</th>
				<th>Päivämäärä</th>
				<th></th>
			</tr>
			<?php 
			
			$conn = new mysqli("localhost", "root", "", "otontietokanta");
			$select = "SELECT * FROM tapahtumat WHERE id = {$_GET["id"]}";
			$result = $conn->query($select);
			
			while($row = $result->fetch_assoc()) {
				?>
				<tr>
					<form method="POST">
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["nimi"]; ?></td>
						<td><?php echo $row["pvm"]; ?></td>
				</tr>
				<?php
			}
			
			?>
		</table>
		
		<table>
			<h1>Osallistujat</h1>
			<tr>
				<th>ID</th>
				<th>Nimi</th>
				<th></th>
			</tr>
			<?php
			
			$getusers = "SELECT * FROM users WHERE tapahtuma = {$_GET["id"]}";
			$userresult = $conn->query($getusers);
			
			while($row = $userresult->fetch_assoc()) {
				?>
				<tr>
					
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["nimi"]; ?></td>
						
				<?php
			}
		
			if($userresult->num_rows < 5)
			{
				?>
				<form method="POST">
					<tr>
						<td></td>
						<td></td>
						<td><input name="nimi" placeholder="Kirjoita nimi" type="text" ></td>
						<td><input name="lisaa" type="submit" ></td>
					</tr>
				</form>
				<?php
			}
			
			if(isset($_POST["lisaa"])) {
				$sql = "INSERT INTO users(tapahtuma, nimi) VALUES ('{$_GET["id"]}', '{$_POST["nimi"]}')";
				$conn->query($sql);
				 echo "<meta http-equiv='refresh' content='0'>";
			}
			
			?>
			
			</tr>
			
		</table>
			
	</body>

</html>