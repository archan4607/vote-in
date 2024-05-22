<?php
    include_once  "config.php";

    unset($_SESSION['enroll']);
    
    header('Location: ../index.php');
?>