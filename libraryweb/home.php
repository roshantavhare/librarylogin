
<html>
<head>
	<title>
		home_page
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="css/style.css" rel='stylesheet' type='text/css'  /><!--stylesheet-->

<style type="text/css">
	.fill input{
	color: #f2f2f2;  display: block;
    width: 80%;
    height: 34px;
    padding: 14px;
    font-size: 14px;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1.5px solid #99d066;
    border-radius: 4px;
	}
	.fill label{
	display: inline-block;
    margin: 5px;
    margin-top: 10px;
    font-weight: 700;
    color: rebeccapurple;
	}
	.formdiv{
		padding: 50px;
		background-color: #eeeeee;
		background-repeat: no-repeat;
		

	}
</style>
</head>




<body style="background-image: url(images/hmbg.jpg);">

<div align="center" style="width: 100%; color: white; font-size: 20px; background-image: url(images/bg.jpg);">

<div><h1 style="font-weight: 900">RIZVI Library Management System</h1></div>
	<div style=" font-size: 25px; margin-top: -30px; float: right; background-color:#eeeeee; padding: 5px; color: #29434e;">
	 <?php    
	 			include('process.php');
	 			echo "WELCOME- ";
	 			echo $_SESSION['username'];
     ?>

  
     	<form action="logout.php">
		<input type="submit"  value="logout" style="background: #c30000; color: white;    font-size: 20px;padding: 8px;">
		</form>
	</div>
</div>

<!--Once the form is submitted, all the form data is forwarded to InsertBooks.php -->
<div align="center" style="margin-left:30%;margin-top: 10%; margin-right: 30%;" class="formdiv"> 

<form action="InsertBooks.php" method="post"  style="" class="fill" style="opacity: 2;">
 
<label>Enter ISBN :</label>
 <input type="text" name="isbn" size="48" placeholder="unique serial number" > <br>


 <label>Enter Title :</label>
 <input type="text" name="title" size="48" placeholder="Enter title here"> <br>


 <label>Enter Author :</label>
 <input type="text" name="author" size="48" placeholder="Enter main author"> <br>


 <label>Enter Edition :</label>
 <input type="text" name="edition" size="48" placeholder="Enter edition number"> <br>


 <label>Enter Publication:</label>
 <input type="text" name="publication" size="48" placeholder="Enter publication">
<br>

<input type="submit" value="Submit" style="width: 30%; background:#387002; color: white;     font-size: 20px; padding: 0px;">
<br>
<input type="reset" value="Reset" style="width: 30%; background: #5f4339; color: white; font-size: 20px; padding: 0px; ">

</form>
</div>



	


	
</body>
	


</html>