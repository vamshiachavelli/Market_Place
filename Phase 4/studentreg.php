<?php

if (isset($_POST['submit'])){

    $username = $_POST['name'];
    $usernumber = $_POST['pnumber'];
    $usermail = $_POST['email'];


    $usersubject = "Student Registration!";
    $usermessage = "Hello," .$username. " Thank you for registering!";

    $to = $usermail;
    $userbody = "";
    $headers = "From: no-reply@picnic.com";

    $userbody .= $usermessage. "\r\n";

    mail($to, $usersubject, $userbody, $headers);

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

    <section class="container" style="background: #fff; padding: 10px 0; display: flex; flex-direction: column; height: auto;">
        <div class="item" style="margin-bottom: 10px; display: flex; justify-content: center;">
            <p style="border: none;">Student Registration Page</p>
        </div>
        <form method="post">
                <div class="item" style="margin-bottom: 10px;">
                    <p style="width: 20%; border: none;">Your Name</p>
                    <input type="text" name="name" id="" style="width: 80%; border: 1px solid black;">
                </div>
                <div class="item" style="margin-bottom: 10px;">
                    <p style="width: 20%; border: none;">Email</p>
                    <input type="text" name="email" id="" style="width: 80%; border: 1px solid black;">
                </div>
                <div class="item" style="margin-bottom: 10px;">
                    <p style="width: 20%; border: none;">Address</p>
                    <input type="text" name="address" id="" style="width: 80%; border: 1px solid black;">
                </div>
                <div class="item" style="margin-bottom: 10px;">
                    <p style="width: 20%; border: none;">Phone_No</p>
                    <input type="text" name="pnumber" id="" style="width: 80%; border: 1px solid black;">
                </div>
                <div class="item" style="margin-bottom: 10px; display: flex; align-items: center; justify-content: center;">
                    <input type="submit" name="submit" value="Send" style="margin-right: 10px;">
                    <input type="reset" value="Cancel">
                </div>
            </form>
    </section> 

    <footer>
        <img src="img/facebook.png" alt="">
        <img src="img/instagram.png" alt="">
        <img src="img/whatsapp.png" alt="">
    </footer>

</body>
</html>