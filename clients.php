<?php

 // Some variable or sth else to check if client is individual or corporate and send appropriate data to databse
  $surname = $_POST['surname'];
  $name = $_POST['name'];
  $companyName = $_POST['companyName'];
  $contactPerson = $_POST['contactPerson'];
  $city = $_POST['city'];
  $street = $_POST['street'];
  $streetNumber = $_POST['streetNumber'];
  $flatNumber = $_POST['flatNumber'];
  $phone = $_POST['phone'];
  $mail = $_POST['name'];

  // Database connection
  $conn = new mysqli('localhost', 'root', 'password', 'marvex_system');
  if ($conn->connect_error) {
    die('Połączenie z bazą danych nie powiodło się : '.$conn->connect_error);
  } else {

    if (individualClient) {
      $stmt = $conn->prepare("insert into Klienci_indywidualni(nazwisko, imie, miejscowosc_id, ulica, nr_domu, nr_mieszkania, telefon, mail) values(?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssiiis", $surname, $name, $city, $street, $streetNumber, $flatNumber, $phone, $mail);
      $stmt->execute();
      echo "Zapisanie danych do bazy powiodło się";
      $stmt->close();
      $conn->close();
    } else if (corporateClient) {
      $stmt = $conn->prepare("insert into Klienci_indywidualni(nazwa, osoba_kontaktowa, miejscowosc_id, ulica, nr_domu, nr_mieszkania, telefon, mail) values(?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssiiis", $companyName, $contactPerson, $city, $street, $streetNumber, $flatNumber, $phone, $mail);
      $stmt->execute();
      echo "Zapisanie danych do bazy powiodło się";
      $stmt->close();
      $conn->close();
    }

  }
?>
