<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\Table;
use Helpers\Auth;


$table = new Table(new MySQL);

$certificates = $table->allCertificate();

$diplomas = $table->allDiploma();

$projects = $table->allProject();

$adminInfo = $table->getAdminInfo();

$auth = Auth::user();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <!-- js -->
    <script src="js/script.js" defer></script>
</head>
<body>
    <header>
        <!-- nav bar -->
        <nav>
            <ul class="nav-links">
                <li ><a href="">Kaung</a></li>
                <li><a href ="index.php" class="text-primary">About</a></li>
                <li > <a href="contact.php">Contact</a></li>
                <?php if(isset($_SESSION['user'])) : ?>
                    <li class="logOut">
                        <a href="_actions/logout.php" class="text-danger text-decoration-none">Logout</a>
                    </li>
                <?php else : ?>
                    <li ><a href="e_s_r/register.php" >Register</a></li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- nav dark mode -->
        <nav>
            <button class="toggle-dark-mode" id="dark-mode">Dark Mode On 🌙</button>
        </nav>


    </header>

    <?php
    // Check if the success message cookie exists
    if (isset($_COOKIE['query_data'])) {
        echo '<div class="alrt" id="alert">
                Success.
            </div>';

        // Delete the cookie 
        setcookie("query_data", "", time() - 3600, "/");
    }
    ?>


 
    <section class="intro">

        <!-- intro left -->

        <?php foreach($adminInfo as $info) : ?>
        <div class="intro-left">
           <img src="_actions/photos/<?= $info->photo ?>" alt="My Photo" class="profile-img"> 

           <div class="uploadBtn">
           <a href="e_s_r/edit.php" style="float: right"><i class="fas fa-edit"></i></a>
           </div>
        

           <h1>I'm <?= $info->name ?></h1>
           <p><?= $info->description?></p>
        </div>
        <?php endforeach ?>

        <!-- intro right -->
        <div class="intro-right">
            <h1 style="text"><b>Creating Value through Code</b></h1>
            <button class="cta-button me-3"><a href="contact.php" class="text-decoration-none text-white">Contact Me </a></button>

            <i class="fa-brands fa-github "></i> 
            <a href="https://github.com/KaungNyiThit" class=" ">Github</a>

            <!-- projects -->
            <div class="projects" id="projects">
                <h2 class="d-inline me-3">My Projects</h2>

                <?php if($auth && $auth->role === 'admin') : ?>
                <a href="add_project.php" class="text-decoration-none add_award" style="line-height: 10px">Add Projects+ </a>
                <?php endif ?>

                <ul>

                <?php foreach($projects as $project) : ?>
                    

                    <li class="mt-3"><?= $project->project_name ?>
                    
                    <?php if($project->project_language == "PHP") : ?>
                        <small style="color: #4F5B93"><i class="fa-brands fa-php ms-4 me-1"></i><?= $project->project_language ?></small>
                    <?php elseif($project->project_language == "Laravel") : ?>
                        <small style="color: #FF2D20"><i class="fab fa-laravel ms-4 me-1"></i><?= $project->project_language ?></small>
                    <?php endif ?>

                    </li>
                <?php endforeach ?>

                </ul>
                

            </div>

            <div class="award" id="award">

                <h2 >My Education and Award</h2>

                    <h5 class="mt-3">Diploma</h5>
                    <!-- add diploma -->
                    <div class="mb-2 add_award">
                        <?php if($auth && $auth->role === 'admin') : ?>
                            <a href="add_diploma.php" class="">Add Diploma +</a>
                        <?php endif ?>
                    </div>

                    <?php foreach($diplomas as $diploma) : ?>
                    <ul>
                        <li><strong><i><?= $diploma->diploma_name ?></i></strong></li>

                        <small>/ Awarded in :
                                <small class="ms-1" style="color: #007BFF; text-decoration: underline;"> <?= $diploma->date ?></small>
                        </small>
                    </ul>
                    <?php endforeach ?>

                    <h5>Certificate</h5>
                    <!-- add certificates -->
                    <div class="mb-2 add_award">
                        <?php if($auth && $auth->role === 'admin') : ?>
                            <a href="add_certificate.php" class="">Add Certificate +</a>
                        <?php endif ?>
                    </div>

                    <?php foreach( $certificates as $certificate) : ?>
                    <ul>
                        <li><strong><i>
                           <?= $certificate->certificate_name ?></i></strong>
                        </li>

                        <small>/ Awarded in :
                                <small class="ms-1" style="color: #007BFF; text-decoration: underline;"> <?= $certificate->date ?></small>
                        </small>
                    </ul>
                    <?php endforeach; ?>
            </div>
        </div>

    </section>
<!-- footer -->
    <footer class="m-5">
        <small>&copy; 2024 Kaung Nyi Thit</small>
    </footer>

    <!-- <script>
 

    </script> -->
</body>
</html>