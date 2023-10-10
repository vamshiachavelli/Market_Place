<?php
ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_SESSION['user_type'])){
    header("location: logout.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $department= $_POST['department'];
    $password = $_POST['password'];
    $type = $_POST['user_type'];
    $business_name = "none";

    if(isset($name) && isset($email) && isset($phone) && isset($address) && isset($department) && isset($password) && isset($type)){
    
        if(strpos($email, '@') == false) {
            $_SESSION["error"] = "Input Valid Email";
            header("Location: register.php");
            return;
        }else if(!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
            $_SESSION["error"] = "Phone number must start with '+' and country code";
            header("Location: register.php");
            return;
        }else if(strlen($password) < 6){
            $_SESSION['error'] = "Password must not be less than 6 characters";
            header('Location: register.php');
            return;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $dbName = "vxb2077_marketplace";
    
        $conn = mysqli_connect("localhost", "vxb2077_mercadoescolar1", "mercadoescolar2022", $dbName); // database connection
        if (mysqli_error($conn) != ""){
            echo mysqli_error($conn);
            $_SESSION["error"] = "user registration failed";
            header("Location: register.php");
            return;
        } else {
            $sql = "INSERT INTO users (email, password, name, user_type,address, business_name, phone, department) VALUES (?,?,?,?,?,?,?,?) ";
            $statement = $conn->prepare($sql);

            $statement->bind_param('ssssssss', $email, $hashed_password, $name, $type, $address, $business_name, $phone, $department);
            $statement->execute();
            $result = $statement->get_result();

            if (!$statement){
                $_SESSION["error"] = "user registration failed";
                header("Location: register.php");
                return;
            }

            // Send email notification

            $message='Congratulations!'.$name.'You have successfully registered with Mercado Escolar. Your username is: '.$email.' '.'and your password is: '.$password;

	    require 'PHPMailer/Exception.php';
	    require 'PHPMailer/PHPMailer.php';
	    require 'PHPMailer/SMTP.php';

	    $mail = new PHPMailer;
 	    $mail->isSMTP(); // Comment this line before uploading to the server
	    $mail->SMTPDebug = 0; 
	    $mail->Host = 'smtp.gmail.com'; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
	    $mail->Port = 587; // TLS only
	    $mail->SMTPSecure = 'tls'; // ssl is depracated
	    $mail->SMTPAuth = true;
	    $mail->Username = 'mercadoescolarteam@gmail.com';
	    $mail->Password = 'uovzsfnmtcfopqtc';
	    $mail->setFrom('mercadoescolarteam@gmail.com', $name);
	    $mail->addAddress($email, $name);
 	    $mail->Subject = 'Mercado Registration Notification';
	    $mail->msgHTML($message); 
            $mail->AltBody = 'HTML messaging not supported';
	 // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

	    if(!$mail->send()){
   	    echo "Mailer Error: " . $mail->ErrorInfo;
		}else{
  		  echo '<script>alert("A mail has been sent to your registered email id")</script>';
		}

            switch ($type) {
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
    }else{
        $_SESSION['error'] = "All fields are required";
        header('Location: register.php');
        return;
        
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

    <section class="container">
        <aside class="sidebar">
            <?php
                if ( isset($_SESSION['error']) ) {
                    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
                    unset($_SESSION['error']);
                }
            ?>
            <i>Welcome to Mercado Escoler.</i><br>
	    <i>Register and order for items of your choice and we deliver to your door step</i>
        </aside>

        <div class="content">
            <div class="note">
                <p>User Registration</p>
            <form action="" method="post">
	    <table>
	    <tr><td>
            <label for="name">Your Name:</label></td><td>
            <input type="text" name="name" id="name"></tb>
	    </tr><tr><td>
            <label for="email">Email:</label></td><td>
            <input type="email" name="email" id="email"></td></tr>
            <tr><td><label for="phone">Phone Number:</label></td>
            <td><input type="text" name="phone" id="phone"></td></tr>
            <tr><td><label for="address">Address:</label></td>
            <td><input type="address" name="address" id="address"></td></tr>
            <tr><td><label for="department">Department:</label></td>
            <td><input type="text" name="department" id="department"></td></tr>
            <tr><td><label for="user_type">Role:</label></td>
            <td><select name="user_type" id="user_type">
                <option value="4">Student</option>
                <option value="3">Business Owner</option>
                <option value="2">School Admin</option>
                <option value="1">Super Admin</option>
            </select></td></tr>
                <tr><td><label>Password:</label></td>
                <td><input type="password" id="password" name="password"></td></tr>
                <tr><td></td><td><input type="submit" value="Register">
		<input type="reset" value="Reset"></td>
		</tr>
	    </table>
            </form>
            <div class="frmlink">
                <a href="forget.php">Forget Password</a>
                <a href="login.php">Login</a>
            </div>
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