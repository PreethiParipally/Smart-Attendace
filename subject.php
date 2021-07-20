<?php
    include 'dbcon2.php';
    session_start();
    $state = $_SESSION['state'];
    $check_hash = md5($_SESSION['name']);
    $check_hash_sql = "SELECT `id` FROM `user` WHERE `token` = '$check_hash'";
    $check_hash_result = mysqli_query($con,$check_hash_sql);
    $row_num = mysqli_num_rows($check_hash_result);
    if ($state!='active' || $row_num==0)
      header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="FaviconIcon" href="logo.png" type="image/x-icon">
      <link rel="shortcut icon" href="logo.png" type="image/x-icon">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
    <div id="container">
        <nav class="navbar navbar-expand-sm bg-info navbar-dark">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="border: 1px solid black; margin-right: 8%;">
                <span class="icon-bar" style="background-color: black;"></span>
                <span class="icon-bar" style="background-color: black;"></span>
                <span class="icon-bar" style="background-color: black;"></span>                        
              </button>
              <img src="logo.png" width="40px" height="40px" style="margin-top:4px;">
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li><a href="homestudent.php"><span id="high"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg> Home</span></a></li>
                <li class="active"><a href="#"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
  <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
</svg> Subjects</a></li>
                <li><a href="details1.php"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
  <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
</svg> Details</a></li>
                <li><a href="attendance1.php"><span id="high"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM0 5h16v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5zm10.854 3.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg> Attendance</span></a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in" id="high"></span> <span id="high">Log Out</span></a></li>
              </ul>
            </div>
          </div>
        </nav>
        <h1 align="center">VNRVJIET</h1>
        <h2 align="center">Subjects</h2>
        <p align="center" id="bd">
            <?php
                include("sanitize.php");
                echo "<span align=center style='font-size: 28px;'><u>Select the subject</u></span><br><br>";
                include("dbcon2.php");
                $uname=sanitize($_SESSION['name']);
                $sqlt="SELECT class FROM student s inner join user u on u.id=s.uid and username='$uname' ";
                $rsult = mysqli_query($con, $sqlt);
                if (!$rsult) {
                  printf("Error: %s\n", mysqli_error($con));
                  exit();
                }
                
                if(mysqli_num_rows($rsult) > 0){
                  $row = mysqli_fetch_assoc($rsult);
                  $class=$row['class'];
                  $sql = "SELECT t.sid as sid,s.name as name  FROM teaches t inner join subject s on s.id=t.sid and t.class='$class' ";
                  $result = mysqli_query($con, $sql);
                  if (!$result) {
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                  }
                  // echo mysqli_num_rows($result);
                  $i = 1;
                  if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                          echo "<a class='cls' href='subject.php?sid=".$row['sid']."&submit=submit&class=".$class."'> ".$row['name']."</a> ";
                          if ($i%3==0)
                              echo "<br><br>";
                          $i++;
                      }
                  }
                  else
                      echo "There is no data.";
              }
                if (isset($_GET['submit'])) {
                    $sid = sanitize($_GET['sid']);
                    $class = sanitize($_GET['class']);
                    echo "<br><hr style='height:2px;width:98%;color:gray;background-color:gray'>";
                    echo "<div id=con><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-caret-right-square-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
  <path fill-rule='evenodd' d='M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.5 10a.5.5 0 0 0 .832.374l4.5-4a.5.5 0 0 0 0-.748l-4.5-4A.5.5 0 0 0 5.5 4v8z'/>
</svg> <b>Subject: $sid</b>";
                    echo "<br>-------------------------------------------------<br>";
                    $query = "SELECT s.name as name,s.description as descrip,te.name as faculty , t.class as class FROM subject s inner join teaches t on t.sid=s.id inner join teacher te on te.id=t.tid and s.id = '$sid' and class='$class'";
                    $std_details = mysqli_query($con, $query);
                    if (!$std_details) {
                      printf("Error: %s\n", mysqli_error($con));
                      exit();
                    }
                    if (mysqli_num_rows($std_details)>0) {
                      $row = mysqli_fetch_assoc($std_details) ;
                      echo "<b>Name  : </b>".$row['name']."</br>";
                      echo "<b>Description : </b>".$row['descrip']."</br>";
                      echo "<b>Faculty : </b>".$row['faculty']."</br>";
                      echo "<b>Class : </b>".$row['class']."</br>";   
                    }
                }
            ?>
            </div>
        </p>
        <hr style="height:2px;width:98%;color:gray;background-color:gray">
        <div id="con">
        <h4>Contact Us:</h4>
            <font size="3px">Phone No: +033 2345-6789<br>
            Email: abcschool2020@gmail.com<br>
            Address:India</font>
            <br>
        </div>
        <hr style="height:1px; width:80%; color:gray; background-color:gray">
        <p align=center><code>Copyright (c) 2020, Purnadip Manna</code></p>
    </div>
</body>
</html>