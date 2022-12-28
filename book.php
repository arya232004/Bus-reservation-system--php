<?php
require 'D:\xampp\htdocs\Bus reservation\db\db.php';
?>
<?php 
$seats = $_POST['data'];
$email = $_POST['email'];
$busname = $_POST['busname'];
$busdate = $_POST['date'];

$busstart = $_POST['start'];
$destination = $_POST['end'];
// echo $busname;
// echo $email;
// echo $seats;
for($i=0;$i<count($seats);$i++){
   
    $q = "UPDATE $busname set status = 'Reserved', email = '$email' WHERE seats = $seats[$i]";
    //insert into arya232004gmailcom table 
    $q1 = "INSERT INTO $email(busname,seat,pickup,dropoff,date) VALUES ('$busname',$seats[$i],'$busstart','$destination','$busdate')";
    
    $result = mysqli_query($dbh,$q);
    if($result){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Ticket Booked!',
          });
            window.location.reload();
        </script>";
    }
    else{
        echo "<script>alert('Seats not reserved')</script>";
        header("Location: home.php");
        //print the error 
        echo mysqli_error($dbh);
    }
    $result1 = mysqli_query($dbh,$q1);
    if($result1){
        echo "<script>alert('Seats reserved')</script>";
        header("Location: home.php");
    }
    else{
        echo "<script>alert('Error in second one')</script>";
        // header("Location: home.php");
        //print the error 
        echo mysqli_error($dbh);
    }
}
// $q="UPDATE '$busname' SET `status` = 'Reserved' WHERE `seats`= '$seats'";
?>