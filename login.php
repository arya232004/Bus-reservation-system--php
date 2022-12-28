<?php
require 'db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Log in Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="module">
        import Swal from 'sweetalert2'
        const Swal = require('sweetalert2')
    </script>
</head>

<body>
    <svg width="380px" height="500px" viewBox="0 0 837 1045" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
            <path d="M353,9 L626.664028,170 L626.664028,487 L353,642 L79.3359724,487 L79.3359724,170 L353,9 Z" id="Polygon-1" stroke="#007FB2" stroke-width="6" sketch:type="MSShapeGroup"></path>
            <path d="M78.5,529 L147,569.186414 L147,648.311216 L78.5,687 L10,648.311216 L10,569.186414 L78.5,529 Z" id="Polygon-2" stroke="#EF4A5B" stroke-width="6" sketch:type="MSShapeGroup"></path>
            <path d="M773,186 L827,217.538705 L827,279.636651 L773,310 L719,279.636651 L719,217.538705 L773,186 Z" id="Polygon-3" stroke="#795D9C" stroke-width="6" sketch:type="MSShapeGroup"></path>
            <path d="M639,529 L773,607.846761 L773,763.091627 L639,839 L505,763.091627 L505,607.846761 L639,529 Z" id="Polygon-4" stroke="#F2773F" stroke-width="6" sketch:type="MSShapeGroup"></path>
            <path d="M281,801 L383,861.025276 L383,979.21169 L281,1037 L179,979.21169 L179,861.025276 L281,801 Z" id="Polygon-5" stroke="#36B455" stroke-width="6" sketch:type="MSShapeGroup"></path>
        </g>
    </svg>
    <div class="message-box">
        <h1>Login Form</h1>
        <div class="buttons-con">
            <form action="" method="POST">
            <div class="action-link-wrap">
                <div>
                    <input type="text" id="email" placeholder="E-mail Id" class="inputDetails" name="emailid" required>
                </div>
                <div>
                    <input type="text" id="name" placeholder="Enter name" class="inputDetails" name="name_login" required>
                </div>
                <div>
                    <input type="password" id="passwordf" placeholder="Enter Password" class="inputDetails" name="password_login">
                </div>
            <div>   
                <div style="position: relative; right:85px">
                    <input type="submit" value="Sign up" class="submitBtn" id="userSubmitBtn" name="login" />
                </div>
                <div style="position: relative; bottom:120px; left:90px">
              <input type="button" value="Registraion" class="submitBtn" id="userSubmitBtn" name="login" onclick="naviagtereg()"> </input>
                </div>
            </div>   
            </form>
            </div>
        </div>
        <?php
        if(isset($_POST["login"]))
        {  
            $emailid = $_POST["emailid"];

            $tableemail=str_replace(array('@','.'),"",$emailid);


            $password = $_POST["password_login"];
            $name=$_POST["name_login"];
           
            $q = "select * from users where email = '$tableemail' AND password = '$password'"; 
            $result = $dbh->query($q);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                session_start();
                $_SESSION["usersessionvarxd"] = $row["email"] . "|" . $row["password"]. "|" . $row["name"];
                header("Location: home.php");
            }
        }
        else {
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Login Failed!',
              })
                </script>";
        }
        }
        ?>
    </div>
    <script>

function naviagtereg()
{
    window.location.href = "registration.php";
}
    </script>
</body>
</html>