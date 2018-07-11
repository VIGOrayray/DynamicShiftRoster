<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';
echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Add Employee</h2>
            </div>
            <div style="width:50px; margin:0 auto;">
                <a href="addemployee.php"><input class="btn" type="submit" name="add" value="Add" /></a>
            </div>
        </div>    
    </div>';
echo'<div class="col-md-12">.</div>';
echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">P1 Standby</h2>
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
                        $sql="SELECT * FROM employee WHERE EmployeeType ='p1' ";
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
            </table>
        </div>
    </div>';

echo'<div class="col-md-12">.</div>';

echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Call Managers</h2>
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
                        $sql="SELECT * FROM employee WHERE EmployeeType ='call' ";
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
            </table>
        </div>
    </div>';

    echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">SDM</h2>
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
                        $sql="SELECT * FROM employee WHERE EmployeeType ='SDM' ";
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
            </table>
        </div>
    </div>';

    echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Engineers</h2>
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
                        $sql="SELECT * FROM employee WHERE EmployeeType ='Engineer' ";
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
            </table>
        </div>
    </div>';
?>