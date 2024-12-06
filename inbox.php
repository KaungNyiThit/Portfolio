<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\Auth;

$table = new Table(new MySQL);

$messages = $table->allMessages();
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
      <link rel="stylesheet" href="css/inbox.css">

    <!-- js -->
    <script src="js/script.js" ></script>
</head>
<body>
    <button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>
    
    <div class="container">
        <header>
        <a href="contact.php" class="text-white"><i class="fa-solid fa-arrow-left" style="float: left;"></i></a>
            <?php if($auth->role === "admin") : ?>
            <h1>Client Messages</h1>
            <?php else : ?>
            <h1>Message Box</h1>
            <?php endif ?>
        </header>
        
        <main>
            <section class="inbox">
                <h2>Your Messages</h2>
                <?php foreach($messages as $message)  : ?>
                <div class="message-list">
                    <div class="message-item">
                    <small class="mt-2" style="float:right"><?= $message->created_at ?></small>

                        <div class="sender"><?= $message->name ?></div>
                        <div class="subject">Email: <?= $message->email ?></div>
                        <div class="message-preview"><?= $message->message ?></div>

                        <?php if($auth->role === "admin") :?>
                        <a href="view_all_message.php?id=<?= $message->user_id ?>" class="view-message">View All Message</a>
                        <a href="responde_form.php?id=<?= $message->id ?>" class="view-message" style="float: right">Reply</a>
                        <?php endif?>

                    </div>

                    <div class="message-item">
                <div class="sender">Reply: <?= $message->response?></div>
                </div>
                </div>

                <?php endforeach ?>
            </section>
        </main>

        <footer>
            <p>&copy; 2024 Kaung Nyi Thit</p>
        </footer>
    </div>
</body>
</html>