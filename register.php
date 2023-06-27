<?php

$servername = "localhost";      //database connection establishment
$username = "root";
$password = "";
$dbname = "db";


$conn =  mysqli_connect($servername, $username, $password, $dbname); //connecting

if ($conn) {
	echo "Connected";


}else{

	echo "Not Connected";
}

if ($conn->connect_error) {     //checking connection
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {     //registration process
    $name = $_POST["name"];
    $number = $_POST["number"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {     //password matching
        echo "Error: Passwords do not match.";
        exit();
    }

    $hashed_password=md5($password);    //hashing for security
    //insert data into database
    $sql = "INSERT INTO users (name, number, mail, password) VALUES ('$name', '$number','$mail', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. Please <a href='login.html'>login</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>