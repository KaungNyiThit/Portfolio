<?php

 include("vendor/autoload.php");

 use Libs\Database\MySQL;
 use Libs\Database\Table;
 use Helpers\Auth;

$auth = Auth::user();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- css -->
      <link href="css/bootstrap.min.css" rel="stylesheet" >
      <link rel="stylesheet" href="css/all.min.css">
      <link rel="stylesheet" href="css/contact.style.css">

    <!-- js -->
    <script src="js/script.js" ></script>

</head>
<body>
    <button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>

    <section class="container-fluid info">

    <div class="container">
        <div style="width: 90%">
            <i class="fa-solid fa-home"><a href="index.php">Home</a></i>
                <a href="inbox.php" style="float:right">Inbox</a>
                <i class="fa-solid fa-envelope" style="font-size: 1.3rem; float:right"></i>
    

        </div>

        <h2 class="text-center mb-5" >GET IN TOUCH</h2>
        <div class="row" style="text-align: center;">

            <div class="col-4">
                <i class="fa-solid fa-location-dot mb-3" id="i"></i>
                <h5>Address</h5>
                <p>Thuta 8 street, Yangon, South Okkalapa Township</p>
            </div>

            <div class="col-4">
                <i class="fa-solid fa-phone mb-3" id="i"></i>
                <h5>Phone</h5>
                <p>+959 755735847</p>
            </div>

            <div class="col-4">
                <i class="fa-solid fa-envelope mb-3" id="i"></i>
                <h5>Mail</h5>
                <p>@kthit236@gmail.com</p>
            </div>

        </div>
    </div>
        
    </section>

    <?php if(!$auth || $auth->role === "user" ) :?>
    <section class="container" style="width: 100%; height: 400px; margin-top: 100px">
        <div class="formMessage" >
            <h4 class="text-white">Sent Message</h4>
            <form action="_actions/messageSent.php" method="post">
                
                <textarea name="message" placeholder="Write Message Here" class="form-control" id="message" rows="7" required></textarea>

                <button type="submit" class="btn btn-secondary mt-3 w-100">Send</button>

            </form>
        </div>
    </section>
    <?php endif ?>

    <footer class="m-5">
        <small>&copy; 2024 Kaung Nyi Thit</small>
    </footer>
</body>
</html>