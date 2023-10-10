<?php

ob_start();
session_start();

if ($_SESSION['id'] == ""){
    header("location: /");
}
if (isset ($_POST['order'])){
    $prodict_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['id'];
    $cart_id = $_POST['cartID'];

    $dbName = "vxb2077_marketplace";
        
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

    $sql = "INSERT INTO orders (product_id, user_id, quantity) VALUES (?,?,?)";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sss', $prodict_id, $user_id, $quantity);
    $statement->execute();
    $result = $statement->get_result();
        
    //and delete from cart
        $sql = "DELETE FROM cart WHERE id = ?";
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $cart_id);
        $statement->execute();
        $result = $statement->get_result();

    if (mysqli_error($conn) != ""){
        echo mysqli_error($conn);
        echo "Product registration failed";
        // header("location: / ");
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
                $_SESSION['success'] = 'Order Successful';
                header("location: student-panel.php");
                break;
            
            default:
                header("location: index.html");
                break;
        }
    }
} else if (isset ($_POST['delete'])){
    $dbName = "vxb2077_marketplace";
        
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

    $cart_id = $_POST['cartID'];

    $sql = "DELETE FROM cart WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $cart_id);
    $statement->execute();
    $result = $statement->get_result();
    $_SESSION['success'] = 'Order deleted';
    header( 'Location: cart.php' ) ;
    return;
}

?>