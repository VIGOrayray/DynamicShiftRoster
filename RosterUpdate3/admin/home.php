<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';
    
    $no_of_p1 = 0;
    $sql="SELECT EmpID FROM employee WHERE EmployeeType = 'p1' AND Status = 'active' ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        $no_of_p1++;
    }
    
    $no_of_call = 0;
    $sql="SELECT EmpID FROM employee WHERE EmployeeType = 'call' AND Status = 'active' ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        $no_of_call++;
    }
    
    $active_schedule=0;
    $sql="SELECT ScheduleID FROM schedule WHERE status = 'active'  ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        $active_schedule = $row['ScheduleID'];
    }
    
//    $tomorow2Found ="";
//    $futureDate = date("Y-m-d",strtotime('+3days'));
//    $date = Date('Y-m-d');
    //echo $dayofweek = date('w', strtotime($tomorow2));
    
    $p1IDArray =  array();
    $sql="SELECT EmpID FROM employee WHERE status = 'active' AND EmployeeType='p1' ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        array_push($p1IDArray, $row['EmpID']);
    }
    
    $callIDArray =  array();
    $sql="SELECT EmpID FROM employee WHERE status = 'active' AND EmployeeType='call' ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        array_push($callIDArray,$row['EmpID']);
    }   
    
//    $pastDate = date("Y-m-d",strtotime('-14days'));
//    echo $pastDate;
//    
//    $sql="SELECT EmpID FROM workday WHERE shiftType = 'p1' AND WorkDate =  ";
//    $query =mysqli_query($con,$sql);
//    while($row =mysqli_fetch_array($query)){
//        
//    }

    $dayCount = 2;
    $futureDate = date("Y-m-d",strtotime('0days'));
    $dayType= date('w', strtotime($futureDate));

            
    for($i=0;$i<$dayCount;$i++){

        $day = $i.'days';
        $futureDate = date("Y-m-d",strtotime($day));

        $dayFound="";
        $sql="SELECT WorkDate FROM shift WHERE WorkDate = '$futureDate' ";
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){
            $dayFound = "yes";
        }

        
        if($dayFound==""){

            $dayType= date('w', strtotime($futureDate));

            if($dayType==1 || $dayType==2 || $dayType==3 || $dayType==4 || $dayType==5 ){
                $sql="SELECT * FROM shiftarrangement WHERE ScheduleID= $active_schedule AND dayType = 'weekday' ";
            }
            $query =mysqli_query($con,$sql);
            $shiftCount =0;
            while($row =mysqli_fetch_array($query)){
                
                $shiftCount++;
                
                if($dayType==1 && $shiftCount == 1){
                    //skip the first shit for monday 
                }else{
                    if($row['shiftType']=="p1" || $row['shiftType']=="Both" ){
                        $sql = " INSERT INTO shift VALUES('','$futureDate',".$row['StartTime'].",0,".$row['EndTime'].",0,'".$row['shiftType']."',".$row['arrangementID'].",0) ";
                        mysqli_query($con,$sql);
                    }elseif($row['shiftType']=="call"  || $row['shiftType']=="Both"){
                        $sql = " INSERT INTO shift VALUES('','$futureDate',".$row['StartTime'].",0,".$row['EndTime'].",0,'".$row['shiftType']."',".$row['arrangementID'].",0) ";
                        mysqli_query($con,$sql);
                    }
                   
                }
            }
            
            if($dayType==6){
                
                for($x=1;$x<3;$x++){
                    if($x==1){
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID= $active_schedule AND dayType = 'saturday' ";
                    }elseif($x==2){
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID= $active_schedule AND dayType = 'sunday' ";
                        $futureDate = date("Y-m-d",strtotime($futureDate.'+1day'));
                    }
                    $query =mysqli_query($con,$sql);
                    while($row =mysqli_fetch_array($query)){                    
                        $sql = " INSERT INTO shift VALUES('','$futureDate',".$row['StartTime'].",0,".$row['EndTime'].",0,'".$row['shiftType']."',".$row['arrangementID'].",0) ";
                        mysqli_query($con,$sql);
                    }
                }
            }
            
            
       }
    }

    $skippDate="";
    $weekCount=0;
    $foundArrangement ="";
    $p1ShiftArray =  array();
    $today = date('Y-m-d');
    $dateAfter14days = date("Y-m-d",strtotime($today.'+'.($dayCount-1).'day'));
    
    for($i=0;$i<90;$i++){
        
        $day = '-'.$i.'days';
        $pastDate = date("Y-m-d",strtotime($dateAfter14days.$day));   
        $dayType= date('w', strtotime($pastDate));
        if($dayType==1 || $dayType==6 || $dayType==0 ){
            if($dayType==6){
                $weekCount++;
            }
        }else{
            $shiftCount = 0;
            $sql="SELECT * FROM shift WHERE WorkDate = '$pastDate' AND shiftType = 'p1' ";
            //echo $sql.'<br/>';
            $query =mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($query)){
                
                if($foundArrangement == ""){
                    if($row['EmpID']==4004 || $row['EmpID']==4003 || $row['EmpID']==0 ){
                        $skippDate = $row['WorkDate'];
                        $p1ShiftArray =  array();
                        $shiftCount = 0;
                    }else{
                        if($skippDate != $row['WorkDate']){
                            $p1ShiftArray[$shiftCount] = $row['EmpID'];
                            $shiftCount++;
                            if($shiftCount == $no_of_p1){
                                $i = 300000;
                            }
                        }else{
                            $p1ShiftArray =  array();
                            $shiftCount = 0;
                        } 
                    }    
                }
               
            }
        }
    }   

    $weekendCouner = 0;
    if($dayType==6 || $dayType==0){
        
        $weekendShift = array();
        for($i=0;$i<($no_of_p1 + $no_of_call);$i++){
            array_push($weekendShift,'');
        }
        $sat = date("Y-m-d",strtotime($dateAfter14days.'-1day'));
        $sql="SELECT * FROM shift WHERE WorkDate = '$sat' AND shiftType = 'p1' ";
  
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){
            if($weekendCouner==0){
                $sql = " UPDATE shift SET EmpID = $p1ShiftArray[0] WHERE shiftID = ".$row['shiftID']." ";
      //          echo $sql.'<br/>';
                mysqli_query($con,$sql);
                $weekendShift[0] = $p1ShiftArray[0];
            }
            $weekendCouner++; 
        }
        
        $sql="SELECT * FROM shift WHERE WorkDate = '$sat' AND shiftType = 'p1' ";
        
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){
       //     echo $weekendCouner;
            if($weekendCouner==1){
                $firstShift = ($no_of_p1-1);
                $sql = " UPDATE shift SET EmpID = $p1ShiftArray[$firstShift] WHERE shiftID = ".$row['shiftID']." ";
       //         echo $sql.'<br/>';
                mysqli_query($con,$sql);
                $weekendCouner++;
                $weekendShift[($no_of_p1 + $no_of_call)-1] = $p1ShiftArray[$firstShift];
            }
        }
