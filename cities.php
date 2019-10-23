<?php
  $city = $_POST['city'];
  $postalCode = $_POST['postalCode'];

  // Database connection
  $conn = new mysqli('localhost', 'root', 'password', 'marvex_system');
  if ($conn->connect_error) {
    die('Połączenie z bazą danych nie powiodło się : '.$conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into Miejscowosci(miejscowosc, kod_pocztowy) values(?, ?)");
    $stmt->bind_param("ss", $city, $postalCode);
    $stmt->execute();
    echo "Zapisanie danych do bazy powiodło się";
    $stmt->close();
    $conn->close();
  }
?>
