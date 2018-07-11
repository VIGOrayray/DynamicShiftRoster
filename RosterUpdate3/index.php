<!DOCTYPE html>
    <html>
        <head>
        <html lang="en"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="mainStyle.css">
        
	<title>EliteShifter</title>
        <link rel ="shortcut icon" type="image/jpg" href= "pictures/icon.jpg"/>
	

        </head>
    <body>
		
                            
        <div class="LoginSpace">
           
            
              
             

		<h6 style="text-align: center; font-size: 70px; color: #FF7F50;">EliteShifter</h6>
                        <div class="Logospace">
                        <td valign= "middle" class ="loginPageLogo" style="text-align: center">
                        <img id="imgLogo" src = "pictures/icon.jpg" alt= "SystemLogo" align= "middle" style="border: 1px solid #878383;
                                border-radius: 10px; max-height: 90px; box-shadow: 0.1em 0.1em 0.2em #aeaeae;">
                         </td>
                         <td class ="loginPageBodyTitle">
                         <h6 style="text-align: center; font-size: 40px; color:#FF7F50;">Please enter details</h6>   
                        </td>
                        </div>

			
                <form class="form-horizontal" style="margin-left: 50px;" action="Scripts/login.php" method="POST">
			<div class="form-group input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-user"></span>
			</span>
				<input type="text" name="username" class="form-control" placeholder="Enter Username here..." style="width: 400px;" required>
			</div>

			<div class="form-group input-group">
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-lock"></span>
			</span>
				<input type="password" name="password" class="form-control" placeholder="Enter Password..." style="width: 400px;" required>
			</div>
                
                        <div class="form-group" style="width: 100px; margin: 0 auto; margin-bottom: 15px;">
			<button class="btn " style="width:100px;" name="submit">Login</button>
			</div>
                
		</form>
            </div>

          
	
          <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container" >
		<div class="navbar-text" style="width: 100%;">
		<p style="text-align: center;">&copy 2018 EliteShifter</p>
                </div>
	</div>
</div>


<script src="assets/js.bootstrap.min.js" type="text/javascript"></script>
</body>
</html>