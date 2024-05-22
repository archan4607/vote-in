<?php
include_once  "config.php";
if (!isset($_SESSION['adminuid'])) {
    header('Location: ../index.php');
    die();
}
if (isset($_POST['conform'])) { 
    
    // echo $can_fetch['CandidateID'];
    echo $adminuid = $_SESSION['adminuid'];
    // $UserImage = $_POST['UserImage'];
    $fullname = $_POST['admin_name'];
    $email = $_POST['admin_email'];
    //$password = $_POST['password'];
    $mnumber = $_POST['admin_number'];
    $AdminGender = $_POST['AdminGender'];

    
    $file=$_FILES['AdminImage'];

    $fileName=$_FILES['AdminImage']['name'];
    $fileTmpName=$_FILES['AdminImage']['tmp_name'];
    $fileSize=$_FILES['AdminImage']['size'];
    $fileError=$_FILES['AdminImage']['error'];
    $fileType=$_FILES['AdminImage']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    // $allowed=array('jpg','jpeg','png');
    $time = date("d-m-Y")."-".time();

    // if(in_array($fileActualExt, $allowed))
    // {
        if($fileError==0)
        {
            if($fileSize <= 1000000)
            {   
                $fileNameNew=$adminuid."-".$time.".png";
                //$fileNameNew=uniqid('', true).".".$fileActualExt;
                //$fileDestination='../upload/can/'.$fileNameNew;
                move_uploaded_file($fileTmpName,"../upload/admin/".$fileNameNew);
                //$img="../upload/user/".$fileName;
            }
            else
            {
                echo "Your file size is too big!";
            }
        }
        else
        {
            if($admin_fetch['AdminImage'] != "")
            {
                $fileNameNew = $admin_fetch['AdminImage'];
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

    $admin_update = "UPDATE admin SET AdminImage = '$fileNameNew', AdminName = '$fullname', 
                                        AdminGender = '$AdminGender', AdminNumber = '$mnumber', 
                                        AdminEmail = '$email' WHERE AdminUID = '$adminuid'";
    mysqli_query($con, $admin_update);

    header("Location: admin-profile.php");
}
else{
    echo "ERROR!!!!";
}
?>