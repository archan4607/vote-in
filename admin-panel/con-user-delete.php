<?php
    include_once  "config.php";
    $con=mysqli_connect("localhost","root","","votein");
    // if (!isset($_SESSION['adminuid'])) {
    //     header('Location: ../index.php');
    //     die();
    // }
    $userenro=$_GET['userenro'];
    $user_delete = "DELETE FROM user WHERE UserEnrollment = '$userenro'";
    // echo($can_delete);
    $user_result=mysqli_query($con,$user_delete);     
    if($user_result)
    {
        echo "<script>alert('I am an alert box!');</script>";
        header("Location: manage-user-admin.php");
    }
    else
    {   
        echo "<script>alert('error delete failed');</script>";
        header("Location: view-user-profile.php");
    }
?>