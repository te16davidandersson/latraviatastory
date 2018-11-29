<?php
	session_start();
	include_once 'include/dbinfo.php';
	$dbh = new PDO('mysql:host=localhost;dbname=te16;charset=utf8mb4', $dbuser, $dbpass);
	$stmt = $dbh->prepare("SELECT * FROM story");
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="se">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
	<title>Soloäventyr - Redigera</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 border border-dark ">
	<a class="border-dark" href="index.php"><img class="img-fluid" src="pastaalfredologga50.png" alt="Logotyp"></a>
	<a class="border-right border-left border-dark px-2 ml-2 py-2 text-dark" href="play.php?page=1">Spela</a>
	<a class="border-right border-dark px-2 py-2 text-dark" href="edit.php">Redigera</a>
</nav>	
<main class="content">
	<section>
		<div class="container">
		<div class="row">
			<div class="col-4">
			</div>
			<div class="col-4 text-center mt-3">
				<h1>Redigera</h1>
			</div>
			<div class="col-4">
			</div>
		</div>
		</div>
		<div class="container text-center border-bottom border-dark pb-2">
		<form action="edit.php" method="POST">
			<fieldset>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
						<p>Skapa en ny story grej</p>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<label class="font-weight-bold" for="text">Text</label>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<textarea rows="3" style="width: 69%" name="text" id="text"></textarea>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<label class="font-weight-bold" for="place">Place</label>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<input class="mb-3" style="width: 69%;" type="text" name="place" id="place">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
						<p>
							<input type="submit" class="btn btn-secondary" name="submit" id="submit" value="Submit">
						</p>
					</div>
					<div class="col-3">
					</div>
				</div>
			</fieldset>
		</form>
		</div>
		<div class="container text-center border-bottom border-dark pb-2 mt-1">
		<form action="edit.php" method="POST">
			<fieldset>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6 mt-3">
						<p>Redigera</p>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<label class="font-weight-bold" for="id">ID</label>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6 ml-5">
							<select class="form-control ml-4" style="width: 69%">
								<?php
									foreach ($row as $value) {
										echo "<option>" . $value['id'] . "</option>";
									}
								?>
							</select>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<label class="font-weight-bold" for="text">Text</label>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<textarea rows="3" style="width: 69%" type="textarea" name="textedit" id="textedit"></textarea>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<label class="font-weight-bold" for="place">Place</label>
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
							<input class="mb-3" style="width: 69%;" type="text" name="placeedit" id="placeedit">
					</div>
					<div class="col-3">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
					</div>
					<div class="col-6">
						<p>
							<input type="submit" class="btn btn-secondary" name="edit" id="edit" value="Edit">
						</p>
					</div>
					<div class="col-3">
					</div>
				</div>
			</fieldset>
		</form>
		</div>
	</section>
	<section>
<?php
	
include_once 'include/dbinfo.php';
$dbh = new PDO('mysql:host=localhost;dbname=te16;charset=utf8mb4', $dbuser, $dbpass);

if(isset($_POST['submit'])) {
	$stmt = $dbh->prepare("INSERT INTO story(text, place) VALUES (:text , :place)");
	$stmt->bindParam(':place', $_POST['place']);
	$stmt->bindParam(':text', $_POST['text']);
	$stmt->execute();
	echo "<meta http-equiv=refresh content='0; URL=edit.php'>";

	} elseif(isset($_POST['edit'])) {
		$stmt = $dbh->prepare("UPDATE story SET textedit= :textedit, placeedit = :placeedit WHERE id= :id");
		$stmt->bindParam(':textedit', $_POST['textedit']);
		$stmt->bindParam(':placeedit', $_POST['placeedit']);
		$stmt->execute();
		echo "<meta http-equiv=refresh content='0; URL=edit.php'>";
	}

	foreach($row as $val) {
		echo "<div class='container'>
				<div class='row'>
					<div class='col'>
						<pre class='border border-dark p-1'> ID: " . print_r($val['id'],1) . "<br>Text: " . print_r($val['text'],1) . "<br>Place: " . print_r($val['place'],1) . "</pre>
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