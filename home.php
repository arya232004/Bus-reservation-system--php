<?php
require 'D:\xampp\htdocs\Bus reservation\db\db.php';
?>
<?php
session_start();

    $details = $_SESSION["usersessionvarxd"];
    // echo $details;
    $login_cred = explode("|", $details);
    $email = $login_cred[0];
    $password = $login_cred[1];
    if(strlen($email) == 0 || strlen($password) == 0){
        header("Location: login.php");
    }
    else{
        // echo "Logged in";
    }
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">
    <link rel="stylesheet" href="css/seats.css">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="module">
        import Swal from 'sweetalert2'
        const Swal = require('sweetalert2')
    </script>
 
  
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/card.css">
    <script src="nav.js"></script>
       
</head>
<form method="POST" action="home.php"> 
    <div class="h-20 d-flex align-items-center justify-content-center">
        <div class="h-100 d-flex align-items-center justify-content-center m-3">  
          <select class="form-select" aria-label="Default select example" id="pickup" name="pickup">
           <option selected>Select pickup point</option>
         </select>
        </div>

        <div class="h-20 d-flex align-items-center justify-content-center m-3">  
          <select class="form-select" aria-label="Default select example" id="destination" name="destination">
           <option selected>Select destination</option>
         </select>
        </div>

        <div class="h-20 d-flex align-items-center justify-content-center m-3">  
          <!-- <select class="form-select" aria-label="Default select example" id="destination">
           <option selected>Select destination</option> -->
           <input type="date" class="form-control" id="myDate" placeholder="Date" name="date">
         
         </select>
        </div>

        <div class="h-20 d-flex align-items-center justify-content-center m-3">  
          <button type="submit" class="btn btn-primary" name="search">Search</button>
    </form>
        </div>
    </div>
    <?php
$q = "select busstart from buses;";
$q1 = "select destination from buses;";
$result = $dbh->query($q);
$result1 = $dbh->query($q1);
$pick=array();
$dest=array();
while($row = $result->fetch_assoc())
	{
      extract($row);
      $pick[]=$busstart;
	}
while ($row = $result1->fetch_assoc()) {
    extract($row);
    $dest[]=$destination;
}

