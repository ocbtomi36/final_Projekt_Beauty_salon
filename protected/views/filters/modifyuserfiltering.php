<?php
if(!filter_has_var(INPUT_POST, 'send') || 
    filter_input(INPUT_POST,'send',FILTER_SANITIZE_STRING) != 'send'){
        include USERS_DIR.'finalmodifyuserdb.php';
    }
    else {
        $filtered_firstname = filter_input(INPUT_POST, 'firstname', FILTER_CALLBACK, ['options' => 'name_validation']);
        if($filtered_firstname === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_lastname = filter_input(INPUT_POST, 'lastname', FILTER_CALLBACK, ['options' => 'name_validation']);
        if($filtered_lastname === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_firstname2nd = filter_input(INPUT_POST, 'firstname2nd', FILTER_CALLBACK, ['options' => 'name_validation2nd']);
        if($filtered_firstname2nd === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_lastname2nd = filter_input(INPUT_POST, 'lastname2nd', FILTER_CALLBACK, ['options' => 'name_validation2nd']);
        if($filtered_lastname2nd === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_id = filter_input(INPUT_POST, 'idnumber', FILTER_CALLBACK, ['options' => 'id_validation']);
        if($filtered_id === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_username = filter_input(INPUT_POST, 'password', FILTER_CALLBACK, ['options' => 'username_validation']);
        if($filtered_username === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_password = filter_input(INPUT_POST, 'password', FILTER_CALLBACK, ['options' => 'password_validation']);
        if($filtered_password === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_gender = filter_input(INPUT_POST, 'gender', FILTER_CALLBACK, ['options' => 'gender_validation']);
        if($filtered_id === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_CALLBACK, ['options' => 'phonenumber_validation']);
        if($filtered_phonenumber === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_role = filter_input(INPUT_POST, 'role', FILTER_CALLBACK, ['options' => 'role_validation']);
        if($filtered_role === FALSE){
            header('Location: http://localhost/Projekt_Beauty_Salon_Php/start.php?U=usersdatabase&A=modifyuserdb');
            exit;
        }
        $filtered_post = ['iduser' => $_POST['iduser'],
                        'firstname' => $filtered_firstname,
                        'firstname2nd' => $filtered_firstname2nd,
                        'lastname' => $filtered_lastname,
                        'lastname2nd' => $filtered_lastname2nd,
                        'idnumber' => $filtered_id,
                        'dateofbirth' => $_POST['dateofbirth'],
                        'username' => $filtered_username,
                        'password' => $filtered_password,
                        'gender' => $filtered_gender,
                        'phonenumber' => $filtered_phonenumber,
                        'role' => $filtered_role];
    }

/* My own filter methods to registration */

/* Must be 1st character uppercase, and no whitespace at all and less then 20 character. */
function name_validation($value){
    $trimed_value = trim($value);
    if(strlen($trimed_value) > 20 || strpos($trimed_value, ' ') > 0)
    {
        return false;
    }
    $trimed_value = strtolower($trimed_value);
    $trimed_value = ucfirst($trimed_value);
    
    if(!('A' <= $trimed_value[0] && $trimed_value[0] <= 'Z'))
    {
        return false;
    }
    $trimed_valueCnt = strlen($trimed_value);
    for ($i=1; $i <$trimed_valueCnt ; $i++) { 
        if(!('a' <= $trimed_value[$i] && $trimed_value[$i] <= 'z'))
        {
            return false;
        }
    }
    
    return $trimed_value;    
}
/* Name could be empty everything else same as normal name validation */
function name_validation2nd($value){
    if(strlen($value) === 0){
        return NULL;
    } else {
        return name_validation($value);
    }  
}
/* first 6 charachters must be number, last 2 must be Letter from A - Z */
function id_validation($value){
    $trimed_value = trim($value);
    if(strlen($trimed_value) !== 8 || strpos($trimed_value, ' ') > 0)
    {
        return false;
    }
    $trimed_value = strtoupper($trimed_value);

    if(!('A' <= $trimed_value[6] && $trimed_value[6] <= 'Z') && !('A' <= $trimed_value[7] && $trimed_value[7] <= 'Z') )
    {
        return false;
    }
    for ($i=1; $i < 6 ; $i++) { 
        if(!('0' <= $trimed_value[$i] && $trimed_value[$i] <= '9'))
        {
            return false;
        }
    }
    
    return $trimed_value;    
}
/* username validation */
/* must be min. 8 char long max 24, can't be null */ 
function username_validation($value){
    $valueCnt = strlen($value);
    if($valueCnt < 8 || $valueCnt > 24)
    {
        return false;
    } else {

        return $value;
    }
}
/* password validation */
/* Accepted: min 8 max 16 */
function password_validation($password){
    $passwordCnt = strlen($password);
    if($passwordCnt < 8 || $passwordCnt > 16)
    {
        return false;
    } else {
        return $password;
    }
}
/* Gender validation */
function gender_validation($value){
    $trimed_value = trim($value);
    if($trimed_value == '1')
    {
        return 'male';
    } elseif( $trimed_value == '2') {
        return 'female';
    }
    else {
        return false;
    }
}
/* Phone number validation 
Accepted: only number, length of character must be 
between 8-10
*/

function phonenumber_validation($value){
    $trimed_value = trim($value);
    $trimed_valueCnt = strlen($trimed_value);
    if(!($trimed_valueCnt >= 8 && $trimed_valueCnt <=16))
    {
        return false;
    } else {
        for ($i=0; $i < $trimed_valueCnt; $i++) { 
            if(!('0' <= $trimed_value[$i] && $trimed_value[$i] <= '9'))
                {
                    return false;
                }
        }
        return $trimed_value;
    }

    
}
/* User role validation
Accepted values are:
    admin,manager,employee,user

*/
function role_validation($value){
    if($value == 'admin'){
        return $value;
    } elseif($value == 'manager'){
        return $value;
    } elseif($value == 'employee'){
        return $value;
    } elseif($value == 'user'){
        return $value;
    } else {
        return false;
    }
}