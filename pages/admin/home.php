<?php 
include 'headerad.php';
 ?>
<?php
require 'D:\xampp\htdocs\Bus reservation\db\db.php';
?>
<?php

session_start();

    $details = $_SESSION["usersessionvar"];
    $login_cred = explode("|", $details);
    $email = $login_cred[0];
    $password = $login_cred[1];
    if(strlen($email) == 0 || strlen($password) == 0){
        header("Location: login.php");
    }
    else{
     
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .container {
  max-width: 960px;
}

@import url('https://fonts.googleapis.com/css?family=Roboto');
.lol body {
    font-family: 'Roboto', sans-serif;
}

* {
    margin: 0;
    padding: 0;
}

i {
    margin-right: 10px;
}


/*----------bootstrap-navbar-css------------*/

.navbar-logo {
    padding: 15px;
    color: #fff;
}

.navbar-mainbg {
    background-color: #5161ce;
    padding: 0px;
}

#navbarSupportedContent {
    overflow: hidden;
    position: relative;
}

#navbarSupportedContent ul {
    padding: 0px;
    margin: 0px;
}

#navbarSupportedContent ul li a i {
    margin-right: 10px;
}

#navbarSupportedContent li {
    list-style-type: none;
    float: left;
}

#navbarSupportedContent ul li a {
    color: rgba(255, 255, 255, 0.5);
    text-decoration: none;
    font-size: 15px;
    display: block;
    padding: 20px 20px;
    transition-duration: 0.6s;
    transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

#navbarSupportedContent>ul>li.active>a {
    color: #5161ce;
    background-color: transparent;
    transition: all 0.7s;
}

#navbarSupportedContent a:not(:only-child):after {
    content: "\f105";
    position: absolute;
    right: 20px;
    top: 10px;
    font-size: 14px;
    font-family: "Font Awesome 5 Free";
    display: inline-block;
    padding-right: 3px;
    vertical-align: middle;
    font-weight: 900;
    transition: 0.5s;
}

#navbarSupportedContent .active>a:not(:only-child):after {
    transform: rotate(90deg);
}

.hori-selector {
    display: inline-block;
    position: absolute;
    height: 100%;
    top: 0px;
    left: 0px;
    transition-duration: 0.6s;
    transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
    background-color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    margin-top: 10px;
}

.hori-selector .right,
.hori-selector .left {
    position: absolute;
    width: 25px;
    height: 25px;
    background-color: #fff;
    bottom: 10px;
}

.hori-selector .right {
    right: -25px;
}

.hori-selector .left {
    left: -25px;
}

.hori-selector .right:before,
.hori-selector .left:before {
    content: '';
    position: absolute;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #5161ce;
}

.hori-selector .right:before {
    bottom: 0;
    right: -25px;
}

.hori-selector .left:before {
    bottom: 0;
    left: -25px;
}

@media(min-width: 992px) {
    .navbar-expand-custom {
        -ms-flex-flow: row nowrap;
        flex-flow: row nowrap;
        -ms-flex-pack: start;
        justify-content: flex-start;
    }
    .navbar-expand-custom .navbar-nav {
        -ms-flex-direction: row;
        flex-direction: row;
    }
    .navbar-expand-custom .navbar-toggler {
        display: none;
    }
    .navbar-expand-custom .navbar-collapse {
        display: -ms-flexbox!important;
        display: flex!important;
        -ms-flex-preferred-size: auto;
        flex-basis: auto;
    }
}

@media (max-width: 991px) {
    #navbarSupportedContent ul li a {
        padding: 12px 30px;
    }
    .hori-selector {
        margin-top: 0px;
        margin-left: 10px;
        border-radius: 0;
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
    }
    .hori-selector .left,
    .hori-selector .right {
        right: 10px;
    }
    .hori-selector .left {
        top: -25px;
        left: auto;
    }
    .hori-selector .right {
        bottom: -25px;
    }
    .hori-selector .left:before {
        left: -25px;
        top: -25px;
    }
    .hori-selector .right:before {
        bottom: -25px;
        left: -25px;
    }
}

    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
    <link rel="stylesheet" href="nav.css">
<script src="/nav.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://media.istockphoto.com/id/136630457/photo/empty-white-tour-bus-with-no-driver-or-passengers.jpg?s=612x612&w=0&k=20&c=LQJhkZBwhjNc5RxzXwzGcfZFKONO4scX-b87MQVYm2U=" alt="" width="72" height="57">
      <h2>Enter bus details</h2>
      <p class="lead">Provide correct details</p>
    </div>

    <div class="row g-5">
    <form method="GET" action="home.php">
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Bus details</h4>
          <div class="row g-3">

            <div class="col-sm-12">
              <label for="firstName" class="form-label">Bus name</label>
              <input type="text" class="form-control" id="busname" name="busname" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="firstName" class="form-label">Select Date</label>
              <input type="date" class="form-control" id="busdate" name="busdate" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12">
            <label for="firstName" class="form-label">Select starting time</label>
              <input type="time" class="form-control" id="busstarttime" name="busstarttime" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12">
            <label for="firstName" class="form-label">Select ending time</label>
              <input type="time" class="form-control" id="busendtime" name="busendtime" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12">
            <label for="firstName" class="form-label">Seats available</label>
            <select class="form-select" aria-label="Default select example" name="seatsav">
            
  <option value="30">30</option>
  <option value="40">40</option>
</select>          
              
   


              </div>
            </div>

            <div class="col-12" id="xdd">
            <label for="firstName" class="form-label">Number of rest stops</label>
              <input type="number" class="form-control" id="reststop" placeholder="" value="" name="restnum" name="resstop" required>
              <button type="button" class="btn btn-outline-primary m-2" name="lool" onclick="generateInputFields()">Enter</button>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="firstName" class="form-label">Enter the place from where bus will start</label>
              <input type="text" class="form-control" id="busstart" name="busstart" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            
            <div class="col-sm-12">
              <label for="firstName" class="form-label">Enter the exact pickup point of bus</label>
              <input type="text" class="form-control" id="exactadd" name="exactadd" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            
            <div class="col-sm-12">
              <label for="firstName" class="form-label">Enter the pincode</label>
              <input type="number" class="form-control" id="pickpin" name="pickpin" placeholder="" value="" required max="999999">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="firstName" class="form-label">Enter the Destination</label>
              <input type="text" class="form-control" id="busdrop" name="busdrop" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="firstName" class="form-label">Enter the exact drop point of bus</label>
              <input type="text" class="form-control" id="exacdrop" name="exacdrop" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="firstName" class="form-label">Enter the pincode</label>
              <input type="number" class="form-control" id="droppin" name="droppin" placeholder="" value="" required max="999999">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
          </div>
          <hr class="my-4">
          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit" name="addbus">Add bus in system</button>
        </form>
        <button class="w-100 btn btn-outline-warning btn-lg mt-3" id="logout"
                onclick="window.location.href = 'logout.php';" type="submit">
                <i class="fas fa-sign-out-alt" style="cursor: pointer;"></i> Logout
            </button>
      </div>
    </div>
  </main>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
      <script type="text/javascript">
         $(function () {
             $('#datetimepicker3').datetimepicker({
                 format: 'LT'
             });
         });

      function generateInputFields()
      {
       var n=document.getElementById("reststop").value;
       const btn = document.createElement("input")
       if(document.getElementsByClassName("newf").length>0)
        {
          var x=document.getElementsByClassName("newf");
          for(var i=0;i<x.length;i++)
          {
            x[i].remove();
          }
        }
      
    else{
       for(var i=0;i<n;i++)
        {
          var x = document.createElement("INPUT");
          x.setAttribute("type", "text");
          x.setAttribute("class", "form-control");
          x.classList.add("m-2","newf");
          x.setAttribute("placeholder", "Enter rest stop name");
          x.setAttribute("required", "");
          x.setAttribute("name", "reststop"+i);
          document.getElementById("xdd").appendChild(x);
        }
      }
    }
    </script>
  </body>
</html>


<?php
if(isset($_GET["addbus"])!="")
{ 
$name=$_GET["busname"];
$date=$_GET["busdate"];
$starttime=$_GET['busstarttime'];
$endtime=$_GET['busendtime'];
$seatsav=$_GET['seatsav'];
$reststop=$_GET['restnum'];
$busstart=$_GET['busstart'];
$exactadd=$_GET['exactadd'];
$pickpin=$_GET['pickpin'];
$busdrop=$_GET['busdrop'];
$exacdrop=$_GET['exacdrop'];
$droppin=$_GET['droppin'];
$resplace=array();
// if(isset($_GET['reststop']))
// {
//    $resplace=$_GET['reststop'];
for($i=0;$i<$reststop;$i++)
{
  $resplace[$i]=$_GET['reststop'.$i];
}
$str=implode(",",$resplace);
$query="INSERT INTO `buses`(`busname`, `busdate`, `startingtime`, `completiontime`, `seatsavailable`, `resstops`,`reststopsplaces`,`busstart`,`buspickadd`,`pincodepick`, `destination`, `busdropadd`, `pincodedrop`) VALUES ('$name','$date','$starttime','$endtime','$seatsav','$reststop','$str','$busstart','$exactadd','$pickpin','$busdrop','$exacdrop','$droppin')";
$result=mysqli_query($dbh,$query);
if($result)
{
  echo "<script>alert('Bus added successfully');</script>";
  $q="create table $name(`index` int, `seats` int, `status` varchar(20), `email` varchar(30));";
  // $q="CREATE TABLE IF NOT EXISTS $name (
  //   `index` int(11),
  //   `seats` int(11),
  //   `status` varchar(255),
  //   `email` varchar(255),
  // );";


 









  if(mysqli_query($dbh,$q))
  {
    echo "<script>alert('Table created');</script>";

    for($i=1;$i<=$seatsav;$i++)
    {
      $q="insert into $name values($i,$i,'vacant','');";
      if(mysqli_query($dbh,$q))
      {
       // echo "<script>alert('Seats added');</script>";
      }
      else
      {
        //echo "<script>alert('Seats not added');</script>";
      }
    }
  }
  else
  {
    echo "<script>alert('Table not created');</script>";
    echo mysqli_error($dbh);
  }
}
else
{
  echo "<script>alert('Bus not added');</script>";
}
}

?>
      </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
