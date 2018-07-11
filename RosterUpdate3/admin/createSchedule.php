<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">P1 Schedule</h2>
                <form id="forms" method="Post" action="#">';
                        $sql="SELECT EmpID FROM employee WHERE Status = 'active' AND EmployeeType = 'p1' ";
                        $query =mysqli_query($con,$sql);
                        $count=0;
                        while($row =mysqli_fetch_array($query)){
                            $count++;
                            if($_SESSION['noP1Week'] >= $count){
echo                        '<select style="width:150px;" name="startTime'.$count.'" required>
                                <option value="">Start Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>
                            <select style="width:150px;" name="endTime'.$count.'" required>
                                <option value="">End Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>';                                
                            }
                         
                        }
echo            '
            </div>
        </div>
    </div>';    

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Call Schedule</h2>
                ';
                        $sql="SELECT EmpID FROM employee WHERE Status = 'active' AND EmployeeType = 'call' ";
                        $query =mysqli_query($con,$sql);
                        $count=0;
                        while($row =mysqli_fetch_array($query)){
                            $count++;
                            if($_SESSION['noCallWeek'] >= $count){
echo                        '<select style="width:150px;" name="callStartTime'.$count.'" required>
                                <option value="">Start Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>
                            <select style="width:150px;" name="callEndTime'.$count.'" required>
                                <option value="">End Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>';                                               
                            }
          
                        }
echo        '</div>
        </div>
    </div>';

echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Saturday Schedule</h2>
                ';
                        $sql="SELECT EmpID FROM employee WHERE Status = 'active' ";
                        $query =mysqli_query($con,$sql);
                        $count=0;
                        while($row =mysqli_fetch_array($query)){
                            $count++;
                            if($_SESSION['noSaturday'] >= $count){
echo                        '<select style="width:100px;" name="saturdayStartTime'.$count.'" >
                                <option value="">Start Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>
                            <select style="width:100px;" name="saturdayEndTime'.$count.'" >
                                <option value="">End Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>
                            <select style="width:75px;" name="saturdayType'.$count.'" >
                                <option value="">Type</option>
                                <option value="call">P1</option>
                                <option value="Both">Both</option>
                            </select>';                                 
                            }
                        
                        }
echo        '</div>
        </div>
    </div>';


