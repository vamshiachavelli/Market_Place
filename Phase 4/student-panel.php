<?php

ob_start();
session_start();

if (!isset($_SESSION['id']) || $_SESSION['id'] == ""){
    header("location: login.php");
}

if (isset($_SESSION['user_type'])){
    if ($_SESSION['user_type'] != 4){
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
        }
    }
} else{
    header("location: login.php");        
}

$clubs = array();
$myclubs = array();

$products = array();
$myproducts = array();
$id = $_SESSION['id'];

$dbName = "vxb2077_marketplace";
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

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

//display orders
$orders = array();

// orders
$orders_sql = "SELECT products.id, products.name, products.price, orders.quantity AS quantity, orders.id AS orderID FROM products JOIN users JOIN orders ON users.id = orders.user_id AND products.id = orders.product_id WHERE orders.canceled = 0"; 
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

$returns_sql = "SELECT products.id, products.name, products.price, orders.quantity AS quantity, orders.id AS orderID FROM products JOIN users JOIN orders ON users.id = orders.user_id AND products.id = orders.product_id WHERE orders.canceled = 1"; 
$statement = $conn->prepare($returns_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($returns, $row);
    }
}

// All clubs
$groups_sql = "SELECT clubs.id, clubs.name, users.name AS creator, users.department FROM clubs LEFT JOIN users ON clubs.creator=users.id";
$statement = $conn->prepare($groups_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($clubs, $row);
    }
}

// my clubs
$clubs_sql = "SELECT  * FROM clubs WHERE creator = '".$_SESSION['id']."'";
$statement2 = $conn->prepare($clubs_sql);
$statement2->execute();
$result2 = $statement2->get_result();
while ($row2 = $result2->fetch_assoc()) {
    if (!empty($row2)) {
        array_push($myclubs, $row2);
    }
}

//Deleting Club

if(isset($_GET['deleteclub'])){
    $deleteClub = "DELETE FROM clubs WHERE id='".$_GET['clubId']."'";
    $st = $conn->prepare($deleteClub);
    $st->execute();
    $res = $st->get_result();
    header('location:student-panel.php?#my-club');
}

if(isset($_POST['order'])){
        
    $prodict_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['id'];

    $dbName = "vxb2077_marketplace";
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

    $sql = "INSERT INTO cart (product_id, user_id, quantity) VALUES (?,?,?) ";
    $statement = $conn->prepare($sql);
    $statement->bind_param('sss', $prodict_id, $user_id, $quantity);
    $statement->execute();
    $result = $statement->get_result();
    $_SESSION['success'] = 'Order Successful';
    header("location: student-panel.php");
}

$carts = array();

// cart
$cart_sql = "SELECT products.id, products.name, products.price, cart.quantity AS quantity, cart.id AS cartID FROM products JOIN users JOIN cart ON users.id = cart.user_id AND products.id = cart.product_id";
$statement = $conn->prepare($cart_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($carts, $row);
    }
}

//delete cart item
if (isset ($_POST['deleteCart'])){
    $dbName = "vxb2077_marketplace";
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

    $cart_id = $_POST['cartID'];

    $sql = "DELETE FROM cart WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $cart_id);
    $statement->execute();
    $result = $statement->get_result();
    $_SESSION['success'] = 'Cart Item deleted';
    header("location: student-panel.php");
}



// Deleting products
if(isset($_GET['delete']) && isset($_GET['productId']))
{
    $delete_query = 'DELETE FROM products WHERE id="'.$_GET['productId'].'"';
    $statement = $conn->prepare($delete_query);
    $statement->execute();
    $result = $statement->get_result();
    header("location: student-panel.php#myproducts");
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
    header("location: student-panel.php#myproducts");
}

$clubs_members = array();

// products
$club_sql = "SELECT club_member.id, users.id AS uid, users.name AS uname, clubs.name AS cname FROM users JOIN clubs JOIN club_member ON users.id = club_member.user_id AND clubs.id = club_member.club_id WHERE users.id != $id";
$statement = $conn->prepare($club_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($clubs_members, $row);
    }
}


$my_club = array();

$myclub_sql = "SELECT club_member.id, users.id AS uid, users.name AS uname, clubs.name AS cname FROM users JOIN clubs JOIN club_member ON users.id = club_member.user_id AND clubs.id = club_member.club_id WHERE users.id = $id";
$statement = $conn->prepare($myclub_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($my_club, $row);
    }
}

//delete Order
if (isset($_POST['deleteOrder'])){
    $dbName = "vxb2077_marketplace";
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

    $order_id = $_POST['orderID'];

    $sql = "DELETE FROM orders WHERE id = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $order_id);
    $statement->execute();
    $result = $statement->get_result();
    $_SESSION['success'] = 'Order deleted';
    header("location: student-panel.php");

}

