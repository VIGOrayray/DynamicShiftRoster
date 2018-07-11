<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';
    
    if(!isset($_SESSION['startDate'])){
        $_SESSION['startDate'] = "";
    }
    
    if(!isset($_SESSION['endDate'])){
        $_SESSION['endDate'] = "";
    }
    
    if(!isset($_SESSION['EmployeeID'])){
        $_SESSION['EmployeeID'] = "";
    }
    
    if(!isset($_SESSION['status'])){
        $_SESSION['status'] = "";
    }

    
    echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Select Date</h2>
                <form id="forms" method="Post" action="#">
                    <h2 class="h2">From</h2>
                    <input style="background-color:#ccc;" type="date" name="from" required/>
                    <h2 class="h2">To</h2>
                    <input style="background-color:#ccc;" type="date" name="to" required/>
            </div>
        </div>
    </div>';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Select Employee</h2>
                
                    <select id="employeeID" name="employeeID">';
                        $sql="SELECT * FROM employee ";
                        $query =mysqli_query($con,$sql);
echo                    '<option value="">Select Employee</option>
                         <option value="all">All</option>';  
                        while($row =mysqli_fetch_array($query)){
echo                    '<option value="'.$row['EmpID'].'">'.$row['EmpName'].'</option>';                             
                        }
echo                '</select>     
                
            </div>
        </div>
    </div>';  
echo'<div class="col-md-4">
        <div class="inputSpace">
        <div style="width:100px; margin:0 auto;">
            <input class="btn" type="submit" name="search" value="search" />
        </div>
        </div>
        </form>
    </div>';

 
   if(isset($_POST['search'])){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $employeeID = $_POST['employeeID'];

        if($to<$from){
            $temp = $to;
            $to = $from;
            $from = $temp;
        }
        
        $_SESSION['startDate'] = $from;
        $_SESSION['endDate'] = $to;
        if($_SESSION['EmployeeID'] =="all"){
            $_SESSION['EmployeeID'] = "";
        }else{
            $_SESSION['EmployeeID'] = $employeeID;
        }
        
    echo'<div class="col-md-12">.</div>'; 
        if($_SESSION['EmployeeID']!=""){
            $sql="SELECT * FROM shift WHERE EmpID = ".$_SESSION['EmployeeID']." ";       
        }else{
            $sql="SELECT * FROM shift ";       
        }
        $query =mysqli_query($con,$sql);
            echo'<div class="col-md-12">
                    <div class="inputSpace" style="text-align: center; color:#fff;">
                        <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                            <h2 class="h2">'.$from.' - '.$to.'</h2>
                        </div>';
            $hoursWorked = 0;
            while($row =mysqli_fetch_array($query)){ 
                if($row['actualEnd']>0 && $row['actualStart']>0){
                $hoursWorked = $hoursWorked + ($row['actualEnd'] - $row['actualStart']);
                }
            }
            if($_SESSION['EmployeeID']!=""){
                $sql="SELECT * FROM employee WHERE EmpID = ".$_SESSION['EmployeeID']." ";
                $query =mysqli_query($con,$sql);
                while($row =mysqli_fetch_array($query)){ 
                    echo $row['EmpSurname'].' '.$row['EmpName'].' Worked for '.$hoursWorked.' hours';       
                } 
            }else{
                echo $hoursWorked.' Hours were worked';       
            }
            echo'</div></div>';
        }           
        
    


?>