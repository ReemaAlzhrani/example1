<?php
header('Content-Type: application/json');


$servername = "localhost";
$username = "dirction";
$password = "12345"; 
$dbname = "RobotControlPanel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$input = json_decode(file_get_contents('php://input'), true);
$command = $input['command'];

$sql = "INSERT INTO direction (command) VALUES ('$command')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
