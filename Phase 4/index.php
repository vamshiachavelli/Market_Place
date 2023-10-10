<?php
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
    if (!isset($_POST['email']) || !isset($_POST['password'])){
        $_SESSION['error'] = "All fields are required";
        header('Location: login.php');
        return;
    }

    $email = $_POST['email'];
    $isSuccess = 0;
    $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", "vxb2077_marketplace");  // database connection
    $sql = "SELECT * FROM users WHERE email= ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $email);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        if (! empty($row)) {
            $hashedPassword = $row["password"]; 
            if (password_verify($_POST['password'], $hashedPassword)) {
                $isSuccess = 1;
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_type'] = $row['user_type'];
            }
        }
    }
    if ($isSuccess == 0) {
        echo mysqli_error($conn);
        // login user failed
        $_SESSION['error'] = "invalid username or password";
        header('Location: index.php');
        return;
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
            <a href="index.php" class="links">Home</a>
            <a href="about.htm" class="links">About</a>
            <a href="services.htm" class="links">Services</a>
            <a href="http://vxa3605.uta.cloud" class="links">Blog</a>
            <a href="contact.htm" class="links">Contact</a>
        </nav>
    </header>

    <section class="container">
        <aside class="sidebar">
            <?php
                if ( isset($_SESSION['error']) ) {
                    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                    unset($_SESSION['error']);
                }
            ?>
          <p>User Login</p>
            <form action="" method="post">
                <label for="email">User Email:</label>
                <input type="text" id="email" name="email">
                <label for="password">Password:</label>
                <input type="password" id="pword" name="password">
                <input type="submit" value="Login">
            </form>
            <div class="frmlink">
              <!--  <a href="forget.php">Forget Password</a> -->
                <a href="register.php">Register here</a>
            </div>
        </aside>

        <div class="content">
            <div class="note">
                <p>We have all you need</p>
                <p>Just order, we deliver</p>
            </div>
        </div>
    </section> 

    <footer>
        <img src="img/facebook.png" alt="">
        <img src="img/instagram.png" alt="">
        <img src="img/whatsapp.png" alt="">
    </footer>

</body>
</html>