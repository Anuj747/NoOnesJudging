<?php
$host = "localhost"; // usually localhost
$user = "root";      // your MySQL username
$pass = "";          // your MySQL password
$db   = "noonesjudging"; // database name

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$author = $conn->real_escape_string($_POST['author'] ?? '');
$title  = $conn->real_escape_string($_POST['title'] ?? '');
$content = $conn->real_escape_string($_POST['content'] ?? '');

if (!empty($content)) {
    $sql = "INSERT INTO posts (author, title, content, created_at) VALUES ('$author', '$title', '$content', NOW())";
    if ($conn->query($sql)) {
        echo "success";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Poem content is required.";
}

$conn->close();
?>
