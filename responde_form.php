<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\Table;

$table = new Table(new MySQL);

$id = $_GET['id'];

$messages = $table->responseView($id);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <!-- js -->
    <script src="js/script.js" defer></script>
</head>
<body>
<button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>
    <div class="container text-center my-5" style="max-width: 600px ; border: 1px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px;">

        <form action="_actions/response.php" method="post" class="mb-3">
            <a href="inbox.php" id="signIn" ><i class="fa-solid fa-arrow-left" style="float: left;"></i></a>
        
            <h1 class="h3 my-3 text-center">Responde to <?= $messages->name ?> </h1>
            <input type="hidden" name="id" value="<?= $id ?>">

            <small class="">Reply Message: <?= $messages->message ?></small>

            <textarea name="response" class="form-control my-3" placeholder="Write Your Reply" rows="7" required></textarea>
            <button class="btn btn-secondary w-100 mt-3">Reply</button>
        </form>        

    </div>
</body>
</html>