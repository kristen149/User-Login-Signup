<?php

function show_Array ($data) {
    if (is_array($data)){
       echo "<pre>";
       print_r($data);
       echo "<pre>";

    }
 }
function is_username ($username) {
    $pattern_username = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern_username, $_POST['username'], $machts)) {

        return FALSE;
       

    
} 
        return TRUE;


}
function is_password($password) {
    $pattern_password = "/^([A-Z0-9]){1}([\w_\.!@#$%^&*()]+){5,31}$/"; /// NEED TO ASK
    if (!preg_match($pattern_password, $_POST['password'], $machts)){
        return FALSE;
    }
        return TRUE;

}