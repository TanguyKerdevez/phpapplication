# src/mysql.php
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>phpapplication</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">phpapplication</a>
    </nav>
    <div class="container-fluid">
      <div class="row">
<form action="?" method="post">
	 <p>Surname: <input type="text" name="surname" /></p>
	 <p>Name: <input type="text" name="name" /></p>
	 <p>Age: <input type="number" name="age" /></p>
	 <p>State: <input type="text" name="state" /></p>
	 <p><input type="submit" value="Add User"></p>
	</form>
        


<?php

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["age"]))
	addUser($_POST["name"], $_POST["surname"], $_POST["age"], $_POST["state"]);
else
	getUsers();






function connexionPDO() {
$hostname	= "mysql";
$dbname		= "helloworld";
$username	= "admin";
$password	= "admin";

    try {
        $conn = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
		return null;

	}
}

function getUsers()
{
	$pdo = connexionPDO();
	if ($pdo == null)
		return;
	$result = $pdo->query("SELECT * FROM users");
	include 'users.php';
}

function createUser($name, $surname, $age, $state)
{
	
	$pdo = connexionPDO();
	if ($pdo == null)
		return;
	
	
	$sql = "INSERT INTO users (name, surname, age, state) VALUES (?,?,?,?)";
	$stmt= $pdo->prepare($sql);
	$stmt->execute([$name, $surname, $age, $state]);
}


function addUser($name, $surname, $age, $state)
{
	createUser($name, $surname, $age, $state);
	
	getUsers();
}

?>
      </div>
    </div>
  </body>
</html>