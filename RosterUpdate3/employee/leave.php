<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Request Leave</h2>
                <form action="#" method="Post">
                    <h2 class="h2">From</h2>
                    <input style="background-color:#ccc;" type="date" min="'.DATE("Y-m-d").'" name="from" required/>
                    <h2 class="h2">To</h2>
                    <input style="background-color:#ccc;" type="date" min="'.DATE("Y-m-d").'" name="to" required/>
                    <h2 class="h2">Reason</h2>    
                    <textarea name="reason" style="width:75%; color:#000; height:200px; margin:0 auto;" required></textarea>
                    <div style="width:100%;"></div>
                    <input class="btn" type="submit" name="leave" value="Submit" />
                </form>';
echo        '</div>
        </div>
    </div>';  
if(isset($_POST['leave'])){
    $from = $_POST['from'];
    $to = $_POST['to'];
    $reason = $_POST['reason'];

    if($to<$from){
        $temp = $to;
        $to = $from;
        $from = $temp;
    }
    
    
//$date1=date_create($from);
//$date2=date_create($to);
//$diff=date_diff($from,$to);
//echo $diff->format("%R%a days");
//
//echo round($datediff / (60 * 60 * 24));
   $numberOfDays = 0;
  $dStart = new DateTime($from);
   $dEnd  = new DateTime($to);
   $dDiff = $dStart->diff($dEnd);
   //echo $dDiff->format('%R'); // use for point out relation: smaller/greater
   $numberOfDays = $dDiff->days;
   $numberOfDays++;
   
   $sent  = "";

   if($numberOfDays>3){
       
   }else{
        for($i=1;$i<=$numberOfDays;$i++){
            $day = $i.'days';
            $futureDate = date("Y-m-d",strtotime($from.$day));
            
            $shiftID=0;
            $sql="SELECT * FROM shift WHERE WorkDate = '$futureDate' ";
            $query =mysqli_query($con,$sql);
            while($row =mysqli_fetch_array($query)){
                $shiftID = $row['shiftID'];
            }
            $sql = "INSERT INTO leaveday VALUES('','$futureDate','$reason',0,'sent',".$_SESSION['EmpID'].", $shiftID)";
            mysqli_query($con,$sql);
            $sent = "true";
        }
   }
   
    if($sent == ""){
echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2" style="color:#A00;">Request wasn\'t sent</h2>
            </div>
        </div>
    </div>';
    }else{
echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; color:#fff; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2" style="color:#0A0;">Request was sent</h2>
            </div>
        </div>
    </div>';
    }
}
?>