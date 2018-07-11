<!Doctype html>
<html>
<head>
<title>EliteShifter</title>
<link rel ="shortcut icon" type="image/jpg" href= "..pictures/icon.jpg"/>
   
        <html lang="en"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" type="text/css" href="../mainStyle.css">
        <script src="../validate.js"></script>
</head>

<body>
    <div class="Header" style="height: 100px;">
    
        
        <div style="width: 600px; height: 50px; margin: auto; margin-top:45px; font-size: 22px; color:#66a3ff;">
            <div style="float: right ;">
                 Date: <?php $today = Date("Y-m-d"); echo date('l', strtotime($today))  ?> 
                 <?php echo $today = Date("Y-m-d"); ?> 
                 Time: <?php $houur = Date("H");  echo ($houur )  ?> 
                 Minutes: <?php echo $minuts= Date("i"); ?>
            </div>
        </div>
        <div style="width: 250px; height: 50px; position: absolute; top:30px; right: 10px; margin: 0 auto; float:right; font-size: 20px; color:#fff;">
            <div style="float: left; height: 30px; width: 200px; margin-top: 10px;" >
                <?php
                    $sql="SELECT * FROM employee WHERE EmpID = ".$_SESSION['EmpID']." ";
                    $query =mysqli_query($con,$sql);
                    while($row =mysqli_fetch_array($query)){
                        echo $row['EmpName'] .' '.$row['EmpSurname'];
                    }
                ?>
            </div>    
            <a href="../logout.php"><div style="float:right; height: 50px; width: 50px; background-size: cover; background-image:url(../pictures/door.png);" ></div></a>
        </div>
        
    </div>
	<nav class="col-md-2">
            <ul>
		<?php include 'menu.php'; ?>
            </ul>
        </nav>
    <div class="col-md-10 main-content" style=" padding-top: 20px;">