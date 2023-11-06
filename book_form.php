<?php

   $connection = mysqli_connect('localhost','root','','book_db');

   if(isset($_POST['send'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $location = $_POST['location'];
      $guests = $_POST['guests'];
      $arrivals = $_POST['arrivals'];
      $leaving = $_POST['leaving'];

      $request = "INSERT INTO `pass_details` (`name`, `email`, `phone`, `address`, `location`, `guests`, `arrival`, `leaving`) VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";
      if(mysqli_query($connection, $request)){
      // echo "Data Entered ";
      header("Location: /busreservation-main/home.php");
      }


   }else{
      echo 'something went wrong please try again!';
   }

?>