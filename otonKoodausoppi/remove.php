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
		
		<?php 
		
		$getusers = "SELECT * FROM users WHERE tapahtuma = {$_GET["id"]}";
		$userresult = $conn->query($getusers);
		
		if($userresult->num_rows != 0) {
		?>
			<table>
				<h1>Osallistujat</h1>
				<tr>
					<th>ID</th>
					<th>Nimi</th>
					<th></th>
				</tr>
				<?php
				
				while($row = $userresult->fetch_assoc()) {
					?>
					<tr>
						
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["nimi"]; ?></td>
						<td>
						
						<form method="POST">
						
							<input name="userid" value="<?php echo $row["id"]; ?>" type="hidden">
							<input value="Poista" name="poista" type="submit">
						
						</form>
						
						</td>
							
					<?php
				}
				
				if(isset($_POST["poista"])) {
					$sql = "DELETE FROM users WHERE id = {$_POST["userid"]}";
					$conn->query($sql);
					echo "<meta http-equiv='refresh' content='0'>";
				}
				
				?>
				
				</tr>
				
			</table>
		
		<?php
		
		} else {
			?>
			
				<h1>Osallistujia ei ole</h1>
			
			<?php
		}
		
		?>
			
	</body>

</html>