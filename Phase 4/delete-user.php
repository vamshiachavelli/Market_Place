<?php

ob_start();
session_start();

if ($_SESSION['id'] == ""){
    header("location: /");
}

if ($id != 2 || $id!=1){
    header("location: login.php");
}

$id = $_POST['id'];

$dbName = "vxb2077_marketplace";
    
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

$sql = "DELETE FROM users WHERE id=?";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();

if (mysqli_error($conn) != ""){
    echo mysqli_error($conn);
    // echo "Product deletion failed";
    // header("location:   / ");
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