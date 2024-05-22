<?php
if (isset($_GET['reset'])) {


    $num = $_GET['erno'];
    $password = $_GET['password'];

    $con = mysqli_connect('localhost', 'root', '', 'votein');

    $admin_select = "SELECT * FROM admin WHERE AdminUID='$num' AND AdminPassword='$pass'";
    $admin_result = mysqli_query($con, $admin_select);
    $admin_fetch = mysqli_fetch_assoc($admin_result);

    $user_select = "SELECT * FROM user WHERE UserEnrollment='$num'";
    $user_result_select = mysqli_query($con, $user_select);
    $user_fetch_select = mysqli_fetch_assoc($user_result_select);

    if ($user_fetch_select['UserEnrollment'] == $num) {
        $user_update = "UPDATE user SET UserPassword = '$password' WHERE user.UserEnrollment = '$num'";
        $user_result = mysqli_query($con, $user_update);
        header("Location: index.php?reset_msg");
    } else if ($admin_fetch['AdminUID'] == $num) {
        $admin_update = "UPDATE admin SET AdminPassword = '$password' WHERE admin.AdminUID = '$num'";
        $admin_result = mysqli_query($con, $admin_update);
        header("Location: index.php");
    } else {
        echo "<script>alert('Something went wrong please contact to admin')</script>";
    }
}
