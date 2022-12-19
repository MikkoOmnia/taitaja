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
			$select = "SELECT * FROM tapahtumat WHERE pvm > NOW()";
			$result = $conn->query($select);
			
			while($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["nimi"]; ?></td>
					<td><?php echo $row["pvm"]; ?></td>
					<td>
						
						<a href="add.php?id=<?php echo $row["id"]; ?>">Lisää Osallistuja</a>
						<a href="remove.php?id=<?php echo $row["id"]; ?>">Poista Osallistuja</a>
						
					</td>
				</tr>
				<?php
			}
			
			?>
		</table>
			
	</body>

</html>