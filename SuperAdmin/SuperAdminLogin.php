<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In Page</title>
</head>
<body>
    <form action="SuperAdminLogin.php" method="$_POST">
        <?php
            if(isset($_POST["login"])){
                $id = $_POST['id'];
                $name = $_POST['name'];
                $password = $_POST['password'];

                
            }
        ?>
    </form>
</body>
</html>