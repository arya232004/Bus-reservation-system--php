<?php
require 'D:\xampp\htdocs\Bus reservation\db\db.php';
?>
<?php
include 'header.php';
?>
<?php

session_start();

    $details = $_SESSION["usersessionvarxd"];
   
    $login_cred = explode("|", $details);
    $email = $login_cred[0];
    $name=$login_cred[2];
    $password = $login_cred[1];
    if(strlen($email) == 0 || strlen($password) == 0){
        header("Location: login.php");
    }
    else{
        // echo "Logged in";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

<link rel="stylesheet" href="css/book.css">
<link rel="stylesheet" href="css/profile.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/nav.css">
    <script src="nav.js"></script>
</head>
<body>
<div class="container">
    <div class="main-body">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
<?php


if(isset($_POST['logout'])){
    session_destroy();
    header("Location: login.php");
}

echo"
<h4>$name</h4>
<button class='btn btn-outline-primary' type='submit' name='logout' onclick='logoutnow()';  >Logout</button>
</div>
</div>
</div>
</div>

</div>
<div class='col-md-8'>
<div class='card mb-3'>
<div class='card-body'>

<div class='cardWrap'>
";

if(isset($_POST['logout']))
{

}


$q="select * from $email";
$result=$dbh->query($q);
while($row1=$result->fetch_assoc())
{
    extract($row1);
    // echo $busname;
    echo "
    <div class='cardxd cardLeft'>
<h1>$busname</h1>
<div class='title'>
<span>From</span>
<h2>$pickup</h2>
</div>
<div class='name'>
<span>Destination</span>
<h2>$dropoff</h2>
</div>
<div class='date'>
<h2>$date</h2>
<span>Date</span>
</div>
<br>
<br>
<div class='name'>
<h2>$seat</h2>
<span>seat</span>
</div>

</div>
<div class='cardxd cardRight'>
<div class='eye'></div>
<div class='number'>
<h3>$seat</h3>
<span>seat</span>
</div>
<div class='barcode'></div>
</div>
    ";
}
echo 
"
</div>
</div>
</div>
</div>

";


?>


          </div>

        </div>
    </div>
 <script>
    function logoutnow()
    {
        window.location.href='logout.php';
    }
 </script>
</body>
</html>