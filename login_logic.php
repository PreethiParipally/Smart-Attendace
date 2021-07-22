<?php
// https://codewithawa.com/posts/password-reset-system-in-php
$errors = [];
include('sanitize.php');
include("dbcon2.php");
$con = mysqli_connect("localhost", "root", "", "attendance");
session_start();
if (isset($_POST['Login'])) {
    $username = sanitize(mysqli_real_escape_string($con, $_POST['username']));
    $password = sanitize(mysqli_real_escape_string($con, $_POST['password']));
    if (empty($userNAME)) array_push($errors, "Username or Email is required");
    if (empty($password)) array_push($errors, "Password is required");
    if (count($errors) == 0) {
        $sql = "SELECT id,tag FROM user WHERE username = '$username' and password = '$password' ";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['state'] = 'active';
            $_SESSION['name'] = $username;
            if ($row['tag'] == 'student') {
                header("Location: homestudent.php");
            } else if($row['tag'] == 'teacher'){ 
                header("Location: hometeacher.php");
            }
            else {
                header("Location: home.php");
            }
        } else {
            array_push($errors, "Wrong credentials");
            echo "<br><font color=red><h3 align=center>Login Failed.</h3></font>";
        }
    }
}
else if (isset($_POST['reset-password'])) {
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