echo'<div class="col-md-4">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2">Sunday Schedule</h2>
                ';
                        $sql="SELECT EmpID FROM employee WHERE Status = 'active' ";
                        $query =mysqli_query($con,$sql);
                        $count=0;
                        while($row =mysqli_fetch_array($query)){
                            $count++;
                            if($_SESSION['noSunday'] >= $count){
echo                        '<select style="width:100px;" name="sundayStartTime'.$count.'" >
                                <option value="">Start Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>
                            <select style="width:100px;" name="sundayEndTime'.$count.'" >
                                <option value="">End Time</option>
                                <option value="0">0:00</option>
                                <option value="0.15">0:15</option>
                                <option value="0.30">0:30</option>
                                <option value="0.45">0:45</option>
                                <option value="1.00">1:00</option>
                                <option value="1.15">1:15</option>
                                <option value="1.30">1:30</option>
                                <option value="1.45">1:45</option>
                                <option value="2.00">2:00</option>
                                <option value="2.15">2:15</option>
                                <option value="2.30">2:30</option>
                                <option value="2.45">2:45</option>
                                <option value="3.00">3:00</option>
                                <option value="3.15">3:15</option>
                                <option value="3.30">3:30</option>
                                <option value="3.45">3:45</option>
                                <option value="4.00">4:00</option>
                                <option value="4.15">4:15</option>
                                <option value="4.30">4:30</option>
                                <option value="4.45">4:45</option>
                                <option value="5.00">5:00</option>
                                <option value="5.15">5:15</option>
                                <option value="5.30">5:30</option>
                                <option value="5.45">5:45</option>
                                <option value="6.00">6:00</option>
                                <option value="6.15">6:15</option>
                                <option value="6.30">6:30</option>
                                <option value="6.45">6:45</option>
                                <option value="7.00">7:00</option>
                                <option value="7.15">7:15</option>
                                <option value="7.30">7:30</option>
                                <option value="7.45">7:45</option>
                                <option value="8.00">8:00</option>
                                <option value="8.15">8:15</option>
                                <option value="8.30">8:30</option>
                                <option value="8.45">8:45</option>
                                <option value="9.00">9:00</option>
                                <option value="9.15">9:15</option>
                                <option value="9.30">9:30</option>
                                <option value="9.45">9:45</option>
                                <option value="10.00">10:00</option>
                                <option value="10.15">10:15</option>
                                <option value="10.30">10:30</option>
                                <option value="10.45">10:45</option>
                                <option value="11.00">11:00</option>
                                <option value="11.15">11:15</option>
                                <option value="11.30">11:30</option>
                                <option value="11.45">11:45</option>
                                <option value="12.00">12:00</option>
                                <option value="12.15">12:15</option>
                                <option value="12.30">12:30</option>
                                <option value="12.45">12:45</option>
                                <option value="13.00">13:00</option>
                                <option value="13.15">13:15</option>
                                <option value="13.30">13:30</option>
                                <option value="13.45">13:45</option>
                                <option value="14.00">14:00</option>
                                <option value="14.15">14:15</option>
                                <option value="14.30">14:30</option>
                                <option value="14.45">14:45</option>
                                <option value="15.00">15:00</option>
                                <option value="15.15">15:15</option>
                                <option value="15.30">15:30</option>
                                <option value="15.45">15:45</option>
                                <option value="16.00">16:00</option>
                                <option value="16.15">16:15</option>
                                <option value="16.30">16:30</option>
                                <option value="16.45">16:45</option>
                                <option value="17.00">17:00</option>
                                <option value="17.15">17:15</option>
                                <option value="17.30">17:30</option>
                                <option value="17.45">17:45</option>
                                <option value="18.00">18:00</option>
                                <option value="18.15">18:15</option>
                                <option value="18.30">18:30</option>
                                <option value="18.45">18:45</option>
                                <option value="19.00">19:00</option>
                                <option value="19.15">19:15</option>
                                <option value="19.30">19:30</option>
                                <option value="19.45">19:45</option>
                                <option value="20.00">20:00</option>
                                <option value="20.15">20:15</option>
                                <option value="20.30">20:30</option>
                                <option value="20.45">20:45</option>
                                <option value="21.00">21:00</option>
                                <option value="21.15">21:15</option>
                                <option value="21.30">21:30</option>
                                <option value="21.45">21:45</option>
                                <option value="22.00">22:00</option>
                                <option value="22.15">22:15</option>
                                <option value="22.30">22:30</option>
                                <option value="22.45">22:45</option>
                                <option value="23.00">23:00</option>
                                <option value="23.15">23:15</option>
                                <option value="23.30">23:30</option>
                                <option value="23.45">23:45</option>
                                <option value="24.00">24:00</option>
                            </select>
                            <select style="width:75px;" name="sunday Type'.$count.'" >
                                <option value="">Type</option>
                                <option value="call">P1</option>
                                <option value="Both">Both</option>
                            </select>';                                
                            }
                         
                        }
echo        '</div>
        </div>
    </div>';