//return order
if (isset($_POST['return'])){
    $dbName = "vxb2077_marketplace";
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

    $order_id = $_POST['orderID'];
    $update_query = "UPDATE `orders` SET `canceled` = 1 WHERE `orders`.`id` = '$order_id'";
    $statement = $conn->prepare($update_query);
    $statement->execute();
    $result = $statement->get_result();
    header("location: student-panel.php#myproducts");
}
?>
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
            <a href="blog.htm" class="links">Blog</a>
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
 <!-- content -->
    <main>
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
        <!-- CLUBS -->
        <h3>All Clubs</h3>
        <div class="box">
            <h4>Clubs</h4>
            <form action="add-club.php" method="post">
                <input type="text" name="name" placeholder="club name">
                <input type="submit" value="Add">
            </form>
        </div>
        <div class="grid">
            <?php

                foreach ($clubs as $club) {
                    echo "<div class='box'>
                        <h4>". $club['name'] ."</h4>
                        <p>created by: ". $club['creator'] ."</p>
                        <p>dept.: " . $club['department'] ."</p>
                        <form action='join-club.php' method='post'>
                        <input type='hidden' name='club_id' value='".$club['id']."'>
                        <input type='submit' value='join'>
                        </form>
                        </div>";
                }
                
            ?>
        </div>
            

        
        <hr class="margin-top:15px; margin-bottom:18px;" />
        <h3>My Clubs</h3>
        <div id="my-club" class="grid">
        <?php

            foreach ($myclubs as $myclub) {
                echo "<div class='box'>
                    <h4>". $myclub['name'] ."</h4>
                    <p>created by: ". $myclub['creator'] ."</p>
                    <form action='join-club.php' method='post'>
                    <input type='hidden' name='club_id' value='".$myclub['id']."'>
                    <a href='student-panel.php?deleteclub&clubId=".$myclub['id']."'>Remove Club</a>
                    </form>
                    </div>";
            }

        ?>
        </div>
        <h3>Club Members Lists</h3>

        <table>
            <thead>
                <td style="font-weight: 700;">Student Name</td>
                <td style="font-weight: 700;">Club Name</td>
            </thead>
            <?php
                foreach ($clubs_members as $clubs_member) {
                    echo '<tr>
                    <td>'. $clubs_member['uname'] .'</td>
                        <td>'. $clubs_member['cname'] .'</td> </tr>';
                }
            
            ?>
        </table>

        <h3>All Products</h3>
        <!-- <div class="box">
            <h4>Add Product</h4>
            <form action="add-product.php" method="post">
                <input type="text" name="name" placeholder="Product Name">
                <input type="number" name="price" id="price" placeholder="price">
                <input type="submit" value="Add">
            </form>
        </div> -->
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
                                <a href='student-panel.php?update&productId=".$myproduct['id']."&productname=".$myproduct['name']."&price=".$myproduct['price']."'>Update product</a><br><br>
                                <a href='student-panel.php?delete&productId=".$myproduct['id']."'>Remove product</a>
                            </form>
                        </div>";
                    }
                
                ?>
    
        </div>


        <div id="addNewProduct">
            <h3>Adding New Product</h3>
            <hr style="margin-top: 25px; margin-bottom:10px;" />
            <form action="add-product.php" method="post" enctype="multipart/form-data">
                Product Name: <input type="text" name="name" placeholder="Product name"> <br /><br />
                Product Price: <input type="number" name="price" placeholder="price"> <br /><br />
                Product Image: <input type="file" name="product_image"> <br /><br />
                <input type="submit" value="Add" style="width: 100px;">
            </form>
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
        <hr style="margin-top: 25px; margin-bottom:10px;" />
        <h3 style="margin-top: 20px;">My Cart</h3>
        <table>
            <?php
                if($carts){
                echo '
                <thead>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Total</td>
                <td>Action</td>
                </thead>
                ';
                foreach ($carts as $cart) {
                    $total = $cart['quantity'] * $cart['price'];
                    echo '<tr>
                    <td>'. $cart['name'] .'</td>
                        <td>'. $cart['quantity'] .'</td> 
                        <td>'. $cart['price'] .'</td> 
                        <td>'. $total .'</td> 
                        <td><form action=\'order-product.php\' method=\'post\'>
                        <input type=\'hidden\' name=\'product_id\' value=\''.$cart["id"].'\'>
                        <input type=\'hidden\' name=\'quantity\' value=\''.$cart["quantity"].'\'>
                        <input type=\'hidden\' name=\'cartID\' value=\''.$cart["cartID"].'\'>
                        <input type=\'submit\' name=\'order\' value=\'Proceed Order\'>
                        <input type=\'submit\' name=\'deleteCart\' value=\'Delete\'>
                        </form></td>                    
                    </tr>';
                }
                }else{
                    echo '<p>Cart is Empty</p>';
                }
            
            ?>
        </table>

        <hr style="margin-top: 25px; margin-bottom:10px;" />
        <h3 style="margin-top: 20px;">My Orders</h3>
        <table>
            <?php
            if($orders){
                echo '
                <thead>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Action</td>
                </thead>
                ';
                foreach ($orders as $order) {
                    echo '<tr>
                    <td>'. $order['name'] .'</td>
                        <td>'. $order['quantity'] .'</td> 
                        <td>'. $order['price'] .'</td> 
                        <td><form action=\'\' method=\'post\'>
                        <input type=\'hidden\' name=\'product_id\' value=\''.$order["id"].'\'>
                        <input type=\'hidden\' name=\'quantity\' value=\''.$order["quantity"].'\'>
                        <input type=\'hidden\' name=\'orderID\' value=\''.$order["orderID"].'\'>
                        <input type=\'submit\' name=\'return\' value=\'Return Order\'>
                        <input type=\'submit\' name=\'deleteOrder\' value=\'Delete Order\'>
                        </form></td>                    
                    </tr>';
                }
            }else{
                echo '<p>No Order Yet</p>';
            }
                
            
            ?>
        </table>

        <hr style="margin-top: 25px; margin-bottom:10px;" />
        <h3 style="margin-top: 20px;">My Canceled/Return Orders</h3>
        <table>
            <?php
            if($returns){
                echo '
                <thead>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Price</td>
                </thead>
                ';
                foreach ($returns as $return) {
                    echo '<tr>
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

    </main>


    <footer>
        <img src="img/facebook.png" alt="">
        <img src="img/instagram.png" alt="">
        <img src="img/whatsapp.png" alt="">
    </footer>

</body>
</html>