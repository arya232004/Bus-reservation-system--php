<?php 
if(isset($_POST['change']))
{
    $q="select * from $busname order by seats desc limit 1;";
    $result=$dbh->query;
    while($row=$result->fetch_assoc())
    {
        $max=$row['seats'];
    }
    echo"<script>alert($max)</script>";
}


?>