<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">P1 Schedule</h2>
                <form id="forms" method="Post" action="#">
                <div class="Input-Group">
                    <input type="number"  name="p1Week" placeholder="Number of P1 Employees" required=""/>
                </div>
            </div>
        </div>
    </div>';    

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Call Schedule</h2>
                <div class="Input-Group">
                    <input type="number"  name="callWeek" placeholder="Number of Call Managers" required=""/>
                </div>
            </div>
        </div>
    </div>';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Saturday Schedule</h2>
                <div class="Input-Group">
                    <input type="number"  name="Saturday" placeholder="Number of Employees" required=""/>
                </div>
            </div>
        </div>
    </div>';


echo'<div class="col-md-12">.</div><div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Sunday Schedule</h2>
                <div class="Input-Group">
                    <input type="number"  name="Sunday" placeholder="Number of Employees" required=""/>
                </div>
            </div>
        </div>
    </div>';
?>
<div class="col-md-12">.</div>
<div class="col-md-12">
    <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <div class="form-group" style="width: 70px; margin: 10px auto; margin-bottom: 20px;">
                    <button type="submit" name="create" class="btn">Next</button>
                </div>
            </div>
            </form>
        </div>
</div>
<script>
    document.getElementById("ScheduleID").onchange = function() { 
        document.getElementById("forms").submit();
    };
</script>

<?php


if(isset($_POST['create'])){
    
    if(!isset($_SESSION['noP1Week'])){$_SESSION['noP1Week']=0;}
    if(!isset($_SESSION['noCallWeek'])){$_SESSION['noCallWeek']=0;}
    if(!isset($_SESSION['noSaturday'])){$_SESSION['noSaturday']=0;}
    if(!isset($_SESSION['noSunday'])){$_SESSION['noSunday']=0;}
    
    $_SESSION['noP1Week'] = $_POST['p1Week'];
    $_SESSION['noCallWeek'] = $_POST['callWeek'];
    $_SESSION['noSaturday'] = $_POST['Saturday'];
    $_SESSION['noSunday'] = $_POST['Sunday'];

    echo'<script>window.location.assign("createSchedule.php");</script>';
    
}

?>