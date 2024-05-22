<?php
    session_start();
    $ernu=$_GET['enrollnumber'];
    $name=$_GET['text'];
    $email=$_GET['email'];
    $pass=$_GET['password'];

    //$con=mysqli_connect("localhost","root","","votein");
    $con = mysqli_connect($server, "u877822597_votein", "Votein777", "u877822597_votein");

    $user_select="SELECT * FROM user";
    $user_result=mysqli_query($con,$user_select);
    
    while($user_fetch=mysqli_fetch_assoc($user_result))
    {
        if($_GET['enrollnumber'] == $user_fetch['UserEnrollment'])
        {
            echo "Successfully Register";
            $user_update="UPDATE user SET UserName = '$name', UserPassword = '$pass', UserEmail = '$email' WHERE user.UserEnrollment = $ernu";
            $user_update_result=mysqli_query($con,$user_update);
            header("Location: index.php");
            break;
        }
        else{
            
            //echo "Not Register";
    
            header("Location: register.php");
        }
    }
    
?>