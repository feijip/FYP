<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="feijip.css">
</head>
<body>
    <div class="form">
        <form action="Login.php" method="post">
            <?php
                if(isset($_POST['login'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    require_once "Database.php";

                    // Correct SQL query to use the actual $password variable
                    $sql = "SELECT * FROM manager WHERE name = '$name' AND email = '$email' AND password = '$password'";
                    $result = mysqli_query($conection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        header("Location: Home.html");
                        exit();
                    } else {
                        echo "Invalid login credentials. Please try again.";
                    }
                }            
            ?>
            <div class="sub">
            <h1>Welcome To Feijip Enterprise</h1>
            </div>
            <div class="login">
                Username:
                <input type="text" placeholder="Enter Your Name" name="name" required>
            </div>
            <div class="login">
                Email:
                <input type="email" placeholder="Enter Your Email" name="email" required>
            </div>
            <div class="login">
                Password:
                <input type="password" placeholder="Enter Your Password" name="password" required>
            </div>
            <button type="submit" value="login" name="login">Log-In</button>
            <a href="Register.php">Register a New Account?</a>
        </form>
    </div>
</body>
</html>
