<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php';

echo'<div class="col-md-6">
        <div class="inputSpace">
        <div class="form-group" style="width: 200px; text-align: center; margin: 10px auto; margin-bottom: 10px;">
            <h2 class="h2">Add Employee</h2>
        </div>
        <form method="Post" action="#">

            <div class="Input-Group">
            <label id="IDText">ID Number</label>
            <input type="text" id="IDn" name="idn" placeholder="" onkeyup="valcardID()" onblur="valcardID2()" required=""/>
            </div>

            <div class="Input-Group">
            <label>Firstname</label>
            <input type=" text" name="firstname" placeholder="" required=""/>
            </div>

            <div class="Input-Group">
            <label>Lastname</label>
            <input type=" text"  name="lastname" placeholder="" required=""/>
            </div>
            
            <div class="Input-Group">
            <label>Title</label>
            <select name="title" class="drop" required=""/>
                <option value="Mr">Mr</option> 
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
            </select>
            </div>

            <div class="Input-Group">
            <label>Employee Type</label>
            <select name="employeeType" class="drop" required=""/>
            <option value="p1">P1</option> 
            <option value="call">Call</option>
            <option value="Engineer">Engineer</option>
            <option value="SDM">SDM</option>
            <option value="admin">Admin</option>
            </select>
            </div>

            <div class="Input-Group">
            <label>Qualification</label>
            <input type=" text" name="Qualification" placeholder="" required=""/>
            </div>

            <div class="Input-Group">
            <label>Experiance</label>
            <input type=" text" name="Experience" placeholder="" required=""/>
            </div>
            
            <div class="Input-Group">
                <label id="phoneText">Phone number</label>
            <input type="text" id="phone" onkeyup="valPhoneNumber()" name="phoneno" placeholder="" required=""/>
            </div>

            <div class="Input-Group">
            <label>Email</label>
            <input type="email" name="email" placeholder="" required=""/>
            </div>

            <div class="Input-Group">
            <label>User Namee</label>
            <input type="text" name="username" placeholder="" required=""/>
            </div>

            <div class="Input-Group">
            <label>Password</label>
            <input type="password" name="password" required=""/>
            </div>

            <div class="form-group" style="width: 70px; margin: 10px auto; margin-bottom: 20px;">
                <button type="submit" name="add" class="btn">Register</button>
            </div>
        </form>
        </div>
    </div>';
echo'<div class="col-md-6"></div>';
echo'<div class="col-md-12">.</div>';
if(isset($_POST['add'])){
        
        $idn=$_POST["idn"];
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $title=$_POST["title"];
        $employeeType=$_POST["employeeType"];
        $Experience=$_POST["Experience"];
        $Qualification = $_POST['Qualification'];
        $phoneno =$_POST["phoneno"];
        $email=$_POST["email"];
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $password = md5($password);
        
        $sql = "INSERT INTO employee
                VALUES('','$idn','$firstname','$lastname','$title','$employeeType','$Qualification','$Experience','active','$phoneno','$email','$username','$password')";
        if(!mysqli_query($con,$sql)){
            echo 'not inserted';
        }else{
            echo 'Emplyee has been added';
        }
    }
?>