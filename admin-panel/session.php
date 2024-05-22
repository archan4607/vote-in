<?php
    session_start();
    error_reporting(0);
    echo $_SESSION['adminuid'];
    echo "<br>".$_SESSION['canuid'];
    echo "<br>".$_SESSION['enroll'];

?>