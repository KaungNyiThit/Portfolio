<?php

namespace _actions;

include("../vendor/autoload.php");


use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;

$table = new Table(new MySQL);

$certificates = $table->certificate([
    'certificate_name' => $_POST['certificate_name'],
    'date' => $_POST['date'],
]);

return HTTP::redirect("../index.php", "add=success");


