<?php
$servername = "localhost";   //establish connection   
$username = "root";
$password = "";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {     //checking connection
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //login form data process
    $name = $_POST["name"];
    $password = $_POST["password"];
   echo $password=md5($password);
   echo "<br>";

    $sql = "SELECT * FROM users WHERE name='$name'";   //retrieve data from user 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        echo $hashed_password = $row["password"];

           if($password==$hashed_password){         //verifying password
            session_start();    //starting session to store username
            $_SESSION["name"] = $name;

            header('Location: http://localhost/webproject/dashboard.php');  //redirect to homepage
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>