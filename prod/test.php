<?php
$servername = "sql202.epizy.com";
$username = "epiz_31292830";
$password = "E98DahqaEQJvv";
$dbname = "epiz_31292830_SportsRealm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (f_name, l_name, avatar, email, password, session)
VALUES ('John', 'Doe', 'avatar', 'john@example.com', 'password', 'session')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>