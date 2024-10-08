<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In Page</title>
</head>

<body>
    <form action="SuperAdminLogin.php" method="post">
        <div class="a">
            <input type="text" placeholder="Enter Your ID" name="id" required>
        </div>
        <div class="a">
            <input type="text" placeholder="Enter Your Name" name="name" required>
        </div>
        <div class="a">
            <input type="text" placeholder="Enter Your Password" name="password" required>
        </div>
        <button type="submit" value="login" name="login">Log-In</button>
    </form>

    <?php
        if(isset($_POST["login"])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $password = $_POST['password'];

            require_once "Database.php";
            
            $sql = "SELECT * FROM superadmin WHERE id = '$id' AND name = '$name' AND password = '$password'";
            $result = mysqli_query($conection,$sql);

            if(mysqli_num_rows($result) > 0){
                echo "<script>alert('Welcome Super Admin.');
                window.location.href='AdminRegister.php';</script>";
            }
            else{
                echo "<script>alert('Invalid login credentials. Please try again.');</script>";
            }
        }
        else{
            echo "<script>alert('Your Not Super Admin. Get Off.');</script>";
        }
    ?>
</body>
</html>