<?php
    session_start();

  function show_Array ($data) {
    if (is_array($data)){
       echo "<pre>";
       print_r($data);
       echo "<pre>";

    }
 }
 #Test if submit form is correct with username and password:

    if (isset($_POST['login'])){
       $info_user = array (
          'username' => 'logic149',
          'password' => 'Hihihi12'

       );
       $username = $info_user['username'];
       $password = $info_user['password'];
        $error = array();

   
 if (empty($_POST['username']) ){
  $error['username'] = 'You did not enter Username. Please try again!';
 // echo $error['username'];
} else {
    if (!(strlen($_POST['username'])>=6&&strlen($_POST['username'])<=32)){
        $error['username'] = 'Your username must be between 6 and 32 characters long';
    } else {
        $username = $_POST['username'];
}
  
  }
   if (empty($_POST['password'])) {
 $error['password'] = 'You did not enter Password. Please try again!';
// echo $error['password'];

}
    elseif (strlen($_POST['password']) < 8) {
        $error['password'] = 'Your password must be between 6 and 32 characters long'; #getpassword

    } 
        
    else {
        $password = $_POST['password'];
    }
      
    


 
 #Flag technique => already type the data
 if (empty($error)) {
    if ($username==$info_user['username']&&$password == $info_user['password']){
         if (isset($_POST['remember_me'])) {
            setcookie('is_login', true, time()+ 3600);
            setcookie('user_login', 'Welcome to our Page', time()+ 3600);

         }
          $_SESSION['is_login'] = true;
          $_SESSION['user_login'] = 'Welcome to our Page';
        
    
          header("location: home_page.php");

    } else{
       $error['login']= "Data not valid. Please try again!";
        echo $error['login'];
    } 
    
           
    
    }
} //close all the program begin from login


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER LOGIN SYSTEM</title>

        
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <h1> LOGIN TO YOUR ACCOUNT </h1>
    <style>
            p.error{ color: red;}
    </style>
    <form method="POST" id="Form" action="" >
        <div class="form-group">
            <label for="username">Username</label><br>
            <input type="text" id="username" name="username" value = "<?php if(!empty($username)) echo $username?>"
            placeholder=" Enter username" >
            <p class = "error"><?php if (!empty($error['username'])) {
                echo $error['username'];
            }
            
            
            ?></p> 


        </div>
        <div class="form-group">

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"
            placeholder=" Enter password">
            <p class = "error"><?php if (!empty($error['password'])) {
                echo $error['password'];
            }
            
            
            ?></p> 
        </div>
      

        <input type = "checkbox" name = "remember_me" id = "remember_me">
        <label for = "remember_me">Remember me</label><br><br>
        <input class="btn btn-primary" type="submit" value="Login" name = "login">

        
        <!-- <button type="submit" class="btn btn-success">Login</button> -->
        
                

    </form>

</body>

</html>