<?php

ob_start();
session_start();

if (!isset($_SESSION['id']) || $_SESSION['id'] == ""){
    header("location: login.php");
}

if (isset($_SESSION['user_type'])){
    if ($_SESSION['user_type'] != 1){
        switch ($_SESSION['user_type']) {
            case 4:
                header("location: student-panel.php");
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

$students = array();
$business_owners = array();
$school_admins = array();

$id = $_SESSION['id'];


$dbName = "vxb2077_marketplace";
        
$conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection

// students
$students_sql = "SELECT id, name, department, email, phone  FROM users WHERE user_type=4";
$statement = $conn->prepare($students_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($students, $row);
    }
}

// business owners
$students_sql = "SELECT id, name, business_name, phone FROM users WHERE user_type=3";
$statement = $conn->prepare($students_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($business_owners, $row);
    }
}

// school admins
$students_sql = "SELECT id, name, email, phone FROM users WHERE user_type=2";
$statement = $conn->prepare($students_sql);
$statement->execute();
$result = $statement->get_result();
while ($row = $result->fetch_assoc()) {
    if (!empty($row)) {
        array_push($school_admins, $row);
    }
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
        <!-- SCHOOL ADMINS -->
        <h3>School Admins</h3>
        <div class="grid">
        <?php
                foreach ($school_admins as $admin) {
                    echo "  <div class='box'>
                        <h4>".$admin['name']."</h4>
                        <p>".$admin['email']."</p>
                        <p>".$admin['phone']."</p>
                        <p>created on: 09/09/2022</p>
                        <form action='delete-user.php' method='post'>
                            <input type='hidden' name='id' value='".$admin['id']."'>
                            <button type='submit' style='background-color: red; padding: 10px; border: none;'>Remove</button>
                        </form>
                    </div>";
                }

            ?>
        </div>

        <br />
        <!-- BUSINESS OWNERS -->
        <h3>Business Owners</h3>
        <div class="grid">
        <?php
                foreach ($business_owners as $owner) {
                    echo "  <div class='box'>
                        <h4>".$owner['name']."</h4>
                        <p>".$owner['business_name']."</p>
                        <p>".$owner['phone']."</p>
                        <p>created on: 09/09/2022</p>
                        <form action='delete-user.php' method='post'>
                            <input type='hidden' name='id' value='".$owner['id']."'>
                            <button type='submit' style='background-color: red; padding: 10px; border: none;'>Remove</button>
                        </form>
                    </div>";
                }

            ?>
        </div>
        <br />

        <h3>Students</h3>
        <div class="grid">
        <?php
                foreach ($students as $student) {
                    echo "  <div class='box'>
                        <h4>".$student['id']."</h4>
                        <h4>".$student['name']."</h4>
                        <p>Dept.: ".$student['department']."</p>
                        <p>created on: 09/09/2022</p>
                        <form action='delete-user.php' method='post'>
                            <input type='hidden' name='id' value='".$student['id']."'>
                            <button type='submit' style='background-color: red; padding: 10px; border: none;'>Remove</button>
                        </form>
                    </div>";
                }

            ?>
        </div>
    </div>
    
    <footer>
        <img src="img/facebook.png" alt="">
        <img src="img/instagram.png" alt="">
        <img src="img/whatsapp.png" alt="">
    </footer>

</body>
</html>