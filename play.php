<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr - Spela</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 border border-dark ">
	<a class="border-dark" href="index.php"><img class="img-fluid" src="pastaalfredologga50.png" alt="Logotyp"></a>
	<a class="border-right border-left border-dark px-2 ml-2 py-2" href="play.php?page=1">Spela</a>
	<a class="border-right border-dark px-2 py-2" href="edit.php">Redigera</a>
</nav>	
<main class="content">
	<section>
<?php
	include_once 'include/dbinfo.php'; 

	$dbh = new PDO('mysql:host=localhost;dbname=te16;charset=utf8mb4', $dbuser, $dbpass);

	if (isset($_GET['page'])) {
		$filteredPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);

		$stmt = $dbh->prepare("SELECT * FROM story WHERE id = :id");
		$stmt->bindParam(':id', $filteredPage);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		echo "<div class='container-fluid'> 
				<div class='row'>
					<div class='col text-center'>
						<p></p>
						<p class='text-dark font-weight-bold' style='font-size: 2.5em;'>" . $row['text'] . "</p>
						<p class='text-dark' style='font-size: 2em;'>Vad gör du?</p>
					</div>
				</div>
			</div>";

		$stmt = $dbh->prepare("SELECT * FROM storylinks WHERE storyid = :id");
		$stmt->bindParam(':id', $filteredPage);
		$stmt->execute();

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		foreach ($row as $val) {
			echo "<div class='container-fluid'>
					<div class='row'>
						<div class='col text-center'>
							<a class='btn btn-outline-primary btn-lg my-1' style='' href=\"?page=" . $val['target'] . "\">" . $val['text'] . "</a>
						</div>
					</div>
				</div>";
		}

		echo "<div class='container-fluid'>
				<div class='row'>
					<div class='col text-center mt-5'>
						<a class='btn btn-outline-secondary btn-sm text-center' href='play.php?page=1'>Börja om</a>
					</div>
				</div>
			</div>";

	}

?>
	</section>
</main>
<script src="js/navbar.js"></script>
</body>
</html>