if (isset($_POST['search'])) {
    $pickup = $_POST['pickup'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $q2 = "select * from buses where busstart='$pickup' and destination='$destination' and busdate='$date';";
    $result2 = $dbh->query($q2);

$xd=0;
$arr=array();
    while ($row2 = $result2->fetch_assoc()) {
        extract($row2);
        $busname = $busname;
        echo "<script>console.log($busname)</script>";
        //remove all elements from array  
        unset($arr);
        $arr=array();
        $getseat="select * from $busname";
        $result3=$dbh->query($getseat);
       
        $vacant=0;
        $booked=0;

        while ($row3=$result3->fetch_assoc()) {
            array_push($arr, $row3['status']);
            // $arr[]=$row3['status'];
        }

      

        for ($i=0;$i<sizeof($arr);$i++) {
            if ($arr[$i]=='vacant') {
                $vacant++;
            } else {
                $booked++;
            }
        }    
        echo "
    
    <div class='container bcontent justify-content-center'>
    <iframe name='votar' style='display:none;'></iframe>
   

    <div class='card mx-auto'>
    <div class='additional'>
      <div class='user-card'>
        <div class='level center'>
        $busname
        </div>
        <svg fill='#DC7633' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='150' zoomAndPan='magnify' viewBox='0 0 375 374.9999' height='250' preserveAspectRatio='xMidYMid meet' version='1.0'><defs><path id='pathAttribute' d='M 26.539062 22.5 L 356.539062 22.5 L 356.539062 352.5 L 26.539062 352.5 Z M 26.539062 22.5 ' clip-rule='nonzero' fill='#ffffff'></path></defs><g><path id='pathAttribute' d='M 191.539062 22.5 C 100.523438 22.5 26.539062 96.550781 26.539062 187.5 C 26.539062 278.515625 100.523438 352.5 191.539062 352.5 C 282.488281 352.5 356.539062 278.515625 356.539062 187.5 C 356.539062 96.550781 282.488281 22.5 191.539062 22.5 Z M 191.539062 339.628906 C 107.652344 339.628906 39.410156 271.386719 39.410156 187.5 C 39.410156 103.613281 107.652344 35.371094 191.539062 35.371094 C 275.425781 35.371094 343.667969 103.613281 343.667969 187.5 C 343.667969 271.386719 275.425781 339.628906 191.539062 339.628906 Z M 191.539062 339.628906 ' fill-opacity='1' fill-rule='nonzero' fill='#ffffff'></path></g><path id='pathAttribute' d='M 191.539062 43.949219 C 112.40625 43.949219 47.988281 108.367188 47.988281 187.5 C 47.988281 266.632812 112.40625 331.050781 191.539062 331.050781 C 270.671875 331.050781 335.089844 266.632812 335.089844 187.5 C 335.089844 108.367188 270.671875 43.949219 191.539062 43.949219 Z M 191.539062 43.949219 ' fill-opacity='1' fill-rule='nonzero' fill='#ffffff'></path><g id='inner-icon' transform='translate(85, 75)'> <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' id='IconChangeColor' height='213' width='213'><path d='M13 18H7v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-1a2 2 0 0 1-2-2V2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2v1a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-1zM4 5v6h5V5H4zm7 0v6h5V5h-5zM5 2v1h10V2H5zm.5 14a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm9 0a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z' id='mainIconPathAttribute' fill='#000000'></path></svg> </g></svg>
      </div>
      <div class='more-info'>
        <h1>$busstart To $destination</h1>
        
        <div class='stats'>
          <div>
            <div class='title'>Ticket</div>
            <div class='value'>Rs 2000</div>
          </div>
          <div>
            <div class='title'>Time</div>
            <div class='value'>$startingtime</div>
          </div>
          <div>
            <div class='title'>Starting point</div>
            <div class='value'>$busstart</div>
          </div>
        </div>
        
      </div>
      <div class='book-now'>
        <div class='button'>
        <button  class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal".++$xd."'>
                Book a seat
        </button>
        </div>
      </div>
    </div>
    <div class='general'>
      <h1>$busstart To $destination</h1>
      <p>Starting Point: - $busstart </p>
      <p>Stops: - $reststopsplaces</p>
      <p>Reaching time: - $completiontime </p>
      <span class='more'>Mouse over the card for more info</span>
    </div>	
  </div>





       
        ";
        echo"           
                   <div class='modal fade' id='exampleModal".$xd."' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                     <div class='modal-dialog'>
                       <div class='modal-content'>
                         <div class='modal-header'>
                           <h5 class='modal-title' id='exampleModalLabel'>Seat selection</h5>
                           <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                         </div>
                         <div class='modal-body'>

                         <div class='movie-container'>
                         <label>Select seats you want</label>
                         <select id='movie'>
                            
                         </select>
                     </div>
                 ";
                 echo"
                     <ul class='showcase'>
                         <li>
                             <div class='seat'></div>
                             <small>Available: $vacant</small>
                         </li>
                         <li>
                             <div class='seat selectedxd'></div>
                             <small>Selected</small>
                         </li>
                         <li>
                             <div class='seat occupied'></div>
                             <small>Occupied: $booked</small>
                         </li>
                     </ul>


                     <div class='seat-container'>
                     <div class='bus-shape'>
                                    
" ;
        $i=1;
        array_unshift($arr,"");
        unset($arr[0]);
        echo "size of array is ".sizeof($arr)."";
        while ($i<=sizeof($arr)) {
            echo " <div class='seat-row '>";
            for ($j=1;$j<9;$j++) {
                // echo "<div name='$i' class='seat "; if (in_array('reserved', $arr)) {echo "occupied"; }echo"'></div>";
                echo "<div name='$i' class='seat "; if ($arr[$i]=="Reserved") {echo "occupied";} else{
                    echo "available";
                } echo" '></div>";
                // echo"<script>
                

                // var seat=document.querySelectorAll('.seat');
                // var seats=array_map(
                // for (var i=0;i<seats.length;i++){
                //     console.log(seats[i]);
                // }
                
                // </script>";
                $i++;
            }
            if ($i== sizeof($arr)/2 + 5) {
                // echo "<script>console.log($i)</script>";
                echo "<br>";
                echo "<br>";
            }


            echo "</div>";
        }
        echo"
                    </div>
                 </div>
         ";
        echo"               
                         </div>
                         <div class='modal-footer'>
                           <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                           <button type='button' class='btn btn-primary' name='bookseat' onclick=' allselectedseats(`$email`,`$busname`,`$busdate`,`$busstart`,`$destination`)'>Book seat</button>
                           </form>
                         </div>
                       </div>
                     </div>
                   </div>  
                </div>
            </div>
        </div>
    </div>
    '";
    }


}
    ?>
    <script type="text/javascript">
        var busstart = <?php echo json_encode($pick); ?>;
        var busdest = <?php echo json_encode($dest); ?>;
        var pickup=document.getElementById("pickup");
        var destination=document.getElementById("destination");
        var i;
        var issame=true;
        prev='';
        for(i=0;i<busstart.length;i++){
            var option = document.createElement("option");
            //check if the same option is prresent 
            option.text = busstart[i];
            pickup.add(option);
            if(busstart[i]==pickup.value){
                var option = document.createElement("option");
                option.text = busdest[i];

         

                destination.add(option);
          }
        }
        for(i=0;i<busdest.length;i++){
            var option = document.createElement("option");
            option.text = busdest[i];
            destination.add(option);
            
        }
        </script>
        <script>
           var issame=true;
        prev='';
  $('#pickup > option').each(function() {
  if (prev && prev !== this.value) {
    issame = false;
    return;
  }
  prev = this.value;
});
</script>

        <script>
function sendbusdata(name)
{  change="sendbusdata";
    $.ajax({
        url: 'getdata.php',
        type: 'POST',
        data: {
            busnmae: name,
            change:change,
        },
        success: function(msg) {
            alert('Data sent: ' + msg);
        }               
    });

}


        </script>
        <script src="static pages/seats.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>