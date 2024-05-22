<?php
    include_once  "config.php";

    unset($_SESSION['canuid']);
    
    header('Location: ../index.php');
?>