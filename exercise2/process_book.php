<?php

//use Soap\Url;
$host = 'localhost';
$dbusername = 'root' ;
$dbpassword = '';
$dbname = 'librarysystemdb';

$con = new mysqli( $host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()) {
    die('Connection Error ('. mysqli_connect_error() . ')'. mysqli_connect_error() );
} else {
   

 if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
    
    $author_name = filter_input(INPUT_POST, 'authorName'); 
    $bio = filter_input(INPUT_POST, 'authorBio');

    $author = filter_input(INPUT_POST, 'authorId'); 
    $title = filter_input(INPUT_POST, 'title');
    $genre = filter_input(INPUT_POST, 'genre');
    $price = filter_input(INPUT_POST, 'price');
    $RnadomlyGenerateId1 =  rand(10000000, 2147483000);


              if (!empty($author_name) &&  !empty($bio)) {

                if (!preg_match("/^[a-zA-Z-' ]*$/", $author_name)) {
                    header("Location: add_book.php?error=Invalid+Author+Name");
                    die;
                    exit();
                }

            $RnadomlyGenerateId2 =  rand(10000000, 2147483647);

            $author_Generated_Id =  $RnadomlyGenerateId + $RnadomlyGenerateId1;
                       
            $sql = "INSERT INTO authors (author_id, author_name, bio) VALUES ('$author_Generated_Id', '$author_name', '$bio')";
         
            mysqli_query($con, $sql);
            header("Location: add_book.php?success=Author+was+successfully+created");
         
            die;
    
        } 
        else  if (!empty($title) && !empty($author) && !empty($genre) && !empty($price) && is_numeric($price)){
          
            $sql = "INSERT INTO books (book_title, genre, price, author_id) VALUES ('$title', '$genre','$price', '$author')";
         
            mysqli_query($con, $sql);
            header('Location: view_book.php');
         
            die;
           
        }
        else {
            header("Location: add_book.php?error=Please+Provide+All+Information");
         }


    

 }

     
        $con->close();
 }



?>