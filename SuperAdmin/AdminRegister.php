<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Log-In Page</title>
    <link rel="stylesheet" href="Add.css">
</head>
<body>
    <div class="main">
        <h1>Welcome to Feijip Enterprise</h1>
        <h2>Click the button below to start a new account</h2>
        <button class="start" onclick="start()">Activate a new account</button>
    </div>

    <div class="registerbar">
        <form method="POST" action="AdminRegister.php">
            <div class="a">
                <input type="text" placeholder="Enter Your Name" name="name" required>
            </div>
            <div class="a">
                <input type="email" placeholder="Enter Your Email" name="email" required>
            </div>
            <div class="a">
                <input type="password" placeholder="Enter Your Password" name="password" required>
            </div>
            <div class="a">
                <input type="password" placeholder="Re-Enter The Password" name="passwordconfirm" required>
            </div>
            <div class="a">
                <input type="tel" placeholder="Enter Your Phone Number" name="phone" required>
            </div>
            <button type="submit" value="register" name="register">Admin Register</button>
        </form>
    </div>

    <?php
        if(isset($_POST["register"])){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password1 = $_POST["passwordconfirm"];
            $phone = $_POST["phone"];

            if(empty($name) || empty($email) || empty($password) || empty($phone)){
                echo "<script>alert('All Fields Are Required. Please Enter Again')<script>;";
            }

            elseif($password != $password1){
                echo"<script>alert('Password do not match.')<script>;";
            }

            else{
                require_once"Database.php";
                $name = mysqli_real_escape_string($conection,$name);
                $email = mysqli_real_escape_string($conection,$email);
                $phone = mysqli_real_escape_string($conection,$phone);
                $sql_check = "SELECT * FROM addnew WHERE email = '$email' OR name = '$name' OR phone ='$phone'";
                $result = mysqli_query($conection,$sql_check);

                if(mysqli_num_rows($result) > 0){
                    echo "<script>alert('This account already been registed.');</script>";
                }

                else{
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO addnew (name,email,password,phone) VALUE ('$name','$email','$hashed_password','phone')";

                    if(mysqli_query($conection,$sql)){
                        echo"<script>alert('Your Now Registered.');</script>";
                    }
                    else{
                        $errorMessage = mysqli_error($conection);
                        echo "<script>alert('Error: " . $errorMessage . "');</script>";
                    }
                }
            }
        }
    ?>

    <script>
        function start(){
            const registerbar = document.getElementsByClassName("registerbar")[0];
            const main = document.getElementsByClassName("main")[0];
            if (registerbar && main) {
                registerbar.style.display = "block";
                main.style.display = "none";
            }
        }
    </script>
</body>
</html>
