<!DOCTYPE html>
<html>

	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
		<link rel="stylesheet" href="styles.css">
	
	</head>
	
	<body>
		
		<a href="index.php">Takaisin pääsivulle</a>
		
		<table>
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
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["nimi"]; ?></td>
					<td><?php echo $row["pvm"]; ?></td>
					<td>
					
						<form method="post">
						
							<input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
							<input value="Poista" name="delete" type="submit">
						
						</form>
						
					</td>
				</tr>
				<?php
			}
			
			?>
		</table>
		
		<?php 
		
		if(isset($_POST["delete"])) {
			$del = "DELETE FROM tapahtumat WHERE id = {$_POST["id"]}";
			$conn->query($del);
			echo "Tapahtuma poistettu!";
		}
		
		?>
			
	</body>

</html>