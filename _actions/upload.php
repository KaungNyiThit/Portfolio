<?php 

include('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\HTTP;


$photoName = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

$target_file= basename($photoName);

if($type === "image/jpeg" || $type === "image/png"){
    move_uploaded_file($tmp, "photos/$target_file");

    $table = new Table(new MySQL);

    $table->update([
        'photo' => $target_file,
        'name' => $_POST['name'],
        'description' => $_POST['description'],
    ]);

    HTTP::redirect('/index.php', "upload=success");
}
    HTTP::redirect('../e_s_r/edit.php', "error=upload");
    
