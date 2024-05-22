<?php
include_once  "config.php";
if (!isset($_SESSION['enroll'])) {
    header('Location: ../index.php');
    die();
}
if (isset($_POST['conform'])) { 
    
    $enroll = $_SESSION['enroll'];
    // $UserImage = $_POST['UserImage'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $mnumber = $_POST['mnumber'];
    $UserGender = $_POST['UserGender'];

    
    $file=$_FILES['UserImage'];

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
        if($fileError==0)
        {
            if($fileSize <= 3000000)
            {   
                $fileNameNew=$enroll."-".$time.".png";
                //$fileNameNew=uniqid('', true).".".$fileActualExt;
                //$fileDestination='../upload/user/'.$fileNameNew;
                move_uploaded_file($fileTmpName,"../upload/user/".$fileNameNew);
                //$img="../upload/user/".$fileName;
            }
            else
            {
                echo "Your file size is too big!";
            }
        }
        else
        {
            if($user_fetch['UserImage'] != "")
            {
                $fileNameNew = $user_fetch['UserImage'];
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

    // $upd_file = $enroll . ".png";


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

    $user_update = "UPDATE user SET UserImage ='$fileNameNew', UserName='$fullname', 
                                    UserEmail = '$email', UserNumber='$mnumber', 
                                    UserGender='$UserGender' WHERE UserEnrollment = '$enroll'";
    mysqli_query($con, $user_update);

    header("Location: user-profile.php");
}


?>