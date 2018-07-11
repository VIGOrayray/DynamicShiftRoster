<?php

session_start();
include '../Config.php';

$username ='';
$password=0;

if (isset($_POST['submit'])){
	$username=$_POST["username"];
	$password=md5($_POST["password"]);


	$sql="SELECT * FROM employee WHERE Username='$username' And Password='$password'";
	$query =mysqli_query($con,$sql);
	while($row =mysqli_fetch_array($query)){
                
                if($row['EmployeeType']=='p1' || $row['EmployeeType']=='call'){
                    $_SESSION['EmpID'] = $row['EmpID'];
                    $_SESSION['userType'] = $row['EmployeeType'];
                    echo'<script>window.location.assign("../employee/home.php");</script>';
                }
            
                if($row['EmployeeType']=='admin'){
                    $_SESSION['EmpID'] = $row['EmpID'];
                    $_SESSION['userType'] = "Admin";
                    echo'<script>window.location.assign("../admin/home.php");</script>';
                }       
	}
        echo'<script>window.location.assign("../wrongPassword.php");</script>';
}

?>

