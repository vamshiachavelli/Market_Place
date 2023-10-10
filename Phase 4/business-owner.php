<?php

ob_start();
session_start();

if (!isset($_SESSION['id']) || $_SESSION['id'] == ""){
    header("location: login.php");
}

if (isset($_SESSION['user_type'])){
    if ($_SESSION['user_type'] != 3){
        switch ($_SESSION['user_type']) {
            case 1:
                header("location: super-admin.php");
                break;
            case 4:
                header("location: student-panel.php");
                break;
            case 2:
                header("location: school-admin.php");
                break;
        }
    }
} else{
    header("location: login.php");        
}



$orders = array();
$products = array();

$id = $_SESSION['id'];

$dbName="vxb2077_marketplace";
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

// orders
$orders_sql = "SELECT orders.quantity, products.name, users.name as buyer, users.department FROM orders LEFT JOIN products ON orders.product_id=products.id LEFT JOIN users ON users.id=orders.user_id";
$statement = $conn->prepare($orders_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($orders, $row);
    }
}

//return/canceled orders
$returns = array();

$returns_sql = "SELECT users.name as uname, products.id, products.name, products.price, orders.quantity AS quantity, orders.id AS orderID FROM products JOIN users JOIN orders ON users.id = orders.user_id AND products.id = orders.product_id WHERE orders.canceled = 1"; 
$statement = $conn->prepare($returns_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($returns, $row);
    }
}

// products
$products_sql = "SELECT products.id, products.name, products.product_image, products.price, users.name AS seller, users.department FROM products INNER JOIN users ON users.id = products.owner";
$statement = $conn->prepare($products_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($products, $row);
    }
}

$myproducts = array();

//my products
$myproducts_sql = "SELECT * FROM products WHERE owner = '".$_SESSION['id']."'";
$statement1 = $conn->prepare($myproducts_sql);
$statement1->execute();
$result1 = $statement1->get_result();
while ($row1 = $result1->fetch_assoc()) {
    if (!empty($row1)) {
        array_push($myproducts, $row1);
    }
}

