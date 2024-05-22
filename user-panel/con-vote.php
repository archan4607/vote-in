<?php
include_once 'config.php';
echo "session set successfully=";
if (!isset($_SESSION['enroll'])) {
    header('Location: login.php');
    die();
}

$canerno = $_GET['canerno'];
$sen = $_SESSION['enroll'];


$user_select = "SELECT * FROM user WHERE UserEnrollment='$sen'";
$user_result = mysqli_query($con, $user_select);
$user_fetch = mysqli_fetch_assoc($user_result);
echo "<br>";
print_r($user_fetch);
//$_GET['']


$st = $user_fetch['UserStatus'];

echo "<br><br>  Candidate ID --->" . $_GET['canerno'];
echo "<br><br>  User Status is  " . $st . "<br><br>";

if (!isset($_GET['vote'])) {
   
        if ($_SESSION['enroll'] == ($user_fetch['UserStatus'] == 0)) {
        /*header("Location: vote.php?canerno=<?php echo ($rowcan['CandidateID'])?>&erno=<?php echo ($row['UserEnrollment'])?>");*/

        $user_update = "UPDATE user  SET  UserStatus  = '1' WHERE  user . UserEnrollment  = $sen";
        $user_update_result = mysqli_query($con, $user_update);

        $update_candidate = "UPDATE candidate SET CandidateVotes=CandidateVotes +1 WHERE candidate . UserEnrollment= $canerno";
        $candidate_update_result = mysqli_query($con, $update_candidate);

        //echo "<br><br>voted";
        header("Location: con-mail.php");
    }
    if ($_SESSION['enroll'] == ($user_fetch['UserStatus'] == 1)) {
        //echo $_SESSION['enroll'] . " already voted";

        $candidate_select = "SElECT * FROM candidate WHERE UserEnrollment=$canerno";
        $candidate_result = mysqli_query($con, $candidate_select);
        $candidate_fetch = mysqli_fetch_assoc($candidate_result);
        //echo "<br><br>Candidate Votes " . $candidate_fetch['CandidateVotes'];
    }
}

?> 