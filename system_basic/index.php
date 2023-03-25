
<!-- The most important thing: code place dung cho -->
<?php
    require 'inc/header.php';
    //replace by function get_header
?>
    <?php
    
   

   if (!empty($_GET['page'])) {
    $page = $_GET['page'];
   } else {
    $page = 'home';
   }
   $path = "pages/{$page}.php";
   
    if (file_exists($path)) {
    require $path;
   } else {
    require 'inc/404 not found.php';
   }

   
   

?> 
   
        


<?php
    require 'inc/footer.php';
?>
