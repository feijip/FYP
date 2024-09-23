<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Register Page</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="feijip.css">
</head>
<body>
    <h1>Welcome to Feijip Enterprise</h1>
    <div class="form">
        <h1>Register Form</h1>
        <?php
            if(isset($_POST["submit"]))
            {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password1 = $_POST["password1"];

                if (empty($name) || empty($email) || empty($password) || empty($password1)) 
                {
                    echo "<script>alert('All Fields Are Required. Please Enter Them Again.');</script>";
                    //echo "All Fields Are Required. Please Enter Them Again.";
                } 
                elseif ($password != $password1) 
                {
                    echo "<script>alert('Passwords do not match.');</script>";
                    //echo "Passwords do not match.";
                }
                else
                {
                    require_once "Database.php";
                    $name = mysqli_real_escape_string($conection, $name);
                    $email = mysqli_real_escape_string($conection, $email);
                    $sql_check = "SELECT * FROM manager WHERE email = '$email' OR name = '$name'";
                    $result = mysqli_query($conection, $sql_check);

                    if(mysqli_num_rows($result) > 0) {
                        echo "<script>alert('This account already exists. Please use a different Name or Email.');</script>";
                    } 
                    
                    else 
                    {
                        $sql = "INSERT INTO manager (name, email, password) VALUES ('$name','$email','$password')";
                        
                        if (mysqli_query($conection, $sql)) {
                            echo "<script>alert('You are now registered.');</script>";
                            //echo "You are now registered.<br>";
                        } else {
                            $errorMessage = mysqli_error($conection);
                            echo "<script>alert('Error: " . $errorMessage . "');</script>";
                        }
                    }
                }
            }
        ?>
        <div class="register">
            <form action="Register.php" method="post">
                <div class="a">
                    Username: <br>
                    <input type="text" name="name" placeholder="Enter Your Name"><br>
                </div>
                <div class="a">
                    Email: <br>
                    <input type="email" name="email" placeholder="Enter Your Email Address"><br>
                </div>
                <div class="a">
                    Password: <br>
                    <input type="password" name="password" placeholder="Enter Your Password"><br>
                </div>
                <div class="a">
                    Repeat-Password: <br>
                    <input type="password" name="password1" placeholder="Re-Enter Your Password"><br>
                </div>
                <button type="submit" value="register" name="submit">Register New Account</button>
            </form>
        </div>
    </div>
</body>
</html>