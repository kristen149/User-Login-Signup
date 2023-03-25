<?php
   require 'validation_form.php';

 
 #Test if submit form is correct with username and password:

    if (isset($_POST['signup'])){
       

        $error = array();

    #Validate username:
 if (empty($_POST['username']) ){
  $error['username'] = 'You did not enter username. Please try again!';
 // echo $error['username'];
}
  else {
        if (!(strlen($_POST['username'])>=6&&strlen($_POST['username'])<=32)){
            $error['username'] = 'Your username must be between 6 and 32 characters long';
        } else {
      
        if (!is_username($_POST['username'])) {
            $error['username'] = ' Only letters(a-z). numbers(0-9) and special characters (_\.) are allowed' ;

        }

        else {
             $username = $_POST['username'];
             echo "Username: {$username}<br>";
        }
    }
     
  }
    #Validate password:
   if (empty($_POST['password'])) {
 $error['password'] = 'You did not enter password. Please try again!';

} else{
    if (!(strlen($_POST['password'])>=6&&strlen($_POST['password'])<=32)) {
        $error['password'] = 'Your password must be between 6 and 32 characters long';

    } else{

        if (!is_password('password')){
            $error['password'] = 'Upper-case letters must be used as the first character' ;

        }
        else {
            $password = $_POST['password'];
            echo "Password: {$password}<br>";
       }
    }
}
   
        
      
    #solve GENDER
    $error_gender = array();
    if (empty($_POST['gender'])) {
        $error_gender['gender']="You must choose gender. Please try again!";
    } else {
        $gender = $_POST['gender'];
    } if (empty($error_gender)){
        echo "Gender: {$gender}";
    }
    #solve TERMS AND CONDITIONS
    $error_rules = array();
    if (empty($_POST['rules'])) {
        $error_rules ['rules'] = "You need to agree to the Terms and Conditions";
        
    } else {
        $rules = $_POST['rules'];
        echo "Rule: {$rules}";
    } 
    


} //close all the program begin from login


?>

<!DOCTYPE html>
<html lang="en">



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>

        
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <h1>CREATE YOUR NEW ACCOUNT</h1>
    <style>
            p.error{ color: red;}
    </style>

    <form class = "form_test" method="POST" id="Form" action="" >
        <div class="form-group">
            <label for="username"><strong>Username</strong></label><br>
            <input type="text" id="username" name="username"
            placeholder=" Enter username" value = "<?php if(!empty($username)) echo $username?>">
            <p class = "error">
                
                <?php if (!empty($error['username'])) {
                echo $error['username'];
            }
            
            
            ?></p> 


        </div>

        <div class = "form-group">
            <strong>Gender   </strong><br>
            
            <input type = "radio" name = "gender" value ="Male" <?php if(!empty($gender)&&$gender=="Male") echo "checked='checked'"  ?>  id ="male">
            <label for = "male">Male</label> 
            <input type = "radio" name = "gender" value ="Female" <?php if(!empty($gender)&&$gender=="Female") echo "checked='checked'"  ?>id ="female">
            <label for = "female">Female</label> 
            <input type = "radio" name = "gender" value ="Others" <?php if(!empty($gender)&&$gender=="Others") echo "checked='checked'"  ?> id ="other">
            <label for = "other">Others</label> 
            <p class = "error">
                <?php if (!empty($error_gender['gender'])) {
                echo $error_gender['gender'];
            }
            ?></p> 


        </div>
        <div class="form-group">

            <label for="password"><strong>Password</strong></label><br>
            <input type="password" id="password" name="password"
            placeholder=" Enter password">
            <p class = "error"><?php if (!empty($error['password'])) {
                echo $error['password'];
            }
            
            
            ?></p> 


        <p class ="rules" style = "width: 960px; height: 100px; overflow-y: scroll; ">
          User Account and registration
          A User Account is a prerequisite for placing orders in the Online Shop, using Digital Content or Services, and providing User content such as comments on websites operated by Springer Nature or its affiliated companies.
          Prerequisites for registering a User Account and registration process
          User must be of age and have full legal capacity.
          User must provide accurate and complete details upon registration and must keep them up to date.
          User must provide a valid email address. User warrants that they are entitled to receive email at such email address. Springer Nature is not obliged to use such email address for communication with User.
          User may review the data entered and correct any errors or terminate the registration process at any time before sending off the completed registration form. By clicking the confirmation button, User registers a User Account. Springer Nature will send User a confirmation of receipt of their registration. Springer Nature may reject registrations for any or no reason. The contract on using the user account will not be filed and will not be accessible to User.

    </p>
        </div>

        <br>
    <input type = "checkbox" name = "rules" value = "yes" id = "rules"  > 
    <label for = "rules" >I have read and understand the above Terms and Conditions</label><br>  
    <p class = "error">
    <?php if (!empty($error_rules['rules'])) {
             echo $error_rules['rules'] ;
    }
    ?>
    </p>

    <br>

        <input class="btn btn-primary" type="submit" value="Sign up" name = "signup">
        <!-- neu ma tat ca deu dung -->
        <input type ="hidden" name = "redirect_to" value = "checkbox_regulation.php"/>

        

        
        
                

    </form>

</body>

</html>