<?php

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$name = $auth->name;
$email = $auth->email;
$message = $_POST['message'];
$user_id = $auth->id;

$table = new Table(new MySQL);

$table->messages($name, $email, $message, $user_id);

HTTP::redirect("/contact.php", "message=send");