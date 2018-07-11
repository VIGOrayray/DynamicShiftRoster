<?php 
    session_start();
    include '../Config.php';
    include '../panelUI.php'; 
    if(isset($_GET['view'])){
        $empID= $_GET['empID'];
echo'<div class="col-md-6">
        <div class="inputSpace">
        <div class="form-group" style="width: 200px; text-align: center; margin: 10px auto; margin-bottom: 10px;">
            <h2 class="h2">Employee</h2>
        </div>
        <form method="Post" action="#">
';
                        $sql="SELECT * FROM employee WHERE EmpID = $empID ";
                        $query =mysqli_query($con,$sql);
                        while($row =mysqli_fetch_array($query)){
echo                        '
                            <div class="Input-Group">
            <label id="IDText">ID Number</label>
            <input type="text" id="IDn" name="idn" value="'.$row['ID'].'" onkeyup="valcardID()" onblur="valcardID2()"/>
            </div>

            <div class="Input-Group">
            <label>Firstname</label>
            <input type=" text" name="firstname" value="'.$row['EmpName'].'" placeholder="" />
            </div>

            <div class="Input-Group">
            <label>Lastname</label>
            <input type=" text"  name="lastname" value="'.$row['EmpSurname'].'" placeholder="" />
            </div>
            
            <div class="Input-Group">
            <label>Title</label>
            <select name="title" class="drop" required=""/>
                <option value="'.$row['Title'].'">'.$row['Title'].'</option>
                <option value="Mr">Mr</option> 
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
            </select>
            </div>
            
            <div class="Input-Group">
            <label>Status</label>
            <select name="status" class="drop" required=""/>
                <option value="'.$row['Status'].'">'.$row['Status'].'</option>
                <option value="active">Active</option> 
                <option value="blocked">Blockd</option>
                
            </select>
            </div>
            
            <div class="Input-Group">
            <label>Employee Type</label>
            <select name="employeeType" class="drop" required=""/>
                <option value="'.$row['EmployeeType'].'">'.$row['EmployeeType'].'</option>
                <option value="p1">P1</option> 
                <option value="call">Call</option>
                <option value="Engineer">Engineer</option>
                <option value="SDM">SDM</option>
                <option value="admin">Admin</option>
            </select>
            </div>

            <div class="Input-Group">
            <label>Qualification</label>
            <input type=" text" name="Qualification" value="'.$row['Qualification'].'" placeholder=""/>
            </div>

            <div class="Input-Group">
            <label>Experiance</label>
            <input type=" text" name="Experience" value="'.$row['Experience'].'" placeholder="" />
            </div>
            
            <div class="Input-Group">
                <label id="phoneText">Phone number</label>
            <input type="text" id="phone" value="'.$row['MobileNumber'].'" onkeyup="valPhoneNumber()" name="phoneno" placeholder="" />
            </div>

            <div class="Input-Group">
            <label>Email</label>
            <input type="email" name="email" value="'.$row['EmailAddress'].'" placeholder="" />
            </div>

            <div class="Input-Group">
            <label>User Namee</label>
            <input type="text" name="username" value="'.$row['Username'].'" placeholder="" />
            </div>

            <div class="Input-Group">
            <label>Password</label>
            <input type="password" name="password" value="" />
            </div>

            <div class="form-group" style="width: 70px; margin: 10px auto; margin-bottom: 20px;">
                <button type="submit" name="update" class="btn">Update</button>
            </div>
        </form>
        </div>
    </div>'; 
                        }
echo                '
            ';        
    }
if(isset($_POST['update'])){
        
        $idn=$_POST["idn"];
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $title=$_POST["title"];
        $employeeType=$_POST["employeeType"];
        $Experience=$_POST["Experience"];
        $status = $_POST["status"];
        $Qualification = $_POST['Qualification'];
        $phoneno =$_POST["phoneno"];
        $email=$_POST["email"];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $status=$_POST['status']; 
        $password = md5($password);
        

//           $sql = "UPDATE employee SET ID ='$idn'WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
//           $sql = "UPDATE employee SET EmpName = '$firstname' WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
//           $sql = "UPDATE employee SET EmpSurname = '$lastname' WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
//           $sql = "UPDATE employee SET Title = '$title' WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
//           $sql = "UPDATE employee SET EmployeeType='$employeeType' WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
//           $sql = "UPDATE employee SET Qualification='$Qualification' WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
//           $sql = "UPDATE employee SET Experience='$Experience' WHERE EmpID = $empID)"; 
//           !mysqli_query($con,$sql);
           
           

           if($password ==""){
               $sql = "UPDATE employee SET ID ='$idn',EmpName = '$firstname',EmpSurname = '$lastname',Title = '$title',EmployeeType='$employeeType',Qualification='$Qualification',Experience='$Experience', status='$status',MobileNumber='$phoneno',EmailAddress='$email',Username='$username'  WHERE EmpID = $empID "; 
           }else{
               $sql = "UPDATE employee SET ID ='$idn',EmpName = '$firstname',EmpSurname = '$lastname',Title = '$title',EmployeeType='$employeeType',Qualification='$Qualification',Experience='$Experience', status='$status',MobileNumber='$phoneno',EmailAddress='$email',Username='$username', Password='$password'  WHERE EmpID = $empID "; 
           }
        if(!mysqli_query($con,$sql)){
            echo 'not inserted';
        }else{
            echo 'updated';
        }
    }
?>