<?php 

$conn = mysqli_connect('localhost','root','','library_db');
   // mysqli_select_db($conn,'roshan_db');

    $email=$_POST['email'];
    $uin=$_POST['uin'];
    $type=$_POST['type'];
    $name=$_POST['name'];
    $department=$_POST['department'];
    $usernm = $_POST['username'];
    $pass =$_POST['password'];
   
    $duplicate=mysqli_query($conn,"select * from users where username='$usernm' or uin='$uin'");


    if (mysqli_num_rows($duplicate)>0) {

      while($row = mysqli_fetch_array($duplicate)) {

        if ($row['username'] == $usernm) {
          $message="Username already exists.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }

        if ($row['uin'] == $uin) {
          $message="UIN already exists.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }

      }

     // $message="Username or uin already exists.";
      echo "<script type='text/javascript'> window.location.href='index.php';</script>";

        
    }
    else
    { 
      $sql = "INSERT INTO users (name, uin,  type, email, username, password,department) VALUES('$name', '$uin', '$type' , '$email', '$usernm', '$pass', '$department')";
      //echo "$sql";
      mysqli_query($conn,$sql);
      
      echo "<script type='text/javascript'>alert('$message'); window.location.href='index.php'; </script>";
    }

     
 
   // $query = mysqli_query($conn,$sql);
   // mysqli_execute($query);

    //header("location: login.php"); 
 
      

?>