<?php

namespace _actions;

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;

$table = new Table(new MySQL);

$table->project([
    'project_name' => $_POST['project_name'],
    'project_language' => $_POST['project_language'],
]);

HTTP::redirect("../index.php", "add=success");