?>
<div class="col-md-12">.</div>
<div class="col-md-12">
    <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <div class="form-group" style="width: 70px; margin: 10px auto; margin-bottom: 20px;">
                    <button type="submit" name="create" class="btn">create</button>
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
    
    $sql = " UPDATE schedule SET status = '' ";
    mysqli_query($con,$sql);
    
    $today= Date('Y-m-d');
    $sql = " INSERT INTO schedule VALUES('','$today','active',".$_SESSION['EmpID'].") ";
    mysqli_query($con,$sql);
    
    $startTime1 = "-";
    if(isset($_POST['startTime1'])){
        $startTime1 = $_POST['startTime1'];
    }
    $startTime2 = "-";
    if(isset($_POST['startTime2'])){
        $startTime2 = $_POST['startTime2'];
    }
    $startTime3 = "-";
    if(isset($_POST['startTime3'])){
        $startTime3 = $_POST['startTime3'];
    }
    $startTime4 = "-";
    if(isset($_POST['startTime4'])){
        $startTime4 = $_POST['startTime4'];
    }$startTime5 = "-";
    if(isset($_POST['startTime5'])){
        $startTime5 = $_POST['startTime5'];
    }
    $startTime6 = "-";
    if(isset($_POST['startTime6'])){
        $startTime6 = $_POST['startTime6'];
    }
    $startTime7 = "-";
    if(isset($_POST['startTime7'])){
        $startTime7 = $_POST['startTime7'];
    }
    $startTime8 = "-";
    if(isset($_POST['startTime8'])){
        $startTime8 = $_POST['startTime8'];
    }
    $startTime9 = "-";
    if(isset($_POST['startTime9'])){
        $startTime9 = $_POST['startTime9'];
    }
    $startTime10 = "-";
    if(isset($_POST['startTime10'])){
        $startTime10 = $_POST['startTime10'];
    }
    
    $endTime1="-";
    if(isset($_POST['endTime1'])){
        $endTime1 = $_POST['endTime1'];
    }
    $endTime2="-";
    if(isset($_POST['endTime2'])){
        $endTime2 = $_POST['endTime2'];
    }
    $endTime3="-";
    if(isset($_POST['endTime3'])){
        $endTime3 = $_POST['endTime3'];
    }
    $endTime4="-";
    if(isset($_POST['endTime4'])){
        $endTime4 = $_POST['endTime4'];
    }
    $endTime5="-";
    if(isset($_POST['endTime5'])){
        $endTime5 = $_POST['endTime5'];
    }
    $endTime6="-";
    if(isset($_POST['endTime6'])){
        $endTime6 = $_POST['endTime6'];
    }
    $endTime7="-";
    if(isset($_POST['endTime7'])){
        $endTime7 = $_POST['endTime7'];
    }
    $endTime8="-";
    if(isset($_POST['endTime8'])){
        $endTime8 = $_POST['endTime8'];
    }
    $endTime9="-";
    if(isset($_POST['endTime9'])){
        $endTime9 = $_POST['endTime9'];
    }
    $endTime10="-";
    if(isset($_POST['endTime10'])){
        $endTime10 = $_POST['endTime10'];
    }
    
    
    $callStartTime1="-"; if(isset($_POST['callStartTime1'])){  $callStartTime1 = $_POST['callStartTime1']; }
    $callStartTime2="-"; if(isset($_POST['callStartTime2'])){  $callStartTime2 = $_POST['callStartTime2']; }
    $callStartTime3="-"; if(isset($_POST['callStartTime3'])){  $callStartTime3 = $_POST['callStartTime3']; }
    $callStartTime4="-"; if(isset($_POST['callStartTime4'])){  $callStartTime4 = $_POST['callStartTime4']; }
    $callStartTime5="-"; if(isset($_POST['callStartTime5'])){  $callStartTime5 = $_POST['callStartTime5']; }
    $callStartTime6="-"; if(isset($_POST['callStartTime6'])){  $callStartTime6 = $_POST['callStartTime6']; }
    
    
    $callEndTime1="-"; if(isset($_POST['callEndTime1'])){  $callEndTime1 = $_POST['callEndTime1']; }
    $callEndTime2="-"; if(isset($_POST['callEndTime2'])){  $callEndTime2 = $_POST['callEndTime2']; }
    $callEndTime3="-"; if(isset($_POST['callEndTime3'])){  $callEndTime3 = $_POST['callEndTime3']; }
    $callEndTime4="-"; if(isset($_POST['callEndTime4'])){  $callEndTime4 = $_POST['callEndTime4']; }
    $callEndTime5="-"; if(isset($_POST['callEndTime5'])){  $callEndTime5 = $_POST['callEndTime5']; }
    $callEndTime6="-"; if(isset($_POST['callEndTime6'])){  $callEndTime6 = $_POST['callEndTime6']; }
    
    
    $sundayStartTime1="-"; if(isset($_POST['sundayStartTime1'])){  $sundayStartTime1 = $_POST['sundayStartTime1']; }
    $sundayStartTime2="-"; if(isset($_POST['sundayStartTime2'])){  $sundayStartTime2 = $_POST['sundayStartTime2']; }
    $sundayStartTime3="-"; if(isset($_POST['sundayStartTime3'])){  $sundayStartTime3 = $_POST['sundayStartTime3']; }
    $sundayStartTime4="-"; if(isset($_POST['sundayStartTime4'])){  $sundayStartTime4 = $_POST['sundayStartTime4']; }
    $sundayStartTime5="-"; if(isset($_POST['sundayStartTime5'])){  $sundayStartTime5 = $_POST['sundayStartTime5']; }
    $sundayStartTime6="-"; if(isset($_POST['sundayStartTime6'])){  $sundayStartTime6 = $_POST['sundayStartTime6']; }
    $sundayStartTime7="-"; if(isset($_POST['sundayStartTime7'])){  $sundayStartTime7 = $_POST['sundayStartTime7']; }
    $sundayStartTime8="-"; if(isset($_POST['sundayStartTime8'])){  $sundayStartTime8 = $_POST['sundayStartTime8']; }
    
    $sundayEndTime1="-"; if(isset($_POST['sundayEndTime1'])){  $sundayEndTime1 = $_POST['sundayEndTime1']; }
    $sundayEndTime2="-"; if(isset($_POST['sundayEndTime2'])){  $sundayEndTime2 = $_POST['sundayEndTime2']; }
    $sundayEndTime3="-"; if(isset($_POST['sundayEndTime3'])){  $sundayEndTime3 = $_POST['sundayEndTime3']; }
    $sundayEndTime4="-"; if(isset($_POST['sundayEndTime4'])){  $sundayEndTime4 = $_POST['sundayEndTime4']; }
    $sundayEndTime5="-"; if(isset($_POST['sundayEndTime5'])){  $sundayEndTime5 = $_POST['sundayEndTime5']; }
    $sundayEndTime6="-"; if(isset($_POST['sundayEndTime6'])){  $sundayEndTime6 = $_POST['sundayEndTime6']; }
    $sundayEndTime7="-"; if(isset($_POST['sundayEndTime7'])){  $sundayEndTime7 = $_POST['sundayEndTime7']; }
    $sundayEndTime8="-"; if(isset($_POST['sundayEndTime8'])){  $sundayEndTime8 = $_POST['sundayEndTime8']; }
    
    $saturdayStartTime1="-"; if(isset($_POST['saturdayStartTime1'])){  $saturdayStartTime1 = $_POST['saturdayStartTime1']; }
    $saturdayStartTime2="-"; if(isset($_POST['saturdayStartTime2'])){  $saturdayStartTime2 = $_POST['saturdayStartTime2']; }
    $saturdayStartTime3="-"; if(isset($_POST['saturdayStartTime3'])){  $saturdayStartTime3 = $_POST['saturdayStartTime3']; }
    $saturdayStartTime4="-"; if(isset($_POST['saturdayStartTime4'])){  $saturdayStartTime4 = $_POST['saturdayStartTime4']; }
    $saturdayStartTime5="-"; if(isset($_POST['saturdayStartTime5'])){  $saturdayStartTime5 = $_POST['saturdayStartTime5']; }
    $saturdayStartTime6="-"; if(isset($_POST['saturdayStartTime6'])){  $saturdayStartTime6 = $_POST['saturdayStartTime6']; }
    $saturdayStartTime7="-"; if(isset($_POST['saturdayStartTime7'])){  $saturdayStartTime7 = $_POST['saturdayStartTime7']; }
    $saturdayStartTime8="-"; if(isset($_POST['saturdayStartTime8'])){  $saturdayStartTime8 = $_POST['saturdayStartTime8']; }
    
    $saturdayEndTime1="-"; if(isset($_POST['saturdayEndTime1'])){  $saturdayEndTime1 = $_POST['saturdayEndTime1']; }
    $saturdayEndTime2="-"; if(isset($_POST['saturdayEndTime2'])){  $saturdayEndTime2 = $_POST['saturdayEndTime2']; }
    $saturdayEndTime3="-"; if(isset($_POST['saturdayEndTime3'])){  $saturdayEndTime3 = $_POST['saturdayEndTime3']; }
    $saturdayEndTime4="-"; if(isset($_POST['saturdayEndTime4'])){  $saturdayEndTime4 = $_POST['saturdayEndTime4']; }
    $saturdayEndTime5="-"; if(isset($_POST['saturdayEndTime5'])){  $saturdayEndTime5 = $_POST['saturdayEndTime5']; }
    $saturdayEndTime6="-"; if(isset($_POST['saturdayEndTime6'])){  $saturdayEndTime6 = $_POST['saturdayEndTime6']; }
    $saturdayEndTime7="-"; if(isset($_POST['saturdayEndTime7'])){  $saturdayEndTime7 = $_POST['saturdayEndTime7']; }
    $saturdayEndTime8="-"; if(isset($_POST['saturdayEndTime8'])){  $saturdayEndTime8 = $_POST['saturdayEndTime8']; }
    
    $saturdayType1="-"; if(isset($_POST['saturdayType1'])){  $saturdayType1 = $_POST['saturdayType1']; }
    $saturdayType2="-"; if(isset($_POST['saturdayType2'])){  $saturdayType2 = $_POST['saturdayType2']; }
    $saturdayType3="-"; if(isset($_POST['saturdayType3'])){  $saturdayType3 = $_POST['saturdayType3']; }
    $saturdayType4="-"; if(isset($_POST['saturdayType4'])){  $saturdayType4 = $_POST['saturdayType4']; }
    $saturdayType5="-"; if(isset($_POST['saturdayType5'])){  $saturdayType5 = $_POST['saturdayType5']; }
    $saturdayType6="-"; if(isset($_POST['saturdayType6'])){  $saturdayType6 = $_POST['saturdayType6']; }
    $saturdayType7="-"; if(isset($_POST['saturdayType7'])){  $saturdayType7 = $_POST['saturdayType7']; }
    $saturdayType8="-"; if(isset($_POST['saturdayType8'])){  $saturdayType8 = $_POST['saturdayType8']; }
    
    $sundayType1="-"; if(isset($_POST['sundayType1'])){  $sundayType1 = $_POST['sundayType1']; }
    $sundayType2="-"; if(isset($_POST['sundayType2'])){  $sundayType2 = $_POST['sundayType2']; }
    $sundayType3="-"; if(isset($_POST['sundayType3'])){  $sundayType3 = $_POST['sundayType3']; }
    $sundayType4="-"; if(isset($_POST['sundayType4'])){  $sundayType4 = $_POST['sundayType4']; }
    $sundayType5="-"; if(isset($_POST['sundayType5'])){  $sundayType5 = $_POST['sundayType5']; }
    $sundayType6="-"; if(isset($_POST['sundayType6'])){  $sundayType6 = $_POST['sundayType6']; }
    $sundayType7="-"; if(isset($_POST['sundayType7'])){  $sundayType7 = $_POST['sundayType7']; }
    $sundayType8="-"; if(isset($_POST['sundayType8'])){  $sundayType8 = $_POST['sundayType8']; }
    
    $newScheduleID=0;
    $sql="SELECT * FROM schedule WHERE status = 'active' ";
    $query =mysqli_query($con,$sql);
    while($row =mysqli_fetch_array($query)){
        $newScheduleID = $row['ScheduleID'];
    }
    
    if($startTime1!="-" && $endTime1!="-"){  $sql = " INSERT INTO shiftarrangement VALUES('',$startTime1,$endTime1,'p1','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($startTime2!="-" && $endTime2!="-"){  $sql = " INSERT INTO shiftarrangement VALUES('',$startTime2,$endTime2,'p1','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($startTime3!="-" && $endTime3!="-"){  $sql = " INSERT INTO shiftarrangement VALUES('',$startTime3,$endTime3,'p1','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($startTime4!="-" && $endTime4!="-"){  $sql = " INSERT INTO shiftarrangement VALUES('',$startTime4,$endTime4,'p1','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($startTime5!="-" && $endTime5!="-"){  $sql = " INSERT INTO shiftarrangement VALUES('',$startTime5,$endTime5,'p1','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($startTime6!="-" && $endTime6!="-"){  $sql = " INSERT INTO shiftarrangement VALUES('',$startTime6,$endTime6,'p1','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    
    if($callStartTime1!="-" && $callEndTime1!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$callStartTime1,$callEndTime1,'call','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($callStartTime2!="-" && $callEndTime2!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$callStartTime2,$callEndTime2,'call','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($callStartTime3!="-" && $callEndTime3!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$callStartTime3,$callEndTime3,'call','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($callStartTime4!="-" && $callEndTime4!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$callStartTime4,$callEndTime4,'call','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($callStartTime5!="-" && $callEndTime5!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$callStartTime5,$callEndTime5,'call','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($callStartTime6!="-" && $callEndTime6!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$callStartTime6,$callEndTime6,'call','weekday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    
    if($saturdayStartTime1!="-" && $saturdayEndTime1!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime1,$saturdayEndTime1,'$saturdayType1','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime2!="-" && $saturdayEndTime2!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime2,$saturdayEndTime2,'$saturdayType2','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime3!="-" && $saturdayEndTime3!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime3,$saturdayEndTime3,'$saturdayType3','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime4!="-" && $saturdayEndTime4!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime4,$saturdayEndTime4,'$saturdayType4','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime5!="-" && $saturdayEndTime5!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime5,$saturdayEndTime5,'$saturdayType5','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime6!="-" && $saturdayEndTime6!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime6,$saturdayEndTime6,'$saturdayType6','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime7!="-" && $saturdayEndTime7!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime7,$saturdayEndTime6,'$saturdayType7','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($saturdayStartTime8!="-" && $saturdayEndTime8!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$saturdayStartTime8,$saturdayEndTime7,'$saturdayType8','saturday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    
    if($sundayStartTime1!="-" && $sundayEndTime1!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime1,$sundayEndTime1,'$sundayType1','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime2!="-" && $sundayEndTime2!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime2,$sundayEndTime2,'$sundayType2','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime3!="-" && $sundayEndTime3!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime3,$sundayEndTime3,'$sundayType3','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime4!="-" && $sundayEndTime4!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime4,$sundayEndTime4,'$sundayType4','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime5!="-" && $sundayEndTime5!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime5,$sundayEndTime5,'$sundayType5','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime6!="-" && $sundayEndTime6!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime6,$sundayEndTime6,'$sundayType6','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime7!="-" && $sundayEndTime7!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime7,$sundayEndTime6,'$sundayType7','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    if($sundayStartTime8!="-" && $sundayEndTime8!="-"){ $sql = " INSERT INTO shiftarrangement VALUES('',$sundayStartTime8,$sundayEndTime7,'$sundayType8','sunday',$newScheduleID) ";        mysqli_query($con,$sql);    }
    
echo'<div class="col-md-12">.</div>';
echo'<div class="col-md-12">
        <div class="inputSpace">
            <div class="form-group" style="width: 100%; text-align: center; margin: 10px auto; margin-bottom: 10px;">
                <h2 class="h2" style="color:#0A0;">Schedule Created</h2>
            </div>    
        </div>
    </div>';
echo'<div class="col-md-12">.</div>';    
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
                        $sql="SELECT * FROM schedule WHERE ScheduleID ='".$newScheduleID."' ";
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
                        $sql="SELECT * FROM shiftarrangement WHERE ScheduleID  = $scheduleID AND dayType='saturday' ";
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