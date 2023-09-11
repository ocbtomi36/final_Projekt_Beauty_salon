<?php
/* Route by me U=usersdatabase */
$public_functions = ['alluserdb','oneuserdb','deleteuserdb','modifyuserdb','adduserdb','finaloneuserdb','finaldeleteuserdb','finalmodifyuserdb','addfinaluserdb','updateuser'];

require_once CORE_DIR.'database_manager.php';

function alluserdb(){
    $querry = 'SELECT * FROM user';
    $result = select($querry);
    require_once VIEWS_DIR.'usersdb/listalluserdb.php';
}
function get_parameter(){
    if(!filter_has_var(INPUT_GET,'P')) {
        die('Wrong Parameter');
    }
    $id = filter_input(INPUT_GET,'P',FILTER_VALIDATE_INT);
    if($id === FALSE){
        die('Wrong Parameter');
    }
    return $id;
}
function finaloneuserdb(){
    $id = get_parameter();
    $result = select('SELECT * FROM user where iduser = :iduser', TRUE, ['iduser' => $id]);
    if($result === FALSE){
        die('There is no record to show!');
    }
    require_once VIEWS_DIR.'usersdb/finaloneuser.php';
}

function oneuserdb(){
    $querry = 'SELECT * FROM user';
    $result = select($querry);
    require_once VIEWS_DIR.'usersdb/showoneuser.php';
    
}

function finaldeleteuserdb(){
    $id = get_parameter();
    $success = delete('DELETE FROM user where iduser = :iduser', ['iduser' => $id]);
    if($success === TRUE){
        header('Location:'.BASE_URL.'?U=usersdatabase&A=deleteuserdb');
    } else {
        die('Delete was not successful!');
    }
}

function deleteuserdb(){
    $querry = 'SELECT * FROM user';
    $result = select($querry);
    require_once VIEWS_DIR.'usersdb/deleteuserdb.php';
}

function finalmodifyuserdb(){

    if(!filter_has_var(INPUT_GET,'P')){
        die('Wrong Parameter');
    }
    $id = filter_input(INPUT_GET,'P',FILTER_VALIDATE_INT);
    if($id === FALSE){
        die('Wrong Parameter');
    }
    $result = select('SELECT * FROM user where iduser = :iduser', TRUE, ['iduser' => $id]);
    
    require_once VIEWS_DIR.'usersdb/finalmodifyuserdb.php';

}

function updateuser(){
    require_once FILTERS_DIR.'modifyuserfiltering.php';
    echo '<pre>';
    print_r($filtered_post);
    echo '</pre>';
    $user = $filtered_post['iduser'];
    $firstname = $filtered_post['firstname'];
    $firstname2nd = $filtered_post['firstname2nd'];
    $lastname = $filtered_post['lastname'];
    $lastname2nd = $filtered_post['lastname2nd'];
    $id_card_number = $filtered_post['idnumber'];
    $date_of_birth = $filtered_post['dateofbirth'];
    $username = $filtered_post['username'];
    $password = $filtered_post['password'];
    $gender = $filtered_post['gender'];
    $user_role = $filtered_post['role'];
    $phone_number = $filtered_post['phonenumber'];

    $query = 'UPDATE user SET iduser = :iduser, first_name = :first_name, first_name2nd = :first_name2nd,
    last_name = :last_name, last_name2nd = :last_name2nd, id_card_number = :id_card_number, gender = :gender,
    date_of_birth =:date_of_birth, username = :username, password = :password,
    user_role = :user_role, phone_number = :phone_number WHERE iduser = :iduser';

    $params = array(
        ':iduser' => $user,
        ':first_name' => $firstname,
        ':first_name2nd' => $firstname2nd,
        ':last_name' => $lastname,
        ':last_name2nd' => $lastname2nd,
        ':id_card_number' => $id_card_number,
        ':gender' => $gender,
        ':date_of_birth' => $date_of_birth,
        ':username' => $username,
        ':password' => $password,
        ':user_role' => $user_role,
        ':phone_number' => $phone_number
    );
    $success = insert($query,$params);
    if($success === TRUE){
        header('Location:'.BASE_URL.'');
    } else {
        die('Update was not successful!');
    }
}

function modifyuserdb(){
    $querry = 'SELECT * FROM user';
    $result = select($querry);
    require_once VIEWS_DIR.'usersdb/modifyuserdb.php';
}
function adduserdb(){
    
   require_once VIEWS_DIR.'usersdb/addnewuserdb.php';
}
function addfinaluserdb(){
    require_once FILTERS_DIR.'addformfiltering.php';
    
    $user = $filtered_post['iduser'];
    $firstname = $filtered_post['firstname'];
    $firstname2nd = $filtered_post['firstname2nd'];
    $lastname = $filtered_post['lastname'];
    $lastname2nd = $filtered_post['lastname2nd'];
    $id_card_number = $filtered_post['idnumber'];
    $gender = $filtered_post['gender'];
    $date_of_birth = $filtered_post['dateofbirth'];
    $username = $filtered_post['username'];
    $password = $filtered_post['password'];
    $user_role = $filtered_post['role'];
    $phone_number = $filtered_post['phonenumber'];
    $query = 'INSERT INTO user( iduser, first_name, first_name2nd, last_name, last_name2nd, id_card_number, 
    gender, date_of_birth, username, password, user_role, phone_number) 
    VALUES (:iduser,:first_name, :first_name2nd, :last_name, :last_name2nd, :id_card_number, :gender,
    :date_of_birth, :username,:password,:user_role,:phone_number)';
    $params = array(
        ':iduser' => $user,
        ':first_name' => $firstname,
        ':first_name2nd' => $firstname2nd,
        ':last_name' => $lastname,
        ':last_name2nd' => $lastname2nd,
        ':id_card_number' => $id_card_number,
        ':gender' => $gender,
        ':date_of_birth' => $date_of_birth,
        ':username' => $username,
        ':password' => $password,
        ':user_role' => $user_role,
        ':phone_number' => $phone_number
    );
    $success = insert($query,$params);
    if($success === TRUE){
        header('Location:'.BASE_URL.'');
    } else {
        die('Insert was not successful!');
    }
}
?>