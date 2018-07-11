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
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Leave Statues</h2>
               <select id="employeeID" name="status" required>
                <option value="">Select Status</option>
                <option value="sent">Sent</option>
                <option value="approved">Approved</option>
                <option value="decline">Rjected</option>
                </select>
            </div>
        </div>
    </div>';
echo'<div class="col-md-8">.</div>';
echo'<div class="col-md-8">
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
        $status = $_POST['status'];
        
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
        
        $_SESSION['status'] = $status;
        
    echo'<div class="col-md-12">.</div>'; 
                echo'<div class="col-md-12">
                    <div class="inputSpace" style="text-align: center; color:#fff;">
                        <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                            <h2 class="h2">Leave from '.$from.' - '.$to.' that have been '.$_SESSION['status'].'</h2>
                        </div>';
        if($_SESSION['EmployeeID']!=""){
            $sql="SELECT * FROM employee WHERE EmpID = ".$_SESSION['EmployeeID']." ";       
        }else{
            $sql="SELECT * FROM employee ";       
        }
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){    
            $sql2="SELECT * FROM leaveday WHERE leaveDate BETWEEN CAST('$from' AS DATE) AND CAST('$to' AS DATE) AND EmpID = ".$row['EmpID']." AND status = '".$_SESSION['status']."' ";       
            $query2 =mysqli_query($con,$sql2);
            while($row2 =mysqli_fetch_array($query2)){ 
                if($_SESSION['status']=="approved"){
                    echo 'On '. $row2['leaveDate']. ' '. $row['EmpSurname'].' '.$row['EmpName'].' was on leave and the reason was "'.$row2{'Reason'}.'" </br>';
                }elseif($_SESSION['status']=="sent"){
                    echo 'On '. $row2['leaveDate']. ' '. $row['EmpSurname'].' '.$row['EmpName'].' sent a request for leave with the reason "'.$row2{'Reason'}.'" </br>';
                }elseif($_SESSION['status']==""){
                    echo 'On '. $row2['leaveDate']. ' '. $row['EmpSurname'].' '.$row['EmpName'].'\'s request for leave was with the reason "'.$row2{'Reason'}.'" was declined because </br>';
                }
                
            }
            
        }           
    echo'</div></div>';    
    }
?>