

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>

<nav>
        <h1>WEB APP APP</h1>
        <form method="POST">
            <input name="query" id="namesearch"  placeholder="Search here..." />
        </form>
       
    </nav>
    
<div id="dia" class="dialogue hide" >
<div class="upload">
<h2 id="titleh2">Add User</h2>
<a href="http://localhost/crud-app/lab_2/view_users.php" id="closebtn" class="close">X</a>

<?php if (isset($_GET['error'])):  ?> 
    <div id="error" class="error">
    <?php echo htmlspecialchars($_GET['error']);  ?> 
    </div>
<?php endif;  ?> 
<form method="post" action="process_form.php">
    <div class="input">
                  
                  <div class="sect" >
                          <label for="name">Full Name</label>
                          <input id="title" name="name" placeholder="Example Angelina"  type="text" />
                      </div>
                      
                      <div class="sect">
                          <label for="email"  >Email Address</label>                          
                          <input id="email" name="email" placeholder="example@gmail.com" type="text" />
                      </div>
                      
                      <div class="sect">
                          <label for="town">Age</label>
                          <input id="age" name="age" placeholder="e.g 30"  type="number" />
                      </div>
                    </div>

                     <button id="uploaodButton" type="submit" name="submit" >Create User</button>
              
    </form>
</div>
</div>

<?php if (isset($_GET['error'])):  ?> 
    <script class="error">

   setTimeout(function () {
    document.getElementById('error').style.display = 'none'
     window.location.href = "http://localhost/crud-app/lab_2/user_form.php"
   }, 3000)

    </script>
<?php endif;  ?> 

</body>
</html>