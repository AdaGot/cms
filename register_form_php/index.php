<?php
$servername="localhost";
$username ="root";
$password ="";
$dbname ="aut";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połaczenie nieudane: " $conn->connect_error);
}

// pobranie danych z formularza
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$username ="username";
$sql = "INSERT INTO users (username,password,email) values ($username,$password,$email)"

if ($conn->query($sql) === TRUE) {
    echo "Rejestracja zakończona sukcesem!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>