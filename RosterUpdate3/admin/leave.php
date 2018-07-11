<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';
    
    $leaveID = 0;
    $empId =0;
    
    $leaveID = $_POST['leaveID'];
    $empId = $_POST['employeeID'];
    
echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Leave Details</h2>
            </div>
            <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>Qualification</th>
                        <th>Experience</th>
                        <th>Mobile Number</th>
                        <th></th>
                    </tr>
                    ';
                        $sql="SELECT * FROM employee WHERE EmpID =$empId ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['EmpID'].'</td>
                                <td>'.$row['EmployeeType'].'</td>
                                <td>'.$row['Title'].'</td>
                                <td>'.$row['EmpSurname'].'</td>
                                <td>'.$row['EmpName'].'</td>
                                <td>'.$row['Qualification'].'</td>    
                                <td>'.$row['Experience'].'</td>
                                <td>'.$row['MobileNumber'].'</td>
                                <td><form action="Viewemployee.php" maethod="post"><input type="hidden" name="empID" value="'.$row['EmpID'].'" /><input class="btn" type="submit" name="view" value="View More" /></form></td>
                             </tr>'; 
                        }
echo                '
            </table>';
            $sql="SELECT * FROM leaveday WHERE status = 'sent' AND LeaveID = $leaveID ";
                $query =mysqli_query($con,$sql); 
                while($row =mysqli_fetch_array($query)){
                    $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']."  ";
                    $query2 =mysqli_query($con,$sql2); 
                    while($row2 =mysqli_fetch_array($query2)){
echo                     '<p style="color:#fff;">Requesting a leave on '.$row['leaveDate'].'<br/>'
        . 'Ression : '.$row['Reason'].' </p>';
$leaveDate = $row['leaveDate'];

                    }
               
                }
echo    '</div>    
    </div>';
echo'<div class="col-md-112">.</div>';
echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Accept</h2>
            </div>
            <form action="leaveScript.php" maethod="post" >
            <div style="width:50px; margin:0 auto;">
                <input class="btn" type="submit" name="accept" value="accept" /></a>
                <input type="hidden" name="leaveDate" value="'.$leaveDate.'"/>
                <input type="hidden" name="leaveID" value="'.$leaveID.'"/>
                <input type="hidden" name="empId" value="'.$empId.'"/>
            </div>
            </form>
        </div>    
    </div>';
echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Decline</h2>
            </div>
            <form action="leaveScript.php" maethod="post">
            <div style="width:230px; margin:0 auto;">
                <textarea name="reason" placeholder="Explanation for declining" required></textarea>
                <input type="hidden" name="leaveDate" value="'.$leaveDate.'"/>
                <input type="hidden" name="leaveID" value="'.$leaveID.'"/>
                <input type="hidden" name="empId" value="'.$empId.'"/>
            </div>
            <div style="width:50px; margin:0 auto;">
                <input class="btn" type="submit" name="decline" value="Decline" /></a>
            </div>
            </form>
        </div>    
    </div>';


?>