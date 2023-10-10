<?php

ob_start();
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$complain = $_POST['complain'];

$dbName = "vxb2077_marketplace";
    
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

$sql = "INSERT INTO complains (name, email, subject, complain) VALUES (?,?,?,?)";
$statement = $conn->prepare($sql);
$statement->bind_param('ssss', $name, $email, $subject, $complain);
$statement->execute();
$result = $statement->get_result();

if (mysqli_error($conn) != ""){
    echo mysqli_error($conn);
} else {
    $_SESSION['mesg'] = "Complain recieved";
    header("location: /");
}

?>