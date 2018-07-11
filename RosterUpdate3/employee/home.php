<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

    if(isset($_POST['Start'])){
        $houur = Date("H");
        $minuts= Date("i");
        $startTime = $houur.'.'.$minuts;
        $sql = " UPDATE shift SET actualStart = $startTime WHERE  WorkDate ='".$today."' AND EmpID = ".$_SESSION['EmpID']." ";
        mysqli_query($con,$sql);
    }    

    if(isset($_POST['end'])){
        $houur = Date("H");
        $minuts= Date("i");
        $endTime = $houur.'.'.$minuts;
        $sql = " UPDATE shift SET actualEnd = $endTime WHERE  WorkDate ='".$today."' AND EmpID = ".$_SESSION['EmpID']." ";
        mysqli_query($con,$sql);
    }   
    $startTime=0;
    $sql="SELECT * FROM shift WHERE actualStart > 0 AND actualEnd > 0 AND WorkDate ='".$today."' AND EmpID = ".$_SESSION['EmpID']." ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        echo'<div class="col-md-12">
            <div class="inputSpace">
                <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                    <h2 class="h2">Shift Update</h2>
                        <div style="width:300px; text-align:center; margin:0 auto; color:#fff;">';
                        $startTime = $row['actualStart'];
                        $endTime = $row['actualEnd'];
                        echo 'You have worked for '. ($endTime - $startTime) . ' Hours';
echo                    '</div>
                </div>
            </div>
        </div>
        <div class="col-md-12">.</div>';
    }
    if($startTime==0){
echo'<div class="col-md-6">
            <div class="inputSpace">
                <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                    <h2 class="h2">Start</h2>';
       
            $sql="SELECT * FROM shift WHERE WorkDate ='".$today."' AND (SartWork = $houur OR SartWork < $houur) AND actualStart = 0 AND EmpID = ".$_SESSION['EmpID']." ";
            $query =mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($query)){
echo            '<div style="width:50px; margin:0 auto;">
                    <form action="#" method="POST"><input class="btn" style="background-color:#0A0;" type="submit" name="Start" value="Start" /></form>
                </div>';
            }
    echo'        </div>
            </div>
        </div>';
    
    echo'<div class="col-md-6">
            <div class="inputSpace">
                <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                    <h2 class="h2">Complete</h2>';
       
            $sql="SELECT * FROM shift WHERE WorkDate ='".$today."' AND (SartWork = $houur OR SartWork < $houur) AND actualStart > 0 AND actualEnd = 0 AND EmpID = ".$_SESSION['EmpID']." ";
            $query =mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($query)){
echo            '<div style="width:100px; margin:0 auto;">
                    <form action="#" method="POST"><input class="btn" style="background-color:#A00;" type="submit" name="end" value="Complete" /></form>
                </div>';
            }
    echo'        </div>
            </div>
        </div>';
echo'<div class="col-md-12">.</div>';            
    }
    
function ShowDay($thisDate,$con){
    
    $sql="SELECT * FROM shift WHERE WorkDate ='".$thisDate."' AND EmpID = ".$_SESSION['EmpID']." ";

    $query =mysqli_query($con,$sql);
echo'<td><div style="width:100%; height:15px;"> </div>';
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

        if($row['EmpID']=='4004'){
echo    '<a href="info.php?id='.$row['shiftID'].'"><div class="dayCont" style="background-color:#f00;"><div class="Emp'.$icon.'">'.$row['shiftType'].'</div>'.$row['SartWork'].':00 -'.$row['EndWork'].':00 '.$statusIcon.'</div></a>';            
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
                <h2 class="h2">Schedule</h2>
            </div>
            <table>
                    <tr>
                        <th>Mon</th>
                        <th>Tus</th>
                        <th>Wen</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                        <th>Sun</th>
                    </tr>
                    ';
                        
                        $tableRowCounter = 0;
                        for($i=0;$i<14;$i++){
                            
                            $day = $i.'days';
                            $futureDate = date("Y-m-d",strtotime($day));
                            $dayType= date('w', strtotime($futureDate));
                            if($tableRowCounter==0){
                                echo'<tr>';
                            }
                            
                            if($dayType==2 && $tableRowCounter==0){
                                echo'<td></td>';
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
?>