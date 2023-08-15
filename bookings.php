<?php
$insert=false;
if(isset($_POST['name'])){

// Set connection variables
$server = "localhost:3307";
$username = "root";
$password = "";
// Create a database connection
$con = mysqli_connect($server, $username , $password);


// Check for connection success
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db."

// Collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$desc = $_POST['desc'];
$sql="INSERT INTO `travelme`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `address`, `pincode`, `city`, `state`, `country`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$address', '$pincode', '$city', '$state', '$country', '$desc', current_timestamp());";

// echo $sql;
// Execute the query
if($con->query($sql)==TRUE){
    // echo "Successfully inserted";
    $insert = true; // Flag for successful insertion
    $con->close();
    header("Location: thankyou.html");
    exit(); // Make sure to exit the script after sending the header
}
else{
    echo "ERROR: $sql <br> $con->error";
}
// close the database connection
$con->close();

}

?>