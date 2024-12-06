<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contact.style.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- js -->
    <script src="../js/script.js" defer></script>


</head>
<body style="padding-top: 100px"> 
<button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>
    <div class="container  my-5" style="max-width: 600px ; border: 1px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px;">
        <form action="../_actions/login.php" method="post" class="mb-3">

            <h1 class="h3 my-3 text-center">Login</h1>

            <input type="text" name="name" class="form-control mb-3" placeholder="Name" required>
            <input type="text" name="email" class="form-control mb-3" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
            <button class="btn btn-secondary ">Login</button>
            <a href="../index.php" class="btn btn-primary" style="text-decoration: none">Back</button></a>
        </form>        
    </div>
</body>
</html>