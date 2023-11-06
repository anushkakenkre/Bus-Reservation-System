<?php 

  $insert = false;
  $update = false;
  $delete = false;
  //connect to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "book_db";
  
  //  create a connection
  $conn = mysqli_connect($servername,$username,$password,$database);

  // die of connection was not successful
  if(!$conn){
    die("sorry we failed to connect: ". mysqli_connect_error());
  } else

//   if(isset($_POST['name'])){
//     $login_id = $_POST['login_id'];
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $request = " INSERT INTO `login_details` (`name`, `email`, `password`, `login_id`) VALUES ('$name', '$email', '$password', '$login_id'); ";
//     mysqli_query($connection, $request);

//     header('location:/busreservation-main/dashboard.html'); 

//  }
// if(isset($_POST['name'])){
//     $name = $_POST['name'];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//         echo 'hello';
//     $sql = "INSERT INTO `login_details` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
//     $result = mysqli_query($conn,$sql);
//     if($result){
//       echo "The record has been inserted successfully! <br>";
//       header("Location: /busreservation-main/dashboard.php");
//     }else{
//       echo "The record was not been inserted! " . mysqli_error($conn);
//     }
// }
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO `login_details` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password');";
        $result = mysqli_query($conn,$sql);
        if($result){
          echo "The record has been inserted successfully! <br>";
          header("Location: /busreservation-main/dash.php");
        }else{
          echo "The record was not been inserted! " . mysqli_error($conn);
        }
    }
    else{
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM `login_details`";
        $result = mysqli_query($conn,$sql);
        $findEmail = false;
        $findPassword = false;
        while($row = mysqli_fetch_assoc($result)){
            if($row['email'] == $email){
                $findEmail = true;
            }
            if($row['password'] == $password){
                $findPassword = true;
            }
        }
        if($findEmail && $findPassword){
          header("Location: /busreservation-main/dash.php");
        }else if($findEmail == false){
          echo "<h2>Email not found </h2> <br>";
        }else if($findPassword == false){
            echo "<h2>Password incorrect</h2> <br>";
        }
    }
  }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <div class="container" id="main">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="login.php" method="post">
                    <h1>Create Account</h1>
                    <!-- <div class="social-container">
                        <a href="#" class="social"><img src="images/facebook (1).png" alt="facebook"></a>
                        <a href="#" class="social"><img src="images/google.png" alt="facebook"></a>
                        <a href="#" class="social"><img src="images/linkedin.png" alt="facebook"></a>
                        
                    </div> -->  
                    
                    <input type="text" placeholder="Name" name="name" required />
                    <input type="email" placeholder="Email" name="email" required />
                    <input type="password" placeholder="Password" name="password" required />
                    <button onclick="openDashboard()">Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="login.php" method="post">
                    <h1>Sign in</h1>
                    <!-- <div class="social-container">
                        <a href="#" class="social"><img src="images/facebook (1).png" alt="facebook"></a>
                        <a href="#" class="social"><img src="images/google.png" alt="facebook"></a>
                        <a href="#" class="social"><img src="images/linkedin.png" alt="facebook"></a>
                    </div> -->
                  
                    <input type="email" placeholder="email" name="email" required/>
                    <input type="password" placeholder="password" name="password" required/>
                    <a href="#">Forgot your password?</a>
                    <button onclick="openDashboard()">Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="login.js"></script>
</body>

</html>