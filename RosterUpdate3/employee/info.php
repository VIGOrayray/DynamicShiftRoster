<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';
    
    $workID=0;
    if($_GET['id']){
        $workID = $_GET['id'];
    }
    
    $workDate = "";
    $StartWork = 0;
    $actualStart=0;
    $StartEnd = 0;
    $actualEnd=0;
    $shiftType="";
    $EmpID = 0;
    
    $sql="SELECT * FROM shift WHERE shiftID ='".$workID."' ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        $workDate = $row['WorkDate'];
        $StartWork = $row['SartWork'];
        $actualStart=$row['actualStart'];
        $StartEnd = $row['EndWork'];
        $actualEnd=$row['actualEnd'];
        $shiftType=$row['shiftType'];
        $EmpID = $row['EmpID'];
    }
    if($EmpID!=4004 || $EmpID!=4003){
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
                    </tr>
                    ';
                        $sql="SELECT * FROM employee WHERE EmpID = $EmpID ";
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
                             </tr>'; 
                        }
echo                '
            </table>
            </div>
            </div>
        </div>';

    echo'<div class="col-md-12">.</div>';
    }
    
    
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
                        <th>Actual strat</th>
                        <th>Actual end</th>
                        <th>Shift type</th>
                    </tr>';
                        $sql="SELECT * FROM shift WHERE shiftID = $workID ";
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

    if($EmpID==4004 || $EmpID==4003){
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
                        $sql="SELECT * FROM extrashift WHERE work_id = $workID ";
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