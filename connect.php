<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "test";

$name = $_POST['name'];
$address = $_POST['address'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$residence = $_POST['residence'];
$gender = $_POST['gender'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Check if email already exists
$checkEmailQuery = "SELECT email FROM new WHERE email = '$email'";
$result = mysqli_query($conn, $checkEmailQuery);
if (mysqli_num_rows($result) > 0) {
    echo "Email already exists.";
    mysqli_close($conn);
    exit();
}

$sql = "INSERT INTO new (name, address, phone_no, email, residence, gender)
VALUES ('$name','$address','$phone_no','$email','$residence','$gender');";

if (mysqli_query($conn, $sql)) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?> 






