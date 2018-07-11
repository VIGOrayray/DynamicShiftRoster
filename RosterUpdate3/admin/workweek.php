<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Select Schedule</h2>
                <form id="forms" method="Post" action="#">
                    <select id="days" name="days" required>
                        <option value="">Select Range</option>';
echo                    '<option value="7">1 week</option>';                             
echo                    '<option value="14">2 weeks</option>';
echo                    '<option value="21">3 weeks</option>';
echo                    '<option value="28">4 weeks</option>';
echo                '</select>     
                </form>
            </div>
        </div>
    </div>';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Select Employee</h2>
                <form id="forms2" method="Post" action="#">
                    <select id="employeeID" name="employeeID" required>';
                        $sql="SELECT * FROM employee WHERE EmployeeType = 'p1' OR EmployeeType = 'call' ";
                        $query =mysqli_query($con,$sql);
echo                    '<option value="">Select Employee</option>
                         <option value="all">All</option>';  
                        while($row =mysqli_fetch_array($query)){
echo                    '<option value="'.$row['EmpID'].'">'.$row['EmpName'].'</option>';                             
                        }
echo                '</select>     
                </form>
            </div>
        </div>
    </div>'; 

    echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">View Past Schedule</h2>
                <form id="forms" method="Post" action="#">
                <a href="Pastworkweek.php"><div class="btn">History</div></a>   
                </form>
            </div>
        </div>
    </div>'; 
?>

<script>
    document.getElementById("days").onchange = function() { 
        document.getElementById("forms").submit();
    };
    
    document.getElementById("employeeID").onchange = function() { 
        document.getElementById("forms2").submit();
    };
</script>

<?php
 
if(!isset($_SESSION['searchID'])){
    $_SESSION['searchID']="";
}

if(!isset($_SESSION['scheduleRange'])){
    $_SESSION['scheduleRange']="";
}

if(isset($_POST['employeeID'])){
    $_SESSION['searchID'] = $_POST['employeeID'];
    if($_POST['employeeID']=="all"){
        $_SESSION['searchID'] = "";
    }
    
}

if($_SESSION['searchID']!=""){
echo'<div class="col-md-4">
    <div class="inputSpace">
        <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">';
            $sql="SELECT * FROM employee WHERE EmpID ='".$_SESSION['searchID']."' ";
            $query =mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($query)){
echo                '<h2 class="h2">Name: '.$row['EmpName'].' <br/> Type: '.$row['EmployeeType'].'</h2>';
            }

echo        '</div>
    </div>
</div>';
}

echo'<div class="col-md-12">.</div>';

if(isset($_POST['days'])){    
    
function ShowDay($thisDate,$con){
    
    if($_SESSION['searchID']==""){
        $sql="SELECT * FROM shift WHERE WorkDate ='".$thisDate."' ";
    }else{
        $sql="SELECT * FROM shift WHERE WorkDate ='".$thisDate."' AND EmpID = ".$_SESSION['searchID']." ";
    }
    
    
    $query =mysqli_query($con,$sql);
echo'<td><div style="width:100%; height:25px;">'.$thisDate.' </div>';
    while($row =mysqli_fetch_array($query)){
        
        $icon = "";
        if($row['shiftType']=="p1"){
            $icon = "p1";
        }elseif($row['shiftType']=="call"){
            $icon = "call";
        }elseif($row['shiftType']=="Both"){
            $icon = "both";
        }
        $statusIcon = "";
        if($row['actualStart']!=0 && $row['actualEnd']!=0){
            $statusIcon='<div style="color:#00f; float:right; width:10px; height:10px; background-color:#f0f; margin-top:2px;"></div>';
        }
        
//        if($row['EmpID']=='4004'){
//echo    '<a href="info.php?id='.$row['Work_ID'].'"><div class="dayCont" style="background-color:#f00;"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
//        }else if($row['actualStart']>($row['SartWork']+0.15)){
//echo    '<a href="info.php?id='.$row['Work_ID'].'"><div class="dayCont" style="background-color:#0f0;"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
//        }else{
//echo    '<a href="info.php?id='.$row['Work_ID'].'"><div class="dayCont"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
//        }

        if($row['EmpID']=='4004'){
echo    '<a href="info.php?id='.$row['shiftID'].'"><div class="dayCont" style="background-color:#f00;"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
        }else if($row['EmpID']=='4003'){
echo    '<a href="info.php?id='.$row['shiftID'].'"><div class="dayCont" style="background-color:#fff;"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
        }else if($row['actualStart']>($row['SartWork']+0.15)){
echo    '<a href="info.php?id='.$row['shiftID'].'"><div class="dayCont" style="background-color:#0f0;"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
        }else{
echo    '<a href="info.php?id='.$row['shiftID'].'"><div class="dayCont"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
        }        
    }
echo'</td>';
}    

echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Future schedule for '.$_POST['days'].' days</h2>
            </div>
            <table>
                    <tr>
                        <th><span>Monday</span></th>
                        <th><span>Tuesday</span></th>
                        <th><span>Wednesday</span></th>
                        <th><span>Thursday</span></th>
                        <th><span>Friday</span></th>
                        <th><span>Saturday</span></th>
                        <th><span>Sunday</span></th>
                    </tr>
                    ';
                        $tableRowCounter = 0;
                        for($i=0;$i<$_POST['days'];$i++){
                            $day = $i.'days';
                            $futureDate = date("Y-m-d",strtotime($day));
                            
                            $dayType= date('w', strtotime($futureDate));
                            
                            if($tableRowCounter==0){
                                echo'<tr>';
                            }
                            
                            if($dayType==2 && $tableRowCounter==0){
                                echo'<td></td><td></td>';
                            }
                            if($dayType==3 && $tableRowCounter==0){
                                echo'<td></td><td></td>';
                            }
                            if($dayType==4 && $tableRowCounter==0){
                                echo'<td></td><td></td><td></td>';
                            }
                            if($dayType==5 && $tableRowCounter==0){
                                echo'<td></td><td></td><td></td><td></td>';
                            }
                            if($dayType==6 && $tableRowCounter==0){

                                echo'<td></td><td></td><td></td><td></td><td></td>';
                            }
                            if($dayType==0 && $tableRowCounter==0){
                                echo'<td></td><td></td><td></td><td></td><td></td><td></td>';
                            }
                         
                            
                            if($dayType==1){
                                $tableRowCounter=1;
                                ShowDay($futureDate,$con);
                            }
                            if($dayType==2){    
                                $tableRowCounter=2;
                                ShowDay($futureDate,$con);
                            }
                            if($dayType==3){    
                                $tableRowCounter=3;
                                ShowDay($futureDate,$con);
                            }
                            if($dayType==4){    
                                $tableRowCounter=4;
                                ShowDay($futureDate,$con);
                            }
                            if($dayType==5){    
                                $tableRowCounter=5;
                                ShowDay($futureDate,$con);
                            }
                            if($dayType==6){    
                                $tableRowCounter=6;
                                ShowDay($futureDate,$con);
                            }
                            if($dayType==0){    
                                $tableRowCounter=7;
                                ShowDay($futureDate,$con);
                            }
                            
                            if($tableRowCounter==7){
                                $tableRowCounter=0;
                                echo'</tr>';
                            }
                        }
                                
echo                '
            </table>
        </div>
    </div>';
echo'<div class="col-md-12">.</div>'; 
}
?>