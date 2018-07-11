<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';
    
    if(!isset($_SESSION['shift'])){
        $_SESSION['shift']=0;
    }
    
    $shiftID=0;
    if($_GET['id']){
        $_SESSION['shift'] = $_GET['id'];
    }
    
    if(isset($_POST['asign'])){
        $empID = $_POST['assignEmpID'];
        $today = Date('Y-m-d');
        $sql = " INSERT INTO overtime VALUES('',$empID,'$today',".$_SESSION['shift'].") ";
        mysqli_query($con,$sql);
        
        $sql = " UPDATE shift SET EmpID = 4004 WHERE shiftID = ".$_SESSION['shift']." ";
        mysqli_query($con,$sql);
        
    }
    
    
    $workDate = "";
    $StartWork = 0;
    $actualStart=0;
    $StartEnd = 0;
    $actualEnd=0;
    $shiftType="";
    $shiftID="";
    $EmpID = 0;
    
    $sql="SELECT * FROM shift WHERE shiftID =".$_SESSION['shift']." ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        $workDate = $row['WorkDate'];
        $StartWork = $row['SartWork'];
        $actualStart=$row['actualStart'];
        $StartEnd = $row['EndWork'];
        $actualEnd=$row['actualEnd'];
        $shiftType=$row['shiftType'];
        $arragementID=$row['arragementID'];
        $EmpID = $row['EmpID'];
    }
    

    
    echo'<div class="col-md-10">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Employee</h2>
                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Experience</th>
                        <th>Mobile Number</th>
                        <th></th>
                    </tr>
                    ';
                        $thisEmpID = 0;
                        if($EmpID==4003 || $EmpID==4004){
                            $sql="SELECT * FROM leaveday WHERE shiftID = ".$_SESSION['shift']." ";
                            $query =mysqli_query($con,$sql);
                            while($row =mysqli_fetch_array($query)){
                                echo 'On leave';
                                $thisEmpID = $row['EmpID'];
                            }
                            $sql="SELECT * FROM employee WHERE EmpID = $thisEmpID ";
                        }else{
                            $sql="SELECT * FROM employee WHERE EmpID = $EmpID ";
                        }
                        
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['EmpID'].'</td>
                                <td>'.$row['EmployeeType'].'</td>
                                <td>'.$row['Title'].'</td>
                                <td>'.$row['EmpSurname'].'</td>
                                <td>'.$row['EmpName'].'</td>
                                <td>'.$row['Experience'].'</td>
                                <td>'.$row['MobileNumber'].'</td>
                                <td><form action="Viewemployee.php" maethod="post"><input type="hidden" name="empID" value="'.$row['EmpID'].'" /><input class="btn" type="submit" name="view" value="View More" /></form></td>
                             </tr>'; 
                        }
echo                '
            </table>
            </div>
            </div>
        </div>';

    echo'<div class="col-md-12">.</div>';
  
    
    
    echo'<div class="col-md-10">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Shift Details</h2>
                <table>
                    <tr>
                        <th>Shift ID</th>
                        <th>Work Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Actual start</th>
                        <th>Actual end</th>
                        <th>Shift type</th>
                    </tr>';
                        $sql="SELECT * FROM shift WHERE shiftID = ".$_SESSION['shift']." ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['EmpID'].'</td>
                                <td>'.$row['WorkDate'].'</td>
                                <td>'.$row['SartWork'].':00</td>
                                <td>'.$row['EndWork'].':00</td>
                                <td>'.$row['actualStart'].'</td>
                                <td>'.$row['actualEnd'].'</td>
                                <td>'.$row['shiftType'].'</td>
                             </tr>'; 
                        }
echo                '
            </table>
            </div>
        </div></div>';

echo'<div class="col-md-12">.</div>';
    if($EmpID==4003){
echo'<form action="#" method="Post">
    <div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2" style="color:orange;">Select over time Employee</h2>
                '; 
echo            '<select style="width:200px; background-color:#ccc;" name="assignEmpID" required>
                    <option value="">Select Employees</option>';
                    $sql="SELECT * FROM employee WHERE Status = 'active' AND (EmployeeType = 'p1' OR EmployeeType = 'call') AND EmpID != $thisEmpID ";
                    echo $sql;
                    $query =mysqli_query($con,$sql);
                    while($row =mysqli_fetch_array($query)){
                        echo '<option value="'.$row['EmpID'].'">'.$row['EmpSurname'].' '.$row['EmpName'].'</option>';    
                    }
echo'           </select>
                    <input type="hidden" name="shiftID" value="'.$_SESSION['shift'].'"/>
                    <input class="btn" type="submit" name="asign" value="Assign" />
            </div>
        </div>
    </div>
    </form>';
            
//    echo'<div class="col-md-3">
//        <div class="inputSpace">
//            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
//                <h2 class="h2" style="color:#f00;">Extra Shift</h2>
//                <table>
//                    <tr>
//                        <th>Employee ID</th>
//                        <th>Type</th>
//                        <th>Title</th>
//                        <th>Surname</th>
//                        <th>Name</th>
//                        <th>Experience</th>
//                        <th>Mobile Number</th>
//                        <th></th>
//                    </tr>
//                    ';
//                        $sql="SELECT * FROM extrashift WHERE work_id = $workID ";
//                        $query =mysqli_query($con,$sql);
//                        while($row =mysqli_fetch_array($query)){
//                            $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']." ";
//                            $query2 =mysqli_query($con,$sql2);
//                            while($row2 =mysqli_fetch_array($query2)){
//echo                            '<tr>
//                                    <td>'.$row2['EmpID'].'</td>
//                                    <td>'.$row2['EmployeeType'].'</td>
//                                    <td>'.$row2['Title'].'</td>
//                                    <td>'.$row2['EmpSurname'].'</td>
//                                    <td>'.$row2['EmpName'].'</td>
//                                    <td>'.$row2['Experience'].'</td>
//                                    <td>'.$row2['MobileNumber'].'</td>
//                                    <td><form action="Viewemployee.php" maethod="post"><input type="hidden" name="empID" value="'.$row['EmpID'].'" /><input class="btn" type="submit" name="view" value="View More" /></form></td>
//                                 </tr>'; 
//                            }
//                        }
//echo                '
//            </table>
//            </div>
//            </div>
//        </div>';
echo'<div class="col-md-12">.</div>'; 
    }
    

    if($EmpID==4004){
    echo'<div class="col-md-10">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2" style="color:#f00;">Extra Shift</h2>
                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Experience</th>
                        <th>Mobile Number</th>
                        <th></th>
                    </tr>
                    ';
                        $sql="SELECT * FROM overtime WHERE shiftID = ".$_SESSION['shift']." ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
                            $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']." ";
                            $query2 =mysqli_query($con,$sql2);
                            while($row2 =mysqli_fetch_array($query2)){
echo                            '<tr>
                                    <td>'.$row2['EmpID'].'</td>
                                    <td>'.$row2['EmployeeType'].'</td>
                                    <td>'.$row2['Title'].'</td>
                                    <td>'.$row2['EmpSurname'].'</td>
                                    <td>'.$row2['EmpName'].'</td>
                                    <td>'.$row2['Experience'].'</td>
                                    <td>'.$row2['MobileNumber'].'</td>
                                    <td><form action="Viewemployee.php" maethod="post"><input type="hidden" name="empID" value="'.$row['EmpID'].'" /><input class="btn" type="submit" name="view" value="View More" /></form></td>
                                 </tr>'; 
                            }
                        }
echo                '
            </table>
            </div>
            </div>
        </div>';

    echo'<div class="col-md-12">.</div>';
    }
?>