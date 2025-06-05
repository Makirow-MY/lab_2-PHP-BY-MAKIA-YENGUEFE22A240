
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
   


 if (isset($_GET["id"])) {
    $UserId = $_GET["id"];
    $sql = "DELETE FROM users  WHERE id='$UserId'";
            
    // Execute the query
    if (mysqli_query($con, $sql)) {
        header('Location: view_users.php');
        exit;
    } else {
        echo "ERROR: " . mysqli_error($con);
    }
}

if (isset($_GET["id"])) {
    $UserId = $_GET["id"];
    $sql = "DELETE FROM users  WHERE id='$UserId'";
            
    // Execute the query
    if (mysqli_query($con, $sql)) {
        header('Location: view_users.php');
        exit();
    } else {
        echo   header("Location: view_user.php?error=Fail+to+delete+row");
        die;
        exit();
    }
}

   
        $data = [];
        $sql1 = "SELECT * FROM users";
        $res = $con->query($sql1);
        
        if (!$res) {
            die("Invalid Query: ".$con->error);
        }
      
        if ($res->num_rows > 0) {
      
          while ($row = $res->fetch_assoc()) {
              $data[] = $row;
         }
      
        }
      
        $con->close();
   


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <style>
        nav a{
    background: rgb(0, 255, 128);
    border: none;
    padding: .5rem 1rem;
    font-size: 16px;
    color: #011426;
    text-decoration: none;
    font-weight: 550;
    cursor: pointer;
    transition: .5s ease-in-out;
    border-radius: 10px;
}
nav a:hover{
    background: rgb(3, 216, 109);
}
    </style>
</head>
<body>

<nav>
        <h1>WEB APP APP</h1>
        <form method="POST">
            <input name="query" id="namesearch"  placeholder="Search here..." />
        </form>
        <a href="http://localhost/crud-app/lab_2/user_form.php" type="button" id="btn" class="uploadbtn">
        + Add</a>
    </nav>

    
    
    <div class="maincntainer">

<div class="container">

    <table className="table" id="usertable">
        
        <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Email Address</th>
            <th>Age</th>                
           
                          
        </tr>
        </thead>
       
        <tbody className="hover">

        <?php if (empty($data)):  ?> 

      <tr  id="tableCont"  >
            <td></td>
            <td style="opacity: 0;"></td>
            <td style="border: none; font-size: 20px;">No User Found Yet!</td>
            <td style="opacity: 0;"></td>
          
           
            </td>
            
            
        </tr>
 
<?php endif;  ?>


<?php if (!empty($data)):  ?> 

            <?php foreach($data as $data):                  
        ?>

<tr onclick="SelectRow(this)"  data-id="<?= $data['id'] ?>" key='<?= $data['id'] ?>' id="tableCont"  >
            <td><?= $data['id'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['age']." Years" ?></td>
            
            
            
        </tr>

<?php endforeach; ?>   
<?php endif;  ?>
       
        </tbody>
    </table>

</div>

</div>


<script>
function SelectRow(row) {

// Deselect all previously selected rows
const isSelected = row.classList.toggle('selected');
const userCell = row.cells[0];


const allRows = document.querySelectorAll('tr'); // Adjust the selector to target your specific table rows
allRows.forEach(r => {
   if (r.classList.contains('selected') && r !== row) {
       r.classList.remove('selected');
       const userCell = r.cells[0];
       userCell.innerHTML = r.dataset.id; // Restore user ID or previous content
   }
});


// 
 if(isSelected)
 {
        const button = document.createElement('a')
       button.innerText = "Delete"
          button.type = 'submit';
          button.href = `/crud-app/lab_2/view_users.php?id=${row.dataset.id}`
          button.style = 'padding: 3px; color: white;  text-decoration: none; background: red; '
           userCell.innerHTML = '';
          userCell.appendChild(button)
   
 }
 else{
   const userId = row.dataset.id
          userCell.innerHTML = '';
          userCell.innerHTML = userId
 }
}


 

  </script>

</body>
</html>