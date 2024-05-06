?php
    include "connection.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker - Profile Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

._home{

}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 20px;
}

.profile,
.expenses {
    margin-bottom: 30px;
}

.profile-details,
.expenses-details {
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 5px;
}

.profile h2,
.expenses h2 {
    margin-bottom: 10px;
}

.profile-details p,
.expenses-details p {
    margin: 5px 0;
}

.profile-details p strong,
.expenses-details p strong {
    font-weight: bold;
    margin-right: 5px;
}
</style>
<body>

    <div class="container">
        <header>
            <h1>Welcome to Expense Tracker</h1>
        </header>
        <div class="profile">
            <h2>User Profile</h2>
            <div class="profile-details">
                <p><strong>Name:</strong> <?php echo $name; ?> </p>
                <p><strong>Email:</strong> <?php echo $email; ?> </p>
                <p><strong>Account Balance:</strong> $500</p>
            </div>
        </div>
        <div class="expenses">
            <h2>Expenses Summary</h2>
            <div class="expenses-details">
                <p><strong>Total Expenses:</strong> $250</p>
                <p><strong>Remaining Balance:</strong> $250</p>
            </div>
        </div>
    </div>
</body>
</html>