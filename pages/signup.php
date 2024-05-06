<?php
include "connection.php";

// Form submission handling
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        die("Please fill in all fields.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert user data into the database
    $sql = "INSERT INTO users (name, email, password) 
    VALUES ('$name', '$email', '$password');";


         if (empty($email)  || empty($password)) {
        echo "name, Password can not be empty";
        die();
    }


    $query = mysqli_query($conn, $sql);

    // $stmt->bind_param("sss", $name, $email, $hashed_password);

     if ($query) {
        echo "\nNew record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        echo "data dont submit";
    }
     echo "Data Submit Successfully";



    // $stmt->close();
}

$conn->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Tracker - Signup</title>
  <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
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
}

input[type="text"],
input[type="email"],
input[type="password"],
button {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

button {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.error {
  color: red;
  margin-bottom: 10px;
}

.login-link {
  text-align: center;
}

.login-link a {
  color: #007bff;
  text-decoration: none;
}

.login-link a:hover {
  text-decoration: underline;
}

</style>
<body>
  
  <div class="container">
    <h2>Sign Up</h2>
    <form method="post" action="signup.php">
      <input type="text" id="name" placeholder="Full Name" required name="name">
      <input type="email" id="email" placeholder="Email" required name="email">
      <input type="password" id="password" placeholder="Password" required name="password">
      <button type="submit" name="signup">Sign Up</button>
    </form>
    <div id="error" class="error"></div>
    <div class="login-link">
      Already have an account? <a href="login.php">Log in</a>
    </div>
  </div>
  <script>
    document.getElementById('signupForm').addEventListener('submit', function(event) {
  event.preventDefault();

  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;

  // Example of client-side validation
  if (!name || !email || !password) {
    document.getElementById('error').innerText = 'Please fill in all fields.';
    return;
  }

  // You can perform further validation here before submitting the form

  // Example of form submission (replace with your actual backend endpoint)
  fetch('/signup', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      name: name,
      email: email,
      password: password
    })
  })
  .then(function(response) {
    if (response.ok) {
      window.location.href = '/dashboard'; // Redirect to dashboard after successful signup
    } else {
      return response.json().then(function(data) {
        document.getElementById('error').innerText = data.message;
      });
    }
  })
  .catch(function(error) {
    console.error('Error:', error);
  });
});

  </script>















  <script src="script.js"></script>
</body>
</html>
