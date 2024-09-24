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
        <form action="CustomerLogin.php" method="post">
            <?php
                if(isset($_POST['login'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    require_once "Database.php";

                    // SQL query to retrieve the user based on name and email
                    $sql = "SELECT * FROM manager WHERE name = '$name' AND email = '$email'";
                    $result = mysqli_query($conection, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $hashed_password = $row['password'];

                        // Verify the entered password with the stored hashed password
                        if (password_verify($password, $hashed_password)) {
                            // If password matches, redirect to Home.html
                            echo "<script>alert('You are now logged in. Redirecting to home page...');
                            window.location.href='Home.html';</script>";
                        } else {
                            echo "<script>alert('Invalid login credentials. Please try again.');</script>";
                        }
                    } else {
                        echo "<script>alert('No account found with these credentials.');</script>";
                    }
                }            
            ?>
            <div class="sub">
            <h1>Welcome To Feijip Enterprise</h1>
            </div>
            <div class="a">
                <input type="text" placeholder="Enter Your Name" name="name" required>
            </div>
            <div class="a">
                <input type="email" placeholder="Enter Your Email" name="email" required>
            </div>
            <div class="a">
                <input type="password" placeholder="Enter Your Password" name="password" required>
            </div>
            <button type="submit" value="login" name="login">Log-In</button>
            <a href="CustomerRegister.php">Register a New Account?</a>
        </form>
    </div>
</body>
</html>
