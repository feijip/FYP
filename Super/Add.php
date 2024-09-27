<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Log-In Page</title>
    <link rel="stylesheet" href="Add.css">
    <script src="Add.js"></script>
</head>
<body>
    <div class="main">
        <h1>Welcome to Feijip Enteprice</h1>
        <h2>Click the button below to start a new account</h2>
        <button class ="start" onclick="start()">Active a new account</button>
    </div>
    
    <div class="registerbar">
        <div class="a">
            <input type="text" placeholder="Enter Your Name" name="name" required>
        </div>
        <div class="a">
            <input type="text" placeholder="Enter Your Email" name="email" required>
        </div>
        <div class="a">
            <input type="text" placeholder="Enter Your Password" name="password" required>
        </div>
        <div class="a">
            <input type="text" placeholder="Enter Your Phone Number" name="phone" required>
        </div>
        <button type="submit" value="register" name="register">Admin Register</button>
    </div>
</body>
</html>