<?php 

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\Table;

$table = new Table(new MySQL);

$id = $_GET['id'];

$messages = $table->messageView($id);

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
      <link rel="stylesheet" href="css/inbox.css">
    <!-- js -->
    <script src="js/script.js" ></script>
</head>
<body>
<button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>
    <div class="container">
        <header>
            <h1>Client Messages</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </header>
        
        <main>
            <section class="inbox">
                <h2>Your Messages</h2>
                <?php foreach($messages as $message)  : ?>
                <div class="message-list">
                    <div class="message-item">
                        <div class="sender"><?= $message->name ?></div>
                        <div class="subject">Email: <?= $message->email ?></div>
                        <div class="message-preview">Message: <?= $message->message ?></div>
                        <small>Your Reply Message: <?= $message->response ?></small>

                      
                    </div>
                </div>
                <?php endforeach ?>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Your Company</p>
        </footer>
    </div>
</body>
</html>