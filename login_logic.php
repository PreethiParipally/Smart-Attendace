<?php
$errors = [];
include('sanitize.php');
include("dbcon2.php");
if (isset($_POST['reset-password'])) {
    $con = mysqli_connect("localhost", "root", "", "attendance");
    $uname = mysqli_real_escape_string($con, $_POST['uname']);
    // ensure that the user exists on our system
    $query = "SELECT username FROM user WHERE username='$uname'";
    $results = mysqli_query($con, $query);
  
    if (empty($uname)) {
      array_push($errors, "Your username is required");
    }else if(mysqli_num_rows($results) <= 0) {
      array_push($errors, "Sorry, no user exists on our system with that username");
    }
    $token = md5($uname);
  
    if (count($errors) == 0) {
      // store token in the password-reset database table against the user's email
      $sql = "INSERT INTO reset(uname, token) VALUES ('$uname', '$token')";
      $results = mysqli_query($con, $sql);
  
      header("Location: reset.php?uname=" . $uname . "&token=" . $token);
    }
  }
  
  // ENTER A NEW PASSWORD
  if (isset($_POST['new_password'])) {
    $con = mysqli_connect("localhost", "root", "", "attendance");
    $new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
    $new_pass_c = mysqli_real_escape_string($con, $_POST['new_pass_c']);
  
    // Grab to tokenk
    $token = sanitize($_GET['token']);
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
      // select email address of user from the password_reset table 
      $sql = "SELECT uname FROM reset WHERE token='$token' LIMIT 1";
      $results = mysqli_query($con, $sql);
      if (!$results) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
      }
      $uname = mysqli_fetch_assoc($results)['uname'];
  
      if ($uname) {
        // $new_pass = md5($new_pass);
        $sql = "UPDATE user SET password='$new_pass' WHERE username='$uname'";
        $results = mysqli_query($con, $sql);
        header('location: index.php');
      }
    }
  }
?>