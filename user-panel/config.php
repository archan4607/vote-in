<?php
    session_start();
    error_reporting(0);
    $con=mysqli_connect("localhost","root","","votein");
    if(!$con)
	{
		echo "Something went wrong";
		die();
	}
  // $_SESSION['enroll'];
  $user_select = "SELECT * FROM user";
  $user_result = mysqli_query($con, $user_select);
  
  while($user_fetch = mysqli_fetch_assoc($user_result))
  {
    if($_SESSION['enroll']==$user_fetch['UserEnrollment'])
    {
      $_SESSION['user_name']=$user_fetch['UserName'];
      $_SESSION['user_img']=$user_fetch['UserImage'];
      break;
    }
  }
?>