<?php
    include 'dbcon2.php';
    session_start();
    $state = $_SESSION['state'];
    $check_hash = md5($_SESSION['name']);
    $check_hash_sql = "SELECT `id` FROM `user` WHERE `token` = '$check_hash'";
    $check_hash_result = mysqli_query($con,$check_hash_sql);
    $row_num = mysqli_num_rows($check_hash_result);
    #if ($state!='active' || $row_num==0)
     #   header("Location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="FaviconIcon" href="logo.png" type="image/x-icon">
      <link rel="shortcut icon" href="logo.png" type="image/x-icon">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <script type="text/javascript">
        function display(op) {
            var firstButton = document.getElementById('search_details');
            var secButton = document.getElementById('search_date');
            if (firstButton.style.display == 'none' && op==1) {
                secButton.style.display = 'none';
                firstButton.style.display = 'block';
            }
            else{
                secButton.style.display = 'block';
                firstButton.style.display = 'none';
            }
        }
    </script>

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
                <li><a href="home.php"><span id="high"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg> Home</span></a></li>
                <li><a href="details.php"><span id="high"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
  <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
</svg> Details</span></a></li>
                <li class="active"><a href="#"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM0 5h16v9a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5zm10.854 3.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
</svg> Attendance</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in" id="high"></span> <span id="high">Log Out</span></a></li>
              </ul>
            </div>
          </div>
        </nav>
        <h1 align="center">ABC School</h1>
        <p align="center" id="bd">
            <span align="center" style="font-size: 28px;"><u>Search the Attendance of Students:</u></span>
            <br><br><button class="cls" onclick="display(1)">Search By Student Details</button> <button class="cls" onclick="display(2)">Search By Date</button>
            <div id="con">
                <form method="GET" action="" style="display: none;" id="search_details">
                    <div class="row">
                        <div class="col-sm-3"><label>Student Name:</label><input type="text" class="form-control" name="name" placeholder="Name" maxlength=20 required></div>

                        <div class="col-sm-3"><label>Roll: </label><input type="text" class="form-control" name="roll" placeholder="Roll" maxlength=4 required></div>

                        <div class="col-sm-3"><label>Class: </label><input type="text" class="form-control" name="class" placeholder="e.g: I/II/III..." maxlength=8 required></div>

                        <div class="col-sm-3"><label>Date: </label><input type="date" class="form-control" name="date" required></div>
                    </div>
                    <br><button type="submit" name="Login" class="btn btn-primary" value="details">Proceed</button>
                </form>
                <form method="GET" action="" style="display: none;" id="search_date">
                    <div class="row">
                        <div class="col-sm-3"><label>Class: </label><input type="text" class="form-control" name="class" placeholder="e.g: I/II/III..." maxlength=8 required></div>

                        <div class="col-sm-3"><label>Date: </label><input type="date" class="form-control" name="date" required></div>
                    </div>
                    <br><button type="submit" name="Login" class="btn btn-primary" value="date">Proceed</button>
                </form>
        </p>
        <?php
            include 'dbcon2.php';
            include 'sanitize.php';
            if (isset($_GET['Login'])) {
                $type = sanitize($_GET['Login']);
                $class = sanitize($_GET['class']);
                $date = sanitize($_GET['date']);
                if ($type == 'details'){
                    $name = sanitize($_GET['name']);
                    $roll = sanitize($_GET['roll']);
                    if (strlen($roll)==1) {
                        $new_roll = "0".$roll;
                    }
                    $pre_sql = "SELECT id FROM `student` WHERE name = '$name' AND roll = $roll AND class = '$class'";
                    $rlt = mysqli_query($con,$pre_sql);
                    if (mysqli_num_rows($rlt)>0) {
                        $sql = "SELECT `d_id` FROM `attend` WHERE `date` = '$date' AND `details` LIKE '%-$new_roll-%'";
                        $result = mysqli_query($con,$sql);
                        if (mysqli_num_rows($result)>0) {
                            $status = 'Present';
                        }
                        else{
                            $status = 'Absent';
                        }
                        echo "Name: <b>$name</b> || Class: <b>$class</b> || Roll: <b>$new_roll</b><br>Attendance status on Date: $date : <b>$status</b>";
                    }
                    else{
                        echo "Wrong Student details entered!";
                    }
                }
                else{
                    $sql = "SELECT `details` FROM `attend` WHERE `date` = '$date' AND `class`='$class'";
                    $result = mysqli_query($con,$sql);
                    if (mysqli_num_rows($result)>0) {
                        $row = mysqli_fetch_assoc($result);
                        $str = $row['details'];
                        $str = substr($str, 1, strlen($str)-2);
                        $arr = explode("-", $str);
                        $sql = "UPDATE `student` SET `status` = 'Present' WHERE `student`.`class` = '$class' AND `student`.`roll` = ";
                        $len = count($arr);
                        for ($i=0; $i < $len; $i++) {
                            $run_sql = $sql.(int)$arr[$i];
                            mysqli_query($con,(string)$run_sql);
                        }
                        $show = "SELECT `name`, `roll`, `status` FROM `student` WHERE `class` = '$class'";
                        $show_result = mysqli_query($con,$show);
                        if (mysqli_num_rows($show_result)>0) {
                        ?>
                        <table class="table-striped" border="3" class="table-sm" align="center">
                            <tr>
                                <th> Name</th>
                                <th> Roll</th>
                                <th> Class</th>
                                <th> Status</th>
                            </tr>
                        <?php
                            while ($row = mysqli_fetch_row($show_result)) {
                                echo "<tr><td>".$row[0]."</td>";
                                echo "<td>".$row[1]."</td>";
                                echo "<td>".$class."</td>";
                                if ($row[2]=='Present')
                                    echo "<td><font color=green>".$row[2]."</font></td></tr>";
                                else
                                    echo "<td><font color=red>".$row[2]."</font></td></tr>";
                            }
                            $sql = "UPDATE `student` SET `status` = 'Absent' WHERE `student`.`class` = '$class' AND `student`.`roll` = ";
                            $len = count($arr);
                            for ($i=0; $i < $len; $i++) {
                                $run_sql = $sql.(int)$arr[$i];
                                mysqli_query($con,(string)$run_sql);
                            }
                        }
                        else{
                            echo "No data found!!!";
                        }
                    }
                    else
                        echo "No data found!!!";
                }

            }
        ?></table>
        <hr style="height:2px;width:98%;color:gray;background-color:gray">
        <h4>Contact Us:</h4>
            <font size="3px">Phone No: +033 2345-6789<br>
            Email: abcschool2020@gmail.com<br>
            Address:India</font>
            <br>
        </div>
        <hr style="height:2px; width:98%; color:gray; background-color:gray">
        <p align=center><code>Copyright (c) 2020, Purnadip Manna</code></p>
    </div>
</body>
</html>
