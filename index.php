<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr</title> 
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 border border-dark ">
	<a class="border-dark" href="index.php"><img class="img-fluid" src="pastaalfredologga50.png" alt="Logotyp"></a>
	<a class="border-right border-left border-dark px-2 ml-2 py-2 text-dark" href="play.php?page=1">Spela</a>
	<a class="border-right border-dark px-2 py-2 text-dark" href="edit.php">Redigera</a>
</nav>	
<main class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col text-center">
					<p></p>
					<h1 class="text-primary">Välkommen till det berömda story-spelet pasta alfredo!</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
			</div>
			<div class="col-6 text-center mb-3">
				<p class="font-weight-bold mt-5">Hur spelar man?</p>
				<p class="">Tryck på spela i navbaren för att börja spelet, du får en text som beskriver situationen du är i och ett antal alternativ som du får välja mellan. Du bestämmer alltså själv vilet håll storyn ska ta. Om du kommer till ett slut eller ångrar dina val så kan du alltid trycka på börja om knappen.</p>
			</div>
			<div class="col-3">
			</div>
		</div>
		<div class="row">
			<div class="col text-center mb-5">
				<img class="img-fluid mt-5" src="pastaalfredologga500.png" alt="Logotyp för Pasta Alfredo">
			</div>
		</div>
	</div>
</main>
<script src="js/navbar.js"></script>
</body>
</html>