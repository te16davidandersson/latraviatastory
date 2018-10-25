<?php
	session_start();
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr - Redigera</title>
	<link href="https://fonts.googleapis.com/css?family=Merriweather|Merriweather+Sans" rel="stylesheet"> 
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav id="navbar">
	<a href="index.php">Hem</a>
	<a href="play.php?page=1">Spela</a>
	<a class="active" href="edit.php">Redigera</a>
</nav>	
<main class="content">
	<section>
		<h1>Redigera</h1>
		<form action="edit.php" method="POST">
			<fieldset>
				<p>Skapa en ny story grej</p>
				<p>
					<label for="text">Text: </label>
					<textarea rows="3" cols="50" name="text"></textarea>
				</p>
				<p>
					<label for="place">Place: </label>
					<input type="varchar" name="place">
				</p>
				<p>
					<input type="submit" name="submit" id="submit" value="Submit">
				</p>
			</fieldset>
<?php
// TODO protect with your login
// add, edit, delete pages & events
// skriv ut en lista över sidor
	//}
	

if(isset($_POST['submit'])) {
	include_once 'include/dbinfo.php';
	$dbh = new PDO('mysql:host=localhost;dbname=te16;charset=utf8mb4', $dbuser, $dbpass);
	//$filteredText = filter_input("INPUT_POST","text", FILTER_SANITIZE_SPECIAL_CHARS);
	$stmt = $dbh->prepare("INSERT INTO story(text, place) VALUES (:text , :place)");
	$stmt->bindParam(':place', $_POST['place']);
	$stmt->bindParam(':text', $_POST['text']);
	$stmt->execute();

	$sql = "SELECT * FROM story";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<pre>" . print_r($_POST,1) . "</pre>";
	echo $_POST['text'];
	}
foreach($row as $val) {
	echo "<pre> ID: " . print_r($val['id'],1) . "<br>Text: " . print_r($val['text'],1) . "</pre>";
}
?>

	</section>	
</main>
<script src="js/navbar.js"></script>
</body>
</html>