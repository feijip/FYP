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
            <input type="tel" placeholder="Enter Your Phone Number" name="phone" required>
        </div>
        <button type="submit" value="register" name="register">Admin Register</button>
    </div>

    <script>
        function start(){
            const register = document.getElementsByClassName("registerbar")[0];
            const main = document.getElementsByClassName("main")[0];
            if (register && main) {
                register.style.display = "block";
                main.style.display = "none";
            }
        }
    </script>
</body>
</html>
