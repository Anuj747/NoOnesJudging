<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "noonesjudging";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

$posts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($posts);

$conn->close();
?>
