<!DOCTYPE html>
<html>

	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	
		<link rel="stylesheet" href="style.css">
	
	</head>
	
	<body>
	
		<div id="title">
			
			<div id="imagetext">
			
				<h1>Sirkus Sirikus</h1>
			
			</div>
		
		</div>
		
		<div id="container">
		
			<p>Sirikus on pieni sirkus, joka voi järjestää esityksensä missä tahansa. Esitys voi olla isossa teatterissa tai vaikka omassa kodissasi. Katsojamäärät vaihtelevat muutamasta ihmisestä jopa satoihin. Esitysten teema voi vaihdella asiakkaan toiveiden mukaan. Teemat vaihtelevat rauhallisesta ja eteerisestä jooga teemasta vaikka räjähtävään avaruuden valloitukseen.</p>
			<p>Sirkus Sirikuksessa työskentelee 5 innokasta ja taitavaa henkilöä. He vastaavat kaikesta esitysten vaatimista järjestelyistä. Sirkuksella on käytössään oma pakettiauto jonka kyydissä kulkee kaikki esityksessä tarvittava rekvisiitta.</p>
		
		</div>
		
		<div id="shows">
		
			<?php
			
			$conn = new mysqli('localhost', 'root', '', 'sirkus');
			
			$sql = "SELECT * FROM esitys";
			$result = $conn->query($sql);
			
			while($row = $result->fetch_assoc()) {
				?>
				<div class="esitys">
					<p>Teema: <?php echo $row['teema']; ?></p>
					<p>Esityspaikka: <?php echo $row['esityspaikka']; ?></p>
					<p>Kaupunki: <?php echo $row['kaupunki']; ?></p>
					<p>Päivämäärä: <?php echo $row['pvm']; ?></p>
					<p>Paikat: <?php echo $row['vapaitapaikkoja']; ?>/<?php echo $row['paikat']; ?></p>
					<div class="tilaus"><a href="tilaus.php?id=<?php echo $row['esitysID'];?>">Tilaa Lippu</a></div>
				</div>
				<?php
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