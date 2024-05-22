<?php
    include_once  "config.php";
    $con=mysqli_connect("localhost","root","","votein");
    if (!isset($_SESSION['adminuid'])) {
        header('Location: ../index.php');
        die();
    }
    //$cbox=$_GET['checked'];
    $aid = $admin_fetch['AdminID'];
    if (isset($_GET['apply'])) 
    {
        $admin_update = "UPDATE admin SET AdminShowResult = '$chkbox' WHERE admin.AdminID = '$aid'";
        $admin_update_result = mysqli_query($con, $admin_update);

        echo $admin_update_result;
        $ch1=$_GET['ch1'];
    }
?>