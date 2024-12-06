<?php


include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;

$table = new Table(new MySQL);

$email = $_POST['email'];



$table->insert([
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
]);

HTTP::redirect("../index.php", "register=success");