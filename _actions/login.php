<?php

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$table = new Table(new MySQL);

$user = $table->loginUser($name, $email, $password);

if($user){

    session_start();

    $_SESSION['user'] = $user;

    HTTP::redirect("../index.php", "login=success");
}
    HTTP::redirect("../index.php", "incorrect=login");
