<?php
include_once  "config.php";
if (!isset($_SESSION['canuid'])) {
    header('Location: ../index.php');
    die();
}
if (isset($_POST['conform'])) { 
    
    // echo $can_fetch['CandidateID'];
    echo $canuid = $_SESSION['canuid'];
    // $UserImage = $_POST['UserImage'];
    $fullname = $_POST['user_name'];
    $email = $_POST['user_email'];
    //$password = $_POST['password'];
    $mnumber = $_POST['user_number'];
    $UserGender = $_POST['UserGender'];
    $field = $_POST['can_field'];
    $description = $_POST['can_description'];

    

    $file=$_FILES['UserImage'];

    
    // $img_set = $can_fetch['UserImage'];
    // echo $can_fetch['UserImage'];
    // if(is_null($file))
    // {
    //     // echo "<br>image NOT set";
    //     echo $file=$img_set;
    // }
    // else
    // {
    //     echo "image set";
    // }


    $fileName=$_FILES['UserImage']['name'];
    $fileTmpName=$_FILES['UserImage']['tmp_name'];
    $fileSize=$_FILES['UserImage']['size'];
    $fileError=$_FILES['UserImage']['error'];
    $fileType=$_FILES['UserImage']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    // $allowed=array('jpg','jpeg','png');
    $time = date("d-m-Y")."-".time();

    // if(in_array($fileActualExt, $allowed))
    // {
        if($fileError === 0)
        {
            if($fileSize <= 3000000)
            {   
                $fileNameNew=$canuid."-".$time.".png";
                move_uploaded_file($fileTmpName,"../upload/candidate/".$fileNameNew);
            }
            else
            {
                echo "Your file size is too big!";
            }
        }
        else
        {
            if($can_fetch['UserImage'] != "")
            {
                $fileNameNew = $can_fetch['UserImage'];
            }
            else
            {
                // echo "There was an error uploading your file!";
                echo "Error occurs while uploading file";
            }

        }
    // }
    // else{
    //     echo "You cannot upload files of this type!";
    // }


    // $f_tmp_name = $_FILES['UserImage']['tmp_name'];
    // $f_size = $_FILES['UserImage']['size'];
    // $f_error = $_FILES['UserImage']['error'];

    // $upd_file = $can . ".png";


    // if ($f_error === 0) {
    //     if ($f_size <= 3000000) {
    //         move_uploaded_file($f_tmp_name, "../upload/upd/".$upd_file); // Moving Uploaded File to Server ... to uploades folder by file name f_name ... 
    //     } else {
    //         echo "<script>alert(File size is to big .. !);</script>";
    //     }
    // } else {
    //     echo "Something went wrong .. !";
    //     echo "<pre>";
    //     echo $_FILES['UserImage']['name'];
    //     echo $_FILES['UserImage']['tmp_name'];
    //     echo $_FILES['UserImage']['size'];
    //     echo $_FILES['UserImage']['error'];
    //     echo "</pre>";
    // }

    $can_update = "UPDATE user INNER JOIN candidate ON user.UserEnrollment = candidate.UserEnrollment SET UserImage = '$fileNameNew', UserName = '$fullname', 
                                        UserGender = '$UserGender', CandidateField = '$field', 
                                        UserNumber = '$mnumber', UserEmail = '$email', 
                                        CandidateDescription = '$description' WHERE user.UserEnrollment = '$canuid'";
                                        // echo $can_update;
                                        // echo " User IMage : ".$fileNameNew;
    mysqli_query($con, $can_update);
// print_r($can_update)    ;
    header("Location: candidate-profile.php");
}
else{
    echo "ERROR!!!!";
}


?>