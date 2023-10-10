<?php

ob_start();
session_start();

if ($_SESSION['id'] == ""){
    header("location: /");
}

$name = $_POST['name'];
$creator = $_SESSION['id'];

$dbName = "vxb2077_marketplace";
    
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

$sql = "INSERT INTO clubs (name, creator) VALUES (?,?) ";
$statement = $conn->prepare($sql);
$statement->bind_param('ss', $name, $creator);
$statement->execute();
$result = $statement->get_result();

if (mysqli_error($conn) != ""){
echo mysqli_error($conn);
    echo "club registration failed";
    // header("location: /");
} else {
    switch ($_SESSION['user_type']) {
        case 1:
            header("location: super-admin.php");
            break;
        case 2:
            header("location: school-admin.php");
            break;
        case 3:
            header("location: business-owner.php");
            break;
        case 4:
            header("location: student-panel.php");
            break;
        
        default:
            header("location: index.html");
            break;
    }
}



?>