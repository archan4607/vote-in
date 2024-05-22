<?php
    include_once  "config.php";

    unset($_SESSION['adminuid']);
    
    header('Location: ../index.php');
?>