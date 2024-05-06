<?php
session_start();

include "connection.php";


// Form submission handling
if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $s = "select * from users where email='$email' && password='$password'";

    $result = mysqli_query($conn, $s);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        header("location:../index.php");

    } else{
        echo '<script>alert("wrong pass or username . please try again")</script>';

    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker - Login</title>
  <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
}

.container {
  max-width: 400px;
  margin: 100px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.error {
  color: red;
  margin-bottom: 20px;
}

.signup-link {
  text-align: center;
}

.signup-link a {
  color: #007bff;
  text-decoration: none;
}

.signup-link a:hover {
  text-decoration: underline;
}

</style>
<body>
  <div class="container">
    <h2>Login</h2>
    <form id="loginForm"  method="post" action="dashboard.php">
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Your password" required>
      </div>
      <button type="submit" name="signin">Login</button>
    </form>
    <div id="error" class="error"></div>
    <div class="signup-link">
      Don't have an account? <a href="signup.php">Sign up</a>
    </div>
  </div>



  <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault();

  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  // Basic validation
  if (!email || !password) {
    document.getElementById('error').innerText = 'Please enter both email and password.';
    return;
  }

  // Submit the form
  this.submit();
});

  </script>
  <script src="script.js"></script>
</body>
</html>
