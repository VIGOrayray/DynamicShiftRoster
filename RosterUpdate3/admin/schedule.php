<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Select Schedule</h2>
                <form id="forms" method="Post" action="#">
                    <select id="ScheduleID" name="ScheduleID" required>
                        <option value="">Select Date </option>';
                        $sql="SELECT * FROM schedule ORDER BY ScheduleID DESC";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                    '<option value="'.$row['ScheduleID'].'">'.$row['DateCreated'].'</option>';                             
                        }
echo                '</select>     
                </form>
            </div>
        </div>
    </div>';    
    echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Create New Schedule</h2>
                <form id="forms" method="Post" action="#">
                <a href="ScheduleDetails.php"><div class="btn">Create</div></a>   
                </form>
            </div>
        </div>
    </div>';

    ?>







    <script>
    document.getElementById("ScheduleID").onchange = function() { 
        document.getElementById("forms").submit();
    };
</script>

<?php

echo'<div class="col-md-12">.</div>'; 
if(isset($_POST['ScheduleID'])){
echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Schedule Created on 2018-05-11</h2>
            </div>
            <table>
                    <tr>
                        <th>Schedule ID</th>
                        <th>Created On</th>
                        <th>Created by</th>
                    </tr>
                    ';
                        $scheduleID = 0;
                        $sql="SELECT * FROM schedule WHERE ScheduleID ='".$_POST['ScheduleID']."' ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
                            $scheduleID = $row['ScheduleID'];
echo                        '<tr>
                             <td>'.$row['ScheduleID'].'</td>
                             <td>'.$row['DateCreated'].'</td>
                             <td>';
                                    $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']." ";
                                    $query2 =mysqli_query($con,$sql2);
                                    while($row2 =mysqli_fetch_array($query2)){
echo                                    $row2['EmpSurname'].' '.$row2['EmpName'];
                                    }
                        echo'</td>
                             </tr>'; 
                        }
echo                '
            </table>
        </div>
    </div>';
echo'<div class="col-md-12">.</div>';    
echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 300px; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">P1 Shift </h2>
            </div>
            <table>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    ';
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID  = $scheduleID AND shiftType='p1' AND dayType='weekday'  ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['StartTime'].':00</td>
                                <td>'.$row['EndTime'].':00</td>
                             </tr>'; 
                        }
echo                '
            </table>
        </div>
    </div>';    

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 300px; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Call Shift </h2>
            </div>
            <table>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    ';
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID  = $scheduleID AND shiftType='call' AND dayType='weekday' ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['StartTime'].':00</td>
                                <td>'.$row['EndTime'].':00</td>
                             </tr>';
                        }
echo                '
            </table>
        </div>
    </div>'; 


$date->modify('last saturday of this month');

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 300px; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Saturday Shift </h2>
            </div>
            <table>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    ';
                        $date = new DateTime('now');
                        if($date->modify('last saturday of this month')){
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID  = $scheduleID AND dayType='saturday' AND shiftType='Both' ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
 echo                        '<tr>
                                <td>'.$row['StartTime'].':00</td>
                                <td>'.$row['EndTime'].':00</td>
                             </tr>'; 
                                                    }
                       }else {
                           
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID  = $scheduleID AND dayType='saturday' ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['StartTime'].':00</td>
                                <td>'.$row['EndTime'].':00</td>
                             </tr>'; 
                        }
                    }
echo                '
            </table>
        </div>
    </div>'; 

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 300px; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Sunday Shift </h2>
            </div>
            <table>
                    <tr>
                        <th>Start Time</th>
                        <th>End Time</th>
                    </tr>
                    ';
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID  = $scheduleID AND dayType='Sunday' ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '<tr>
                                <td>'.$row['StartTime'].':00</td>
                                <td>'.$row['EndTime'].':00</td>
                             </tr>'; 
                        }
echo                '
            </table>
        </div>
    </div>';
}



?>