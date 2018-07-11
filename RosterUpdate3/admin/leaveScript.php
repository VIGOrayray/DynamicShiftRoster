<?php 
    session_start();
    include '../Config.php';
    if(isset($_GET['accept'])){
    $leaveID = $_GET['leaveID'];
    $empId = $_GET['empId'];
    $leaveDate=$_GET['leaveDate'];
            
    $sql = " UPDATE leaveday SET status = 'approved' , ApprovedBy = ".$_SESSION['EmpID']." WHERE LeaveID = $leaveID ";
    mysqli_query($con,$sql);
    
    
    $sql = " UPDATE shift SET EmpID = 4003  WHERE EmpID = $empId AND WorkDate = '$leaveDate' ";
    mysqli_query($con,$sql);
    
   echo'<script>window.location.assign("../admin/home.php");</script>';
}

if(isset($_GET['decline'])){
    $leaveID = $_GET['leaveID'];
    $sql = " UPDATE leaveday SET status = 'dicline' , ApprovedBy = ".$_SESSION['EmpID']." , Reason = '".$_POST['reason']."' WHERE LeaveID = $leaveID ";
    mysqli_query($con,$sql);
    //echo'<script>window.location.assign("../admin/home.php");</script>';
}
?>