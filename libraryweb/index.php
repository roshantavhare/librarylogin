<?php

session_start();
if (isset($_SESSION['auth']) && $_SESSION['auth']==true) {
   header("location: home.php");

 
} 

?>





<!DOCTYPE html>
<html>
<head>
<title>Welcome to Library</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="css/style.css" rel='stylesheet' type='text/css'  /><!--stylesheet-->

<script type="text/javascript">
	
	

	var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
  	document.getElementById('signupclick').disabled=false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '**matching';
  } else {
  	document.getElementById('signupclick').disabled=true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = '**not matching';
  }
}


var department_check = function() {
  if (document.getElementById('department').value == 'none'){
  	document.getElementById('signupclick').disabled=true;
    document.getElementById('department_msg').style.color = 'red';
    document.getElementById('department_msg').innerHTML = '**please select';
  } else {
  	  document.getElementById('department_msg').innerHTML = '';
  	document.getElementById('signupclick').disabled=false;
  }
}

var type_check = function() {
  if (document.getElementById('type').value == 'none'){
  	document.getElementById('signupclick').disabled=true;
    document.getElementById('type_msg').style.color = 'red';
    document.getElementById('type_msg').innerHTML = '**please select';
  } else {
  	  document.getElementById('type_msg').innerHTML = '';
  	document.getElementById('signupclick').disabled=false;
  }
}


/* var duplicate_check_uin = function() {
	<?php  
	  $conn = mysqli_connect('localhost','root','','library_db');
 	$duplicate_uin=mysqli_query($conn,"select * from users where uin='$uin'");

    if (mysqli_num_rows($duplicate_uin)>0) { 	?>
    document.getElementById('uin_exist').innerHTML = 'UIN already exists'; 
    document.getElementById('signupclick').disabled=true;

	<?php }
	else{ 	?>

		document.getElementById('signupclick').disabled=false;

	<?php	} ?>
	
	
         
}

var duplicate_check_user = function() {
	<?php  
	  $conn = mysqli_connect('localhost','root','','library_db');
 	$duplicate_user=mysqli_query($conn,"select * from users where username='$usernm'");

    if (mysqli_num_rows($duplicate_user)>0) {		?> 	
    echo "string";
    document.getElementById('user_exist').innerHTML = 'Username already taken'; 
    document.getElementById('signupclick').disabled=true;

	<?php }
	else{ 	?>

		document.getElementById('signupclick').disabled=false;

	<?php	} ?>
         
} 
*/


</script>



</head>
<body onload="load_msg();">
<h1 style="    font-family: 'Poiret One', cursive;
    font-weight: 600;">Welcome to Rizvi Library</h1>
<div class="form-w3ls">
	<div class="form-head-w3l">
		<h2>RIZVI</h2>
	</div>
    <ul class="tab-group cl-effect-4" style=" font-weight: 600;">
        <li class="tab active"><a href="#signin-agile">Sign In</a></li>
		<li class="tab"><a href="#signup-agile">Sign Up</a></li>        
    </ul>
    <div class="tab-content">

    	<?php if(!empty($_SESSION['error']))  {  ?>
                <div style="background-color: #c51162; color: #ffffff; font-family: 'Sansita', sans-serif;  padding: 10px">
                  
                    <?php   echo $_SESSION['error']; 
                    session_destroy(); ?>
                </div>
                <?php } ?>

        <div id="signin-agile">   
			<form action="process.php" method="POST">
				
				<p class="header">Username</p>
				<input type="text" name="username" placeholder="User Name"  required="required">
				
				<p class="header">Password</p>
				<input type="password" name="password" placeholder="Password"  required="required">
				
				<input type="checkbox" id="brand" value="">
				<label for="brand"><span></span> Remember me?</label>
				
				<input type="submit" class="sign-in" value="Sign In">
			</form>
		</div>
		<div id="signup-agile" >   
			<form action="register.php" method="POST">
				
				<p class="header">Enter Name<span style="color: red">*</span></p>
				<input type="text" name="name" placeholder="Enter Your Full Name"  required="required" onblur="department_check(); type_check();" >

				<p class="header">Department <span id='department_msg'></span></p>
				<select name="department" required="required" id="department" onblur="department_check();" onchange="department_check(); ">
				<option value="none" selected="selected">---Select---</option>
				<option value="computer">Computer Engineering</option>
				<option value="mechanical">Mechanical Engineering</option>
				<option value="civil">Civil Engineering</option>
				<option value="electronics">Electronics Engineering</option>
				<option value="extc">EXTC Engineering</option>
				</select>

				<p class="header">UIN<span id="uin_exist" style="color: red">*</span></p>
				<input type="text" name="uin" placeholder="Enter Your UIN"  required="required" onblur="department_check(); type_check();" onkeyup="duplicate_check_uin();" >

				<p class="header">Type <span id='type_msg'></span></p>
				<select name="type" required="required" id="type" onblur="type_check();" onchange="type_check();">
					<option value="none" selected="selected">---Select---</option>
					<option value="student">Student</option>
					<option value="faculty">Faculty</option>
					<option value="admin">Admin</option>
				
				</select>
				
				<p class="header">Email Address<span style="color: red">*</span></p>
				<input type="email" name="email" placeholder="Enter Your Email Id" ;}" required="required">

				<p class="header">Create Username<span id="user_exist" style="color: red">*</span></p>
				<input type="text" name="username" placeholder="eg. rover26"  required="required"  onkeyup="duplicate_check_user();"> 

				<p class="header">Create Password<span style="color: red">*</span></p>
				<input type="password" name="password" id="password" placeholder="Enter Password" pattern="(?=.*\d).{5,}" title="Must contain at least one number and minimum length of password is 5" required="required" onkeyup='check();'>
				
				<p class="header">Confirm Password <span id='message'></span></p>
				<input type="password" name="cpassword" id="confirm_password" placeholder="Confirm Password" ;}" required="required" onkeyup='check();'>
				
				<input type="submit" class="register" value="Sign up" id="signupclick" >
			</form>
		</div> 
    </div><!-- tab-content -->
</div> <!-- /form -->	  
<p class="copyright">&copy; 2018 All Rights Reserved | Designed by <a href="">Roshan</a></p>
<!-- js files -->
<script src='js/jquery.min.js'></script>
<script src="js/index.js"></script> 
<!-- /js files -->
</body>
</html>
