<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact - Expense Tracker</title>
  <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
}

header {
  background-color: #333;
  color: #fff;
  padding: 10px 0;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

.container {
  max-width: 800px;
  margin: 20px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.container h1 {
  margin-top: 0;
}

.container p {
  margin-bottom: 15px;
}

.container form {
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 15px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input,
.input-group textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.button {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.button:hover {
  background-color: #0056b3;
}

.success-message,
.error-message {
  margin-top: 20px;
  padding: 10px;
  border-radius: 5px;
}

.success-message {
  background-color: #d4edda;
  color: #155724;
}

.error-message {
  background-color: #f8d7da;
  color: #721c24;
}



</style>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="../index.php">Home</a></li>
        
      </ul>
    </nav>
  </header>
  
  <div class="container">
    <h1>Contact Us</h1>
    <p>If you have any questions, feedback, or suggestions, please feel free to contact us using the form below.</p>
    <form id="contactForm">
      <div class="input-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>
      </div>
      <div class="input-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email" required>
      </div>
      <div class="input-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Your message" required></textarea>
      </div>
      <button type="submit">Send Message</button>
    </form>
    <div id="successMessage" class="success-message"></div>
    <div id="errorMessage" class="error-message"></div>
  </div>

  <script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
  event.preventDefault();

  var formData = new FormData(this);

  fetch('send_email.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      return response.text();
    }
    throw new Error('Network response was not ok.');
  })
  .then(data => {
    document.getElementById('successMessage').innerText = data;
    document.getElementById('errorMessage').innerText = '';
    this.reset();
  })
  .catch(error => {
    document.getElementById('errorMessage').innerText = 'An error occurred. Please try again later.';
    document.getElementById('successMessage').innerText = '';
  });
});

  </script>
  <script src="script.js"></script>
</body>
</html>
