<?php

namespace _actions;

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;

$table = new Table(new MySQL);

$table->diploma([
    "diploma_name" => $_POST['diploma_name'],
    "date" => $_POST['date'],
]);

HTTP::redirect("../index.php", "add=success");