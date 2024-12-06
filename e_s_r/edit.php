<?php

 include("../vendor/autoload.php");

 use Libs\Database\MySQL;
 use Libs\Database\Table;
 use Helpers\Auth;

$table = new Table(new MySQL);
$adminInfo = $table->getAdminInfo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contact.style.css">

    <script src="../js/script.js" defer></script>
</head>

<body style="padding-top: 100px">
<button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>

<div class="container my-3 edit" style="max-width: 600px ; border: 1px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px;">
  
  <h3>Upload New</h3>

    <form action="../_actions/upload.php" method="post" enctype="multipart/form-data">
    <?php foreach($adminInfo as $info) : ?>
        <div class="input-group mb-3">
                <label class="m-2">Add Photo</label>
                <input type="file"   name="photo" class="form-control" required>
        </div>

        <label for="name" class="">Name: </label>
        <input type="text" name="name" class="form-control" value="<?= $info->name ?>" placeholder="Name" required>

        <div class="my-3">
            <label for="description" >Description: </label>
            <input type="text" name="description" value="<?= $info->description ?>" class="form-control"   placeholder="Description" required>
        </div>
        
    <?php endforeach ?>
        <button class="btn btn-primary my-3 " type="submit">Upload</button>

        <a href="../index.php" class="btn btn-primary" style="text-decoration: none">Back</button></a>
    </form>    
</div>
</body>
</html>