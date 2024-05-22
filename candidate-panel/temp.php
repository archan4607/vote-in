<?php
    $con=mysqli_connect('localhost','root','','votein');

    $can_user='SELECT * FROM user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment';
    $can_user_res=mysqli_query($con,$can_user);
    $can_user_fetch=mysqli_fetch_assoc($can_user_res);


    echo $can_user_fetch['UserEnrollment'].'<br>';
    echo $can_user_fetch['CandidateName'].'<br>';
    echo $can_user_fetch['UserName'].'<br>';
    echo $can_user_fetch['CandidateField'];

    print_r($can_user_fetch);
?>