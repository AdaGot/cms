<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aut";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Pobranie danych z formularza
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];

// Upewnienie się, że $gender jest pojedynczym znakiem
if ($gender === 'male') {
    $gender = 'M'; // Dla mężczyzn
} elseif ($gender === 'female') {
    $gender = 'F'; // Dla kobiet
} else {
    // Domyślna wartość lub obsługa błędu, jeśli nie udało się przekazać właściwej wartości
    $gender = ''; // Domyślnie ustawione na puste pole
}

// Zapytanie SQL do dodania użytkownika
$sql = "INSERT INTO users (username, password, email, gender) VALUES ('$username', '$password', '$email', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Rejestracja zakończona sukcesem!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>