<?php
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "healthcaredb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user_id = $_POST["user_id"];
$hospital_id = $_POST["hospital_id"];
$date_joined = $_POST["date_joined"];
$date_left = $_POST["date_left"];
$is_active = $_POST["is_active"];

$sql = "INSERT INTO hospital_users (user_id, hospital_id, date_joined, date_left, is_active) VALUES ('$user_id', '$hospital_id', '$date_joined', '$date_left', '$is_active')";

if ($conn->query($sql) === TRUE) {
  $response = ["success" => true, "message" => "New record created successfully"];
  echo json_encode($response);
} else {
  $response = ["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error];
  echo json_encode($response);
}

$conn->close();
?>
