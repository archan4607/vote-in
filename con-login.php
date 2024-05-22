<?php
    session_start();
    $num=$_GET['number'];
    $pass=$_GET['password'];


    $con=mysqli_connect("localhost","root","","votein");

    $admin_select="SELECT * FROM admin WHERE AdminUID='$num' AND AdminPassword='$pass'";
    $admin_result=mysqli_query($con,$admin_select);
    $admin_fetch=mysqli_fetch_assoc($admin_result);

    $user_select="SELECT * FROM user WHERE UserEnrollment='$num' AND UserPassword='$pass'";
    $user_result=mysqli_query($con,$user_select);
    $user_fetch=mysqli_fetch_assoc($user_result);
   
    if($admin_fetch)
    {   
        $_SESSION['adminuid']=$num;
        header("Location: admin-panel/admin-main-dashboard.php");
        //echo    "Login succefully";
    }
    else if($user_fetch) 
    {
        if($user_fetch['IsCandidate']==1)
        {   
            // while($can_fetch=mysqli_fetch_assoc($can_result))
            // {echo $num."<br>";
            //     echo $can_fetch['UserEnrollment']."<br>";
            //     if($can_fetch['UserEnrollment']==$num)
            //     {
                    $_SESSION['canuid']=$num;
                    //echo $_SESSION['canuid'];
                    header("Location: candidate-panel/candidate-main-dashboard.php");
                    // echo    "Login succefully";
                // }
                // else{
                //     echo $num."<br>";
                // echo $can_fetch['UserEnrollment']."<br>";
                //     echo "ERROR!!! Details not updated on candidate database.";
                //     break;
                // }
            // }
            
        }
        else if($user_fetch['IsCandidate']==0)
        {
            $_SESSION['enroll']=$num;
            // echo $_SESSION['enroll'];
            header("Location: user-panel/user-main-dashboard.php");
        }
        else
        {
            echo "<script>alert('Something went wrong please contact to admin')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid user name or password');window.location.href='index.php';</script>";
        // header("Location: index.php?message");
    }
?>