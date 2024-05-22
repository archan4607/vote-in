<?php
    session_start();
    error_reporting(0);
    $con=mysqli_connect("localhost","root","","votein");
    if(!$con)
	{
		echo "Something went wrong";
		die();
	}
  
  $can_select = "SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment";
  $can_result = mysqli_query($con, $can_select);

  while($can_fetch = mysqli_fetch_assoc($can_result))
  {
    if($_SESSION['canuid']==$can_fetch['UserEnrollment'])
    {
      $_SESSION['user_name']=$can_fetch['UserName'];
      $_SESSION['user_img']=$can_fetch['UserImage'];
      break;
    }
  }
?>