<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/contact.style.css">
    <!-- js -->
    <script src="../js/script.js" defer></script>

</head>

<body style="padding-top: 100px">
<button class="d-none toggle-dark-mode">Dark Mode On 🌙</button>
<div class="container my-5" style="max-width: 600px ; border: 1px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px;">
        <form action="_actions/create.php" method="POST" id="registerForm">

        <?php if(isset($_GET['email'])) :?>
        <div class="alert alert-danger text-center">
            <small>Email already exist!</small>
        </div>
        <?php endif ?>

          <h1 class="h3 my-3 text-center">Register</h1>

          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control mb-3" placeholder="Your Name" required>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control mb-3" placeholder="name123@email.com" required>
          
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control mb-3" required>

          <button type="submit" class="btn btn-secondary submit ">Register</button>

          <a href="../index.php" class="btn btn-primary" style="text-decoration: none">Back</button></a>

          <p class="text-center my-4">have an account ?<a href="signIn.php" class="text-primary">login</a></p>
      
        </form>
</div>

<script>

  let regex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).+$/;
  let form =document.getElementById('registerForm');

  form.addEventListener('submit', (e) => {
      let password = document.getElementById('password').value;
      if(!regex.test(password)){
      e.preventDefault();
      alert('Password must contain at least one letter, one number, and one special character.');
      }
  })


</script>
</body>
</html>