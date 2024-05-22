<?php
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "votein");
if (!$con) {
  echo "Something went wrong";
  die();
}

if (!isset($_SESSION['adminuid'])) {
  echo $_SESSION['adminuid'];
  header('Location: ../index.php');
  die();
} else {
  $admin_select = "SELECT * FROM admin";
  $admin_result = mysqli_query($con, $admin_select);
  // $admin_fetch = mysqli_fetch_assoc($admin_result);
  while ($admin_fetch = mysqli_fetch_assoc($admin_result)) {
    if ($_SESSION['adminuid'] == $admin_fetch['AdminUID']) {

      $_SESSION['an'] = $admin_fetch['AdminName'];
      $_SESSION['admin_img'] = $admin_fetch['AdminImage'];
      break;
    }
  }
}
