<?php
session_start();
$ernu = $_GET['enrollnumber'];
$email = $_GET['email'];
$pass = $_GET['password'];

$con = mysqli_connect("localhost", "root", "", "votein");

$user_select = "SELECT * FROM user";
$user_result = mysqli_query($con, $user_select);


while ($user_fetch = mysqli_fetch_assoc($user_result)) {

    if ($_GET['enrollnumber'] == $user_fetch['UserEnrollment']) {
        if ($user_fetch['UserEnrollment'] == ($user_fetch['UserPassword'] == "")){
            echo "pass blank<br>";
            echo "Successfully Register<br>";
        $user_update = "UPDATE user SET UserPassword = '$pass', UserEmail = '$email' WHERE user.UserEnrollment = $ernu";
        $user_update_result = mysqli_query($con, $user_update);
        // header("Location: index.php");
        }
        else{
            echo "pass not blank<br>";
        }
        // echo "<script>window.location.href='index.php';</script>";
        // break;
        if ($_GET['enrollnumber'] != $user_fetch['UserEnrollment'])
        {

        }
        echo "Not Register<br>";
    } else {

        // echo "<script>alert('Invalid user name or password');window.location.href='register.php';</script>";
        // header("Location: register.php");
    }
}
