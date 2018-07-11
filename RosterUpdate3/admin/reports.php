<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Leave Report</h2>
                <form id="forms" method="Post" action="#">
                    <a href="leaveReport.php"><div class="btn">View</div></a>   
                </form>
            </div>
        </div>
    </div>';

echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Worked Hours Report</h2>
                <form id="forms" method="Post" action="#">
                    <a href="hoursReport.php"><div class="btn">View</div></a>   
                </form>
            </div>
        </div>
    </div>';
echo'<div class="col-md-12">.</div>';
echo'<div class="col-md-6">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Over Time Report</h2>
                <form id="forms" method="Post" action="#">
                    <a href="overtimeReport.php"><div class="btn">View</div></a>   
                </form>
            </div>
        </div>
    </div>';
 
?>
