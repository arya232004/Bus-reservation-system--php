<?php
require 'D:\xampp\htdocs\Bus reservation\db\db.php';
?>

<?php 
echo "<script>alert('lolll')</script>";
$name=$_POST['name'];
echo "<script>alert('$name')</script>";
      $del1="delete from buses where busname='$name'";
        $del2="drop table '$name'";
        $resultdel=mysqli_query($dbh,$del1);
        $resultdel2=mysqli_query($dbh,$del2);

        if($resultdel)
        {
            echo "<script>alert('Bus deleted successfully');</script>";
            header("Location: view.php");
        }
        else{
            echo "<script>alert('An error occured');</script>";
        }
     if($resultdel2)
     {
        echo "<script>alert('Bus deleted alert 2');</script>";
        header("Location: view.php");
     }
     else{
        echo "<script>alert('An error occured second');</script>";
     }
?>