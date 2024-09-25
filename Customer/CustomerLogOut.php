<?php
    session_start();
    session_destroy();
    echo "<script>alert('You are now Log-out. Thank You for using our System.');
    window.location.href='CustomerLogin.php';</script>";
?>