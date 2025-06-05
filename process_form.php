<?php

//use Soap\Url;

$host = 'localhost';
$dbusername = 'root' ;
$dbpassword = '';
$dbname = 'webappdb';

$con = new mysqli( $host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
      die('Connection Error ('. mysqli_connect_error() . ')'. mysqli_connect_error() );
} else {
   

 if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
    
    $name = filter_input(INPUT_POST, 'name'); 
    $email = filter_input(INPUT_POST, 'email');
    $age = filter_input(INPUT_POST, 'age');

    $UserId = filter_input(INPUT_POST, 'UserId');
   
              if (!empty($name) &&  !empty($email) &&  !empty($age)  ) {

                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    header("Location: user_form.php?error=Invalid+User+Name");
                    die;
                    exit();
                }

                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: user_form.php?error=Invalid+Email+Address");
                    die;
                    exit();
                }
                       
            $sql = "INSERT INTO users (name, email, age) VALUES ('$name', '$email','$age')";
         
            mysqli_query($con, $sql);
            header('Location: view_users.php');
         
            die;
    
        } else {
            header("Location: user_form.php?error=Please+Provide+All+Information");
         }


    

 }

     
        $con->close();
 }



?>