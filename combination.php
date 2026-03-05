<?php

$servername = "localhost";
$database = "home_page"; 
$db_user = "root";
$db_pass = "";

$conn = new mysqli($servername, $db_user, $db_pass, $database);

$message = "";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "INSERT INTO home_page(username,password) VALUES('$user','$pass')";

if ($conn->query($sql) === TRUE) {

$message = "Registration Successful!";

} else {

$message = "Error: " . $conn->error;

}

}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LOGIN AND AUTHENTICATION SYSTEM</title>

<style>

body{
font-family:Arial;
display:flex;
flex-direction:column;
align-items:center;
margin-top:50px;
}

fieldset{
width:400px;
background-color:rgb(65,65,115);
color:white;
padding:20px;
border-radius:10px;
border:none;
}

input{
width:90%;
padding:10px;
margin:10px 0;
border-radius:5px;
border:1px solid #ccc;
}

button{
width:100%;
padding:10px;
background-color:blue;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
font-weight:bold;
}

button:hover{
background-color:darkblue;
}

.message{
margin-top:15px;
font-weight:bold;
color:lightgreen;
text-align:center;
}

</style>

</head>

<body>

<h1>AUTHENTICATION SYSTEM</h1>

<fieldset>

<form action="" method="POST">

<input type="text" name="username" placeholder="Injiza izina" required>

<input type="password" name="password" placeholder="Injiza password" required>

<button type="submit">SUBMIT</button>

</form>

<?php
if($message != ""){
echo "<div id='msg' class='message'>$message</div>";
}
?>

</fieldset>

<script>

const inputs = document.querySelectorAll("input");
const msg = document.getElementById("msg");

inputs.forEach(input => {
input.addEventListener("focus", () => {
if(msg){
msg.style.display = "none";
}
});
});

</script>

</body>
</html>