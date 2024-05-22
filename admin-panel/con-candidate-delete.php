<?php
    include_once  "config.php";
    /*$con=mysqli_connect("localhost","root","","votein");
    if (!isset($_SESSION['an'])) {
        header('Location: ../index.php');
        die();
    }*/
    $canerno=$_GET['canerno'];
    $can_delete = "DELETE FROM candidate WHERE UserEnrollment = '$canerno'";
    //echo($can_delete);
    $can_result=mysqli_query($con,$can_delete);
    if($can_result)
    {
        
        $can_to_user_update = "UPDATE user SET IsCandidate = 0 WHERE UserEnrollment = '$canerno'";
        $can_to_user_result=mysqli_query($con,$can_to_user_update);

        // echo "<script>alert('I am an alert box!');</script>";
        header("Location: manage-candidate-admin.php");
        
    }
    else
    {   
        echo "<script>alert('error delete failed');</script>";
        header("Location: view-candidate-profile.php");
    }
?>