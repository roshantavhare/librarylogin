<?php
session_start();

    
if (isset($_POST['username']) && isset($_POST['password']))
{

    $conn = mysqli_connect('localhost','root','');
    mysqli_select_db($conn,'library_db');
    $usernm = $_POST['username'];
	$pass =$_POST['password'];

    $sql = "SELECT password FROM users where username = '$usernm'";
    $query = mysqli_query($conn,$sql);
    //echo "password $sql<br>";
    //echo "$pass";

    $row = mysqli_fetch_array($query);
    $passwd = $row[password];

    //echo "$passwd";
   
   if("$pass" == "$passwd"){
    $_SESSION['auth']=true;
	$_SESSION['username']=$usernm;
	$_SESSION['error']="";


	header("location:home.php"); 
    	
        
    }
    else
    {
    $_SESSION['error']="Please enter correct username and password";	
    unset($_SESSION['auth']);
    header("location: index.php");

    }	

}

?>

