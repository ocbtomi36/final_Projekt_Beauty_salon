<?php

$public_functions = ['listalluser','detailsuser','deleteuser','modifyuser','addnewuser'];

function listalluser() {
    echo 'Users.csv file megnyitása';
    echo '</br>';
    $file_path = FILES_DIR.'users.csv';
    $file = fopen($file_path,"r") or die("file doesn't exsit");
    
    $label = fgets($file);
    $label = explode(';',$label);

    $rows = [];
    while(!feof($file)){
        $row = fgets($file);
        $rows[] = explode(';', $row);
    }
    fclose($file);
    require_once VIEWS_DIR.'users/alluser.php';
}
function detailsuser(){
    
    if(!filter_has_var(INPUT_GET, 'P')){
        echo 'Error';
        die();
    }
    $filtered_id = filter_input(INPUT_GET, 'P', FILTER_CALLBACK, ['options' => 'id_validation']);
    if ($filtered_id === FALSE) {
        echo 'Az adat létezik, de nem helyes';
        die();
    }

    $file_path = FILES_DIR.'users.csv';
    $delimeter = ';';
    $file = fopen($file_path,"r") or die("file doesn't exsit");
    require_once CORE_DIR.'file_manager.php';
    $result = get_file_row($file_path,$delimeter,['idnumber' => $filtered_id]);

    if($result == NULL){
        echo 'No user founded.';
        die();
    }
    require_once VIEWS_DIR.'users/details.php';
}
function deleteuser() {
    echo 'Under Construction';
}
function modifyuser() {
    echo 'Under Construction';
}
function addnewuser() {
    if(!filter_has_var(INPUT_POST, 'send') || 
    filter_input(INPUT_POST,'send',FILTER_SANITIZE_STRING) != 'send'){
        include USERS_DIR.'addnewuser.php';
    }
    else {
        echo 'Data filter under construction';
        $filtered_firstname = filter_input(INPUT_POST, 'firstname', FILTER_CALLBACK, ['options' => 'name_validation']);
        $filtered_lastname = filter_input(INPUT_POST, 'lastname', FILTER_CALLBACK, ['options' => 'name_validation']);
        $filtered_firstname2nd = filter_input(INPUT_POST, 'firstname2nd', FILTER_CALLBACK, ['options' => 'name_validation2nd']);
        $filtered_lastname2nd = filter_input(INPUT_POST, 'lastname2nd', FILTER_CALLBACK, ['options' => 'name_validation2nd']);
        $filtered_id = filter_input(INPUT_POST, 'idnumber', FILTER_CALLBACK, ['options' => 'id_validation']);
        $filtered_dateOfBirth = '?';
        $filtered_placeofbirth = filter_input(INPUT_POST, 'placeofbirth', FILTER_CALLBACK, ['options' => 'name_validation']);
        $filtered_email = filter_input(INPUT_POST, 'email', FILTER_CALLBACK, ['options' => 'email_validation']);
        $filtered_password = filter_input(INPUT_POST, 'password', FILTER_CALLBACK, ['options' => 'password_validation']);
        $filtered_sex = filter_input(INPUT_POST, 'sex', FILTER_CALLBACK, ['options' => 'sex_validation']);
        $filtered_phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_CALLBACK, ['options' => 'phonenumber_validation']);
        $filtered_role = filter_input(INPUT_POST, 'role', FILTER_CALLBACK, ['options' => 'role_validation']);
        $filtered_city = filter_input(INPUT_POST, 'city', FILTER_CALLBACK, ['options' => 'name_validation']);
        $filtered_zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_CALLBACK, ['options' => 'zipcode_validation']);
        $filtered_street = filter_input(INPUT_POST, 'street', FILTER_CALLBACK, ['options' => 'name_validation']);
        $filtered_housenumber = filter_input(INPUT_POST, 'housenumber', FILTER_CALLBACK, ['options' => 'housenumber_validation']);
    }
    
}

/* Make an own filter methods to Registration */
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
    if(strlen($value) == 0){
        return $value;
    } else {
        name_validation($value);
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
/* E-mail validation accepted only valid e-mail */
function email_validation($value){
    $trimed_value = trim($value);
    if (filter_var($trimed_value, FILTER_VALIDATE_EMAIL)) {
        return $trimed_value;
    } else {
        return false;
    }
}
/* password validation */

function password_validation($password){
    $passwordCnt = strlen($password);
    if($passwordCnt < 8 || $passwordCnt > 16)
    {
        return false;
    } else {
        return $password;
    }
}
/* Sex validation */
function sex_validation($value){
    $trimed_value = trim($value);
    if($trimed_value == '1' || $trimed_value == '2')
    {
        return $value;
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

values must be 1,2,3,4

*/

function role_validation($value){
    $trimed_value = trim($value);
    if($trimed_value == '1' || $trimed_value == '2' || $trimed_value == '3' || $trimed_value == '4')
    {
        return $value;
    }
    else {
        return false;
    }
}
/* Zip code must be contains 5 numbers no whitespaceses at all */
function zipcode_validation($value){
    $trimed_value = trim($value);
    $trimed_valueCnt = strlen($trimed_value);
    if($trimed_valueCnt != 5)
    {
        return false;
    } else {
        for ($i=0; $i < 5; $i++) { 
            if(!('0' <= $trimed_value[$i] && $trimed_value[$i] <= '9'))
                {
                    return false;
                }
        }
        return $trimed_value;
    }
    
}
/* House number validation 
can be max 5 character long 
can contains whitespace between characters.
*/
function housenumber_validation($value){
    $trimed_value = trim($value);
    $trimed_valueCnt = strlen($trimed_value);
    if($trimed_valueCnt < 1 && $trimed_valueCnt > 5){
        return false;
    }
    else {
        return $trimed_value;
    }
}
?>