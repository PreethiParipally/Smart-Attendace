<!DOCTYPE html>
<html>
<head>
    <title>Smart Attendance</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="FaviconIcon" href="logo.png" type="image/x-icon">
      <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="CSS/style1.css">
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div id="container">
        <div class="pos-f-t">
          <nav class="navbar navbar-dark" style="background-color: #d9edf7; border-radius: 3px;">
              <img src="logo.png" width="40px" height="40px" style="margin-top:4px;">
          </nav>
        </div>
        <br>
        <h1 align="center">Student Attendance</h1><br>
            <div class="wrapper">
                <form name="form" METHOD ="POST" action="" class="frm">
                    <h2><u>Login</u></h2><br>
                    <p align="left"><label>User Name:</label></p>
                    <div class="row">
                        <input type="text" class="form-control" name="username" placeholder="Name" maxlength=10 required>
                    </div>
                    <p align="left"><label>Password: </label></p>
                    <div class="row">
                        <input type="password" class="form-control" name="password" placeholder="Password" required><br>
                    </div>
                    <p align="center"><button type="submit" name="Login" class="btn btn-primary">Log In</button></p>
                </form>
            </div>
    </div>
</body>
</html>
<?php
    include ('sanitize.php');
    include("dbcon2.php");
    if (isset($_POST['Login'])) {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $con = mysqli_connect("localhost","root","","attendance");
        $sql = "SELECT id,tag FROM user WHERE username = '$username' and password = '$password' ";
        $result = mysqli_query($con,$sql);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($con));
            exit();
        }
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            // echo"Hello!";
            // print $row['tag'];
            // $xt=$row['tag'] == 'student';
            // echo $xt;
            if($row['tag'] == 'student'){
                session_start();
                $_SESSION['state'] = 'active';
                $_SESSION['name'] = $username;
                header("Location: homestudent.php");
            }
           else{
            session_start();
            $_SESSION['state'] = 'active';
            $_SESSION['name'] = $username;
            header("Location: home.php");
           }
        }
        else{
            echo "<br><font color=red><h3 align=center>Login Failed.</h3></font>";
        }
    }
?>
