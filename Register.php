<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Register Page</title>
</head>
<body>
    <h1>Welcome to Feijip Enterprice</h1>
    <div class="form">
        <h1>Register Form</h1>
        <?php
            /*print_r($_POST);/*为了看function是怎样跑的*/
            if(isset($_POST["submit"]))
            {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password1 = $_POST["password1"];

                if (empty($name) || empty($email) || empty($password) || empty($password1)) 
                {
                    echo "All Fields Are Required. Please Enter Them Again.";
                } 
                elseif ($password != $password1) 
                {
                    echo "Passwords do not match.";
                }
                else
                {
                    require_once"Database.php";
                    //$sql = "INSERT INTO manager (name,email,password) VALUE ($name,$email,$hash)";
                    $name = mysqli_real_escape_string($conection, $name);
                    $email = mysqli_real_escape_string($conection, $email);
                    $sql_check = "SELECT * FROM manager WHERE email = '$email','$name'";
                    $result = mysqli_query($conection, $sql_check);

                    if(mysqli_num_rows($result) > 0) {
                        echo "This account already exists. Please use a different name or email.<br>";
                    } 
                    else 
                    {
                        // Insert new user
                        $sql = "INSERT INTO manager (name, email, password) VALUES ('$name','$email','$password')";
                        
                        if (mysqli_query($conection, $sql)) {
                            echo "You are now registered.<br>";
                        } else {
                            echo "Error: " . mysqli_error($conection) . "<br>";
                        }
                        echo "Sanitized Name: $name <br>";
                        echo "Sanitized Email: $email <br>";
                        echo "Sanitized Password: $password <br>";
                    }
                }
            }
        ?>
        <form action ="Register.php" method="post">
            Username: <br>
            <input type="text" name="name" placeholder="Enter Your Name"><br>
            Email: <br>
            <input type="email" name="email" placeholder="Enter Your Email Address"><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Your Password"><br>
            Repeat-Password: <br>
            <input type="password" name="password1" placeholder="Re-Enter Your Password"><br>
            <button type="submit" value="register" name="submit">Register New Account</button>
        </form>
    </div>
</body>
</html>