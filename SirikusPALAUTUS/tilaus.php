<?php

if(!isset($_GET["id"])) {
	header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>

	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	
		<link rel="stylesheet" href="style.css">
	
	</head>
	
	<body>
	
		<div id="title">
					
			<div id="imagetext">
			
				<h1>Sirkus Sirikus	</h1>
			
			</div>
		
		</div>
		
		<div id="container">
		
		<?php
		
		$conn = new mysqli('localhost', 'root', '', 'sirkus');
			
		$showid = $_GET["id"];	
		
		$sql = "SELECT * FROM esitys WHERE esitysid = {$showid}";
		$result = $conn->query($sql);
		
		while($row = $result->fetch_assoc()) {
			?>
			<div class="esitys tilaus">
				<p>Teema: <?php echo $row['teema']; ?></p>
				<p>Esityspaikka: <?php echo $row['esityspaikka']; ?></p>
				<p>Kaupunki: <?php echo $row['kaupunki']; ?></p>
				<p>Päivämäärä: <?php echo $row['pvm']; ?></p>
				<p>Vapaita Paikkoja: <?php echo $row['vapaitapaikkoja']; ?></p>
			</div>
			<?php
		}
		
		?>
			
			<form method="POST">
			
				<div class="formfield">
					<div class="label"><label for="email">Sähköposti osoite</label></div>
					<input name="email" type="text">
				</div>
				<div class="formfield">
					<div class="label"><label for="puhnro">Puhelin numero</label></div>
					<input name="puhnro" type="text">
				</div>
				<div class="formfield">
					<div class="label"><label for="liput">Lippujen määrä</label></div>
					<input name="liput" type="number">
				</div>
				
				<input id="submit" name="submit" type="submit" value="Tilaa">
			
			</form>
			
			<?php
				if(isset($_POST["submit"])) {
					$email = $_POST["email"];
					$puhnro = $_POST["puhnro"];
					$liput = $_POST["liput"];
					
					$showid = $_GET["id"];	
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()) {
						if ($liput < $row['vapaitapaikkoja']) {
							echo "Liput tilattu!";
							$rmvticket = "UPDATE esitys SET vapaitapaikkoja = ".($row["vapaitapaikkoja"] - $liput)." WHERE esitysid = {$showid}";
							$conn->query($rmvticket);
							$ins = "INSERT INTO tilaaja(sposti, puhelin, paikkojenlkm, esitysID) VALUES ('{$email}', '{$puhnro}', {$liput}, {$showid})";
							$conn->query($ins);
						} else {
							echo "Liian vähän paikkoja jäljellä!";
						}
					}
				}
				?>
		
		</div>
		
		<div id="footer">
		
			<div id="yhteystiedot">
			
				<p>Nimi: Sirkuskoulu Sirikus</p>
				<p>Osoite: Kivenlahdentie 7,02320 Espoo</p>
				<p>Puhelin Numero: +358 50 567123</p>
				<p>Sähköposti Osoite: sirikus@sirikus.fi</p>
				
			</div>
			
			<div id="gmap">
			
				<iframe id="googlemaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1985.7009122844581!2d24.658608815451768!3d60.15257475178516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x468df4b1b436aa45%3A0x82d74da59421beb8!2sKivenlahdentie%207%2C%2002320%20Espoo!5e0!3m2!1sfi!2sfi!4v1669021521809!5m2!1sfi!2sfi" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		
			</div>
		
		</div>
		
	</body>

</html>