//**        
//        $sql="SELECT * FROM shift WHERE (WorkDate = '$tomorow' OR WorkDate = '$sunday') AND shiftType == 'P1' AND EmpID = 0 ";
//        $query =mysqli_query($con,$sql);
//        while($row =mysqli_fetch_array($query)){
//            
//                $sql = " UPDATE shift SET EmpID = $p1ShiftArray[0] WHERE shiftID = ".$row['shiftID']." ";
//                echo $sql.'<br/>';
//                mysqli_query($con,$sql);
//                $weekendShift[0] = $p1ShiftArray[0];
//            $weekendCouner++;
//        }
        
        
        $sql="SELECT * FROM shift WHERE WorkDate = '$dateAfter14days' AND shiftType = 'p1' ";
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){
            if($weekendCouner==0){
                $sql = " UPDATE shift SET EmpID = $p1ShiftArray[0] WHERE shiftID = ".$row['shiftID']." ";
      //          echo $sql.'---------<br/>';
                mysqli_query($con,$sql);
                $weekendCouner++; 
            }
        }   
    }
    
    if($dayType==1){
        $sql="SELECT * FROM shift WHERE WorkDate = '$dateAfter14days' AND shiftType = 'p1' ";
        $query =mysqli_query($con,$sql);
        $counter = 0;
        while($row =mysqli_fetch_array($query)){
                $counter++;
                $sql = " UPDATE shift SET EmpID = $p1ShiftArray[$counter] WHERE shiftID = ".$row['shiftID']." ";
      //          echo $sql.'<br/>';
                mysqli_query($con,$sql);
                
        }
        $sql="SELECT * FROM shift WHERE WorkDate = '$dateAfter14days' AND shiftType = 'call' ";
        $query =mysqli_query($con,$sql);
        $counter = 0;
        while($row =mysqli_fetch_array($query)){
                $sql = " UPDATE shift SET EmpID = $callShiftArray[$counter] WHERE shiftID = ".$row['shiftID']." ";
                mysqli_query($con,$sql);
                $counter++;
            
        }
    }
    

    $skippDate="";
    $weekCount=0;
    $foundArrangement ="";
    $callShiftArray =  array();
    
    $dateAfter14days = date("Y-m-d",strtotime($today.'+'.($dayCount-1).'day'));
    for($i=0;$i<90;$i++){
        
        $day = '-'.$i.'days';
        $pastDate = date("Y-m-d",strtotime($dateAfter14days.$day));  
        $dayType= date('w', strtotime($pastDate));
        if($dayType==1 || $dayType==6 || $dayType==0 ){
            if($dayType==6){
                $weekCount++;
            }
        }else{
            $shiftCount = 0;
  //          echo $pastDate.'<br/>';
            $sql="SELECT * FROM shift WHERE WorkDate = '$pastDate' AND shiftType = 'call' ";
            $query =mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($query)){
                
                if($foundArrangement == ""){
                    if($row['EmpID']==4004 || $row['EmpID']==4003 || $row['EmpID']==0 ){
                        $skippDate = $row['WorkDate'];
                        $callShiftArray =  array();
                        $shiftCount = 0;
                    }else{
                        if($skippDate != $row['WorkDate']){
                            $callShiftArray[$shiftCount] = $row['EmpID'];
                            $shiftCount++;
                            if($shiftCount == $no_of_call){
                                $i = 300000;
                            }
                        }else{
                            $callShiftArray =  array();
                            $shiftCount = 0;
                        } 
                    }    
                }
       //         print_r($callShiftArray);
       //         echo'<br/>';
            }
        }
    }    

    
    
    
    if($weekCount>0){
        $tempP1ShiftArray =  array();
        if($weekCount==1){
            $tempP1ShiftArray = $p1ShiftArray;
            $p1ShiftArray[0] = $tempP1ShiftArray[$no_of_p1-1];
            
            for($i=1;$i<sizeof($p1ShiftArray);$i++){
                $p1ShiftArray[$i]= $tempP1ShiftArray[$i-1];
            }
        }
    }
    
    if($weekCount>0){
        $tempCallShiftArray =  array();
        if($weekCount==1){
            $tempCallShiftArray = $callShiftArray;
            $callShiftArray[0] = $tempCallShiftArray[$no_of_call-1];
            
            for($i=1;$i<sizeof($callShiftArray);$i++){
                $callShiftArray[$i]= $tempCallShiftArray[$i-1];
            }
        }
    }
    
    $shiftCount=0;
    $dateAfter14days = date("Y-m-d",strtotime($today.'+'.($dayCount-1).'day'));
    $dayType= date('w', strtotime($dateAfter14days)); 
    if($dayType==2 || $dayType==3 || $dayType==4 || $dayType==5){
        $shiftCount=0;
        $sql="SELECT * FROM shift WHERE WorkDate = '$dateAfter14days' AND shiftType = 'p1' ";
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){ 
            $sql = " UPDATE shift SET EmpID = $p1ShiftArray[$shiftCount] WHERE shiftID = ".$row['shiftID']." ";
            mysqli_query($con,$sql);
            $shiftCount++;
//            if( $dayType==5 && $no_of_schedule_p1 == $shiftCount ){
//                $sql = " UPDATE shift SET EmpID = $p1ShiftArray[0] WHERE shiftID = ".($row['shiftID']+1)." ";
//                echo $sql.'<br/>';
//                mysqli_query($con,$sql);
//            }
        }
        $shiftCount=0;
        $sql="SELECT * FROM shift WHERE WorkDate = '$dateAfter14days' AND shiftType = 'call' ";
        $query =mysqli_query($con,$sql);
        while($row =mysqli_fetch_array($query)){ 
            $sql = " UPDATE shift SET EmpID = $callShiftArray[$shiftCount] WHERE shiftID = ".$row['shiftID']." ";
//          
            mysqli_query($con,$sql);
            $shiftCount++;
        }    
    }
    

    
    
    
echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Leave Request</h2>';
                
                $sql="SELECT * FROM leaveday WHERE status = 'sent' ";
                $query =mysqli_query($con,$sql); 
                while($row =mysqli_fetch_array($query)){
                    $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']." ";
                    $query2 =mysqli_query($con,$sql2); 
                    while($row2 =mysqli_fetch_array($query2)){
echo                     $row2['EmpName'] .' requesting to leave on '.$row['leaveDate'].'<form action="leave.php" method="Post"> <input type="hidden" name="leaveID" value="'.$row['LeaveID'].'"/><input type="hidden" name="employeeID" value="'.$row['EmpID'].'"/><button name="view" type="submit" class="btn">View</button></form><br/>';
                    }
               
                }
echo        '</div>
        </div>
    </div>';  
    
echo'<div class="col-md-12">.</div>';
echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Employess on leave today</h2>
                <table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Type</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th></th>
                    </tr>';
                $todaay = Date("Y-m-d");
                $sql="SELECT * FROM leaveday WHERE status = 'approved' AND leaveDate = '$todaay' ";
                $query =mysqli_query($con,$sql); 
                while($row =mysqli_fetch_array($query)){
                    
                    $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']." ";
                    $query2 =mysqli_query($con,$sql2); 
                    while($row2 =mysqli_fetch_array($query2)){
echo                        '<tr>
                                <td>'.$row2['EmpID'].'</td>
                                <td>'.$row2['EmployeeType'].'</td>
                                <td>'.$row2['EmpSurname'].'</td>
                                <td>'.$row2['EmpName'].'</td>
                                <td><form action="Viewemployee.php" maethod="post"><input type="hidden" name="empID" value="'.$row2['EmpID'].'" /><input class="btn" type="submit" name="view" value="View More" /></form></td>
                             </tr>';
                    }
               
                }
echo        '</table></div>
        </div>
    </div>';  

echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Today\'s shifts</h2>';
                
                $sql="SELECT * FROM shift WHERE WorkDate = '$todaay' ";
                $query =mysqli_query($con,$sql); 
                while($row =mysqli_fetch_array($query)){
                    
                    $sql2="SELECT * FROM employee WHERE EmpID = ".$row['EmpID']." ";
                    $query2 =mysqli_query($con,$sql2); 
                    while($row2 =mysqli_fetch_array($query2)){
echo                     $row2['EmpName'] .' is on a '.$row2['EmployeeType'].' shift which started at '.$row['SartWork'].':00 and will end at '.$row['EndWork'].':00<br/>';
                    }
               
                }
echo        '</div>
        </div>
    </div>';   

?>