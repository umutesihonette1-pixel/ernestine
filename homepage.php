<?php
$servername = "localhost"; 
$database = "home_page"; 
$db_user = "root";
$db_pass = "";

$conn = new mysqli($servername, $db_user, $db_pass, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['username']) && isset($_POST['password'])) {
        
        
        $user = $_POST['username'];
        $pass = $_POST['password'];

    
        $sql = "INSERT INTO home_page (username, password) VALUES ('$user', '$pass')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('You are successfully registered!'); window.location='homepage.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>