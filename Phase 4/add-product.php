<?php

ob_start();
session_start();

if ($_SESSION['id'] == ""){
    header("location: /");
}

$name = $_POST['name'];
$creator = $_SESSION['id'];
$price = $_POST['price'];
$product_image = $_FILES['product_image']['name'];
$product_image_tmp = $_FILES['product_image']['tmp_name'];
move_uploaded_file($product_image_tmp, "images/".$product_image);

$dbName = "vxb2077_marketplace";
    
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

$sql = "INSERT INTO products (name, price, owner, product_image) VALUES ('$name', '$price', '$creator', '$product_image') ";
$statement = $conn->prepare($sql);
//$statement->bind_param();
$statement->execute();
$result = $statement->get_result();

if (mysqli_error($conn) != ""){
    echo mysqli_error($conn);
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