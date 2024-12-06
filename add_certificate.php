<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- js -->
    <script src="js/script.js" defer></script>
</head>
<body>
        <button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>

        <div  class="container my-4 add" style="max-width: 500px;">

            <form action="_actions/certificate.php" method="post">

                <h3 class="mb-4">Add Your Certificate 📜</h3>

                <label for="certificate_name">Certificate: </label>
                <input type="text" name="certificate_name" class="form-control my-3" placeholder="Your Certificate" required>
                
                <label for="date">Awarded Date: </label>
                <input type="date" name="date" class="form-control my-3" placeholder="Your Awarded Date" required>

                <button type="submit" class="btn btn-secondary  my-3" >submit</button>

                <a href="index.php" class="btn btn-primary" style="text-decoration: none">Back</button></a>

            </form>

        </div>
</body>
</html>