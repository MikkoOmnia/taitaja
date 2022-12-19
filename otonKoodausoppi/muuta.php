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
			$select = "SELECT * FROM tapahtumat";
			$result = $conn->query($select);
			
			while($row = $result->fetch_assoc()) {
				?>
				<tr>
					<form method="POST">
						<input name="tapahtumaid" type="hidden" value="<?php echo $row["id"]; ?>">
						<td><?php echo $row["id"]; ?></td>
						<td><input name="nimi" type="text" value="<?php echo $row["nimi"]; ?>"></td>
						<td><input name="pvm" type="date" value="<?php echo $row["pvm"]; ?>"></td>
						<td><input name="submit" type="submit" value="Muuta"></td>
					</form>
				</tr>
				<?php
			}
			
			if(isset($_POST["submit"])) {
				$sql = "UPDATE tapahtumat SET nimi = '{$_POST["nimi"]}', pvm = '{$_POST["pvm"]}' WHERE id = {$_POST["tapahtumaid"]}";
				$conn->query($sql);
				echo "<meta http-equiv='refresh' content='0'>";
			}
			
			?>
		</table>
			
	</body>

</html>