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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="nav.css">
</head>
<body>
    <div class="h-20 d-flex align-items-center justify-content-center">
    <table class="table table-bordered">
  <thead>
  <tr>
      <th scope="col">Bus Name</th>
      <th scope="col">Bus date</th>
      <th scope="col">Starting time</th>
      <th scope="col">Completion time</th>
      <th scope="col">Seats available</th>
      <th scope="col">Rest stops</th>
      <th scope="col">Stop places</th>
      <th scope="col">Starting point</th>
      <th scope="col">Pick up add</th>
      <th scope="col">pinncode pickup</th>
      <th scope="col">destination</th>
      <th scope="col">bus drop add</th>
      <th scope="col">pinncode drop</th>
      <th scope="col">Update Record</th>
      <th scope="col">Delete record</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $q="select * from buses";
    
if ($result=$dbh->query($q)) {
    while ($row=$result->fetch_assoc()) {
        extract($row);
        $busdate= $busdate;
        $startingtime= $startingtime;
        $completiontime= $completiontime;
        $seatsavailable= $seatsavailable;
        $resstops= $resstops;
        $reststopsplaces= $reststopsplaces;
        $busstart= $busstart;
        $buspickadd= $buspickadd;
        $pincodepick= $pincodepick;
        $destination= $destination;
        $busdropadd= $busdropadd;
        $pincodedrop= $pincodedrop;

        $seatscount=array();

        $q1="select * from $busname where status='vacant'";
        $no=$dbh->query($q1);
        while ($xdd=$no->fetch_assoc()) {
            extract($xdd);
            $seatscount[]=$status;
        }
        $count=sizeof($seatscount);

        echo "
    <form method='POST' action='view.php'>
        <tr>
        <th scope='row' name='$busname'>$busname</th>
        <td>$busdate</td>
        <td>$startingtime</td>
        <td>$completiontime</td>
        <td>$count / $seatsavailable</td>
        <td>$resstops</td>
        <td>$reststopsplaces</td>
        <td>$busstart</td>
        <td>$buspickadd</td>
        <td>$pincodepick</td>
        <td>$destination</td>
        <td>$busdropadd</td>
        <td>$pincodedrop</td>
        
       <td><button type='button' name='btn' id='submit' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
        Update
       </button>    
       </td>
        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <h5 class='modal-title' id='exampleModalLabel'>Update Record</h5>
              <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body' id='mb'>

            <div class='movie-container'>
        <form method='POST' action='view.php'>
            <input type='date' class='form-control' id='busdate' name='update' placeholder='Enter new date' value='' required>
            <br>
            <button class='btn btn-primary' type='submit' name='upbtn'>Update</button>
            </div>
        </form>

        ";
        if ($count!=$seatsavailable) {
            echo"<form method='POST' action='view.php'>
        <td><button class='btn btn-primary disabled' type='button' name='delbtn'><i>Delete<i/></button></td>
        </form>
        ";
        } else {
            echo"<form method='POST' action='view.php'>
            <td><button class='btn btn-primary' type='button' name='delbtn' onClick=plswork('$busname')><i>Delete<i/></button></td>
            </form>
            ";
        }";
        <form method='POST' action='view.php'>
        ";
      
        ";
 
    </form>
      </tr>
        
        ";
        if (isset($_POST['upbtn'])) {
            $newdate=$_POST['update'];
            $q="UPDATE `buses` set `busdate`='$newdate' WHERE `busname`='$busname'";
            $resultxdd=mysqli_query($dbh, $q);
            if ($resultxdd) {
                echo "<script>alert('Date updated successfully');</script>";
                header("Location: 'view.php");
            } else {
                echo "<script>alert('An error occured');</script>";
            }
        }
    }
}
    if(isset($_POST['delbtn']))
    {
      
        echo $busname;
        
    //     $del1="delete from buses where busname='$busname'";
    //     $del2="drop table '$busname'";
    //     $resultdel=mysqli_query($dbh,$del1);
    //     $resultdel2=mysqli_query($dbh,$del2);



    //     if($resultdel)
    //     {
    //         echo "<script>alert('Bus deleted successfully');</script>";
    //         header("Location: view.php");
    //     }
    //     else{
    //         echo "<script>alert('An error occured');</script>";
    //     }
    //  if($resultdel2)
    //  {
    //     echo "<script>alert('Bus deleted alert 2');</script>";
    //     header("Location: view.php");
    //  }
    //  else{
    //     echo "<script>alert('An error occured second');</script>";
    //  }
        
    }

    ?>
  </tbody>
</table>
    </div>
    <script>
function getrequired()
{
    var x=document.getElementById('options');
    var modal=document.getElementById("mb");
    alert(x.value);
    if(x.value=='Bus date')
    {
        var x = document.createElement("INPUT");
          x.setAttribute("type", "date");
          x.setAttribute("class", "form-control");
          x.setAttribute("placeholder", "Enter new date");
          x.setAttribute("required", "");
          x.classList.add("mt-4","newf");
          x.setAttribute("name", "updatebus");
          document.getElementById("mb").appendChild(x);
    }
    
}

function plswork(name)
{
    // alert(name);
    // console.log("plswork");


    $.ajax({
			type: "post",
			url: "delete.php",
			data: {
				name: name,
			},
			success: function(data) {
				window.location.reload();
			}
		});
	}

        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>