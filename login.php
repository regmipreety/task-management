<?php  
  
   // include function file
   if(isset($_POST['submit'])){
    require_once'function.php';
      
      $user = new DB_con();  
      $login = $user->login($_REQUEST['username'],$_REQUEST['password']);  
      if($login){  
         header("location:index.php");  
      }
      else
      {  
         echo "Invalid username or password!";  
      }  
   }  
?>  
    <html>  
  
    <head>  
    <head>
    <meta charset="utf-8">
    <title>PHP CRUD Operations using PHP OOP </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Log In</title>  
    </head>  
  
    <body>  
    <div class="container mt-3">
            <h1>Log in</h1>  
            <form action="" method="post">  
            <div class="mb-3 mt-3">
               <label for="email" class="form-label">Username:</label>
               <input type="text" class="form-control" id="email" placeholder="Enter email" name="username">
            </div>
            <div class="mb-3">
               <label for="pwd" class="form-label">Password:</label>
               <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
                <button type="submit" class="btn btn-primary" name="submit" value="Login">Login </button> 
               
            </form>  
            <a href="insert.php"><button class="btn btn-primary"> Register</button></a> 
        </div>  
</div>
    </body>  
  
    </html>  