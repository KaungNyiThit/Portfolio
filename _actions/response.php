<?php

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;
use Helpers\Auth;

$id = $_POST['id'];
$response = $_POST['response'];

$table = new Table(new MySQL);

$table->response($id, $response);

HTTP::redirect('../inbox.php', 'reply=success');