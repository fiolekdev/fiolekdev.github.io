<?php
  $deviceType = $_POST['device-type'];

  // Database connection
  $conn = new mysqli('localhost', 'root', 'password', 'marvex_system');
  if ($conn->connect_error) {
    die('Połączenie z bazą danych nie powiodło się : '.$conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into Typy_urzadzen(typ_urzadzenia) values(?)");
    $stmt->bind_param("s", $deviceType);
    $stmt->execute();
    echo "Zapisanie danych do bazy powiodło się";
    $stmt->close();
    $conn->close();
  }
?>