//Updating product
if(isset($_POST['updating'])){

    $productID = $_POST['productid'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['product_image'];

    $update_query = "UPDATE `products` SET `name` = '$product_name', `price` = '$product_price' WHERE `products`.`id` = '$productID'";
    $statement = $conn->prepare($update_query);
    $statement->execute();
    $result = $statement->get_result();
    header("location: business-owner.php#myproducts");
}

// Deleting products
if(isset($_GET['delete']) && isset($_GET['productId']))
{
    $delete_query = 'DELETE FROM products WHERE id="'.$_GET['productId'].'"';
    $statement = $conn->prepare($delete_query);
    $statement->execute();
    $result = $statement->get_result();
    header("location: business-owner.php#myproducts");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="head-content">
            <img src="img/logo.JPG" alt="" class="logo">
            <h1>Mercado Escolar Students Shopping Platform</h1>
        </div>
        <form action="" class="search">
            <input type="text">
            <input type="submit" value="Search">
        </form>
        <nav>
            <a href="index.htm" class="links">Home</a>
            <a href="about.htm" class="links">About</a>
            <a href="services.htm" class="links">Services</a>
            <a href="http://vxa3605.uta.cloud" class="links">Blog</a>
            <a href="contact.htm" class="links">Contact</a>
        </nav>
    </header>

    <div style="display: flex; justify-content: end"> 
            <a href="chat.php" style="margin: 10px; color: green;">Chat</a>           
            <a href="#addNewProduct" style="margin: 10px; color: red;">Add Product</a>
            <a href="logout.php" style="margin: 10px; color: red;">Logout</a>
        </div>
    <h2 style="margin: 20px;">Welcome: <?php  echo $_SESSION['name'];  ?> </h2>
    <?php
        if ( isset($_SESSION['error']) ) {
            echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
            unset($_SESSION['error']);
        }else if ( isset($_SESSION['success']) ) {
            echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
            unset($_SESSION['success']);
        } 
    ?>

    <div class="content">
        <!-- ORDER -->
        <h3>Order</h3>
        <div class="grid">
            <?php
                
                foreach ($orders as $order) {
                    echo " <div class='box'>
                        <h4>".$order['name']."</h4>
                        <p>dept.: ".$order['department']."</p>
                        <p>Buyer: ".$order['buyer']."</p>
                        <p>created on: 09/09/2022</p>
                        <p>Quantity: ".$order['quantity']."</p>
                    </div>";
                }

            ?>
        </div>

        <hr style="margin-top: 25px; margin-bottom:10px;" />
        <h3 style="margin-top: 20px;">Canceled/Return Orders</h3>
        <table>
            <?php
            if($returns){
                echo '
                <thead>
                <td>Name</td>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Price</td>
                </thead>
                ';
                foreach ($returns as $return) {
                    echo '<tr>
                    <td>'. $return['uname'] .'</td>
                    <td>'. $return['name'] .'</td>
                        <td>'. $return['quantity'] .'</td> 
                        <td>'. $return['price'] .'</td>                    
                    </tr>';
                }
            }else{
                echo '<p>No Order Yet</p>';
            }
                
            
            ?>
        </table>
        
        <hr style="margin-top: 25px; margin-bottom:10px;" />
        <!-- PRODUCTS -->
        <h3>Products</h3>
        <div class="box">
            <h4>New Product</h4>
            <form action="add-product.php" method="post" enctype="multipart/form-data">
                <p>seller: <small> seller </small></p>
                <input type="text" name="name" placeholder="Product name">
                <input type="number" name="price" placeholder="price">
                <input type="file" name="product_image">
                <input type="submit" value="Add">
            </form>
        </div>
        <div class="grid">
                <?php
                    foreach ($products as $product) {
                        echo " <div class='box'>
                            <img src='images/".$product['product_image']."' width='100' height='100' />
                            <h4>". $product['name'] ."</h4>
                            <p>seller: ". $product['seller'] ." </p>
                            <p>Price: ". $product['price'] ." </p>
                            <p>Dept.: ". $product['department'] ."</p>
                            <form action='' method='post'>
                        <input type='hidden' name='product_id' value='".$product['id']."'>
                        <input type='number' name='quantity'>
                        <input type='submit' name='order' value='Order'>

                        </form>
                        </div>";
                    }
                
                ?>
        </div>

        <hr style="margin-top: 25px; margin-bottom:10px;" />
        <h3 id="myproducts">My Products</h3>
        <div class="grid" id="myProducts" style="margin-bottom: 20px;">

                <?php
                    foreach ($myproducts as $myproduct) {
                        echo " <div class='box'>
                            <img src='images/".$myproduct['product_image']."' width='100' height='100' />
                            <h4>". $myproduct['name'] ."</h4>
                            <p>Price: ". $myproduct['price'] ." </p>
                            <form action='' method='post'>
                                <input type='hidden' name='product_id' value='".$myproduct['id']."'>
                                <a href='business-owner.php?update&productId=".$myproduct['id']."&productname=".$myproduct['name']."&price=".$myproduct['price']."'>Update product</a><br><br>
                                <a href='business-owner.php?delete&productId=".$myproduct['id']."'>Remove product</a>
                            </form>
                        </div>";
                    }
                
                ?>
        </div>

        <?php 
        if(isset($_GET['update']) && isset($_GET['productId']) && isset($_GET['productname']))
        {
            ?>
                <div id="addNewProduct">
                <h3>Updating Product : <?php echo $_GET['productname'] ?></h3>
                <hr style="margin-top: 25px; margin-bottom:10px;" />
                <form action="student-panel.php" method="POST" enctype="multipart/form-data">
                    Product Name: <input type="text" value="<?php echo $_GET['productname'] ?>" name="name" placeholder="Product name"> <br /><br />
                    Product Price: <input type="number" value="<?php echo $_GET['price'] ?>" name="price" placeholder="price"> <br /><br />
                    Product Image: <input type="file" name="product_image"> <br /><br />
                    <input type="hidden" value="<?php echo $_GET['productId'] ?>" name="productid">
                    <input type="submit" value="Save Changes" name="updating" style="width: 100px;">
                </form>
                </div>
            
            
            <?php
        }
        ?>

        <!-- POSTS -->
        <!-- <h3>Chats</h3>
        <div>
            <div class="box">
                <h4>Post Title</h4>
                <p style="font-style: italic;">Author: Student Name | Dept: department | Date Posted: 09/09/2022</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus unde dolor ullam quas
                    suscipit
                    quam odio vel exercitationem mollitia veritatis!</p>
            </div>
            <div class="box">
                <h4>Post Title</h4>
                <p style="font-style: italic;">Author: Student Name | Dept: department | Date Posted: 09/09/2022</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus unde dolor ullam quas
                    suscipit
                    quam odio vel exercitationem mollitia veritatis!</p>
            </div>
        </div> -->
    </div>

    <footer>
        <img src="img/facebook.png" alt="">
        <img src="img/instagram.png" alt="">
        <img src="img/whatsapp.png" alt="">
    </footer>

</body>
</html>