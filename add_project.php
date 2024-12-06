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

    <form action="_actions/project.php" method="post">

        <h3 class="mb-4">Add Your Project 🗂️</h3>

        <label for="project_name">Project Name: </label>
        <input type="text" name="project_name" class="form-control my-3" placeholder="Your Project Name" required>

        
        
        <label for="project_language">Project's Language </label>
        <select name="project_language" class="form-select my-3">
            <option>Javascript</option>
            <option >Python</option>
            <option >Ruby</option>
            <option >PHP</option>
            <option >Laravel</option>
            <option>Java</option>
            <option>C#</option>
        </select>

        <button type="submit" class="btn btn-secondary my-3" >submit</button>

        <a href="index.php" class="btn btn-primary" style="text-decoration: none">Back</button></a>
    </form>

</div>
</body>
</html>