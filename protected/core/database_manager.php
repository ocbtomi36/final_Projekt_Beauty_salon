<?php
// Makes a new connection to the database with PDO, because it can connect to many database, not only mysql, or mariadb.
function get_connection(){
    $dsn = DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST;
    $user = DB_USER;
    $password = DB_PASSWORD;

    $connection = new PDO($dsn,$user,$password);
    $connection->exec("SET NAMES 'utf8'");
    return $connection;
}
// General query for select command(Select * from ...)
function select($query, $row_base = FALSE ,$params = []){
    //Makes a new connection to the database;
    $connection = get_connection();
    // Prepare my query 
    $statement = $connection -> prepare($query);
    // execute my query and retuns a boolean if yes then true;
    $success = $statement-> execute($params);
    // Gives back datas to later work with it 
    $result = [];

    if($success === TRUE ){
        if($row_base === FALSE){
            $result = $statement->fetchAll();
        } 
        else{
            $result = $statement->fetch();
        }
        
    }
    else {
        die('Wrong connection');
    }

    $statement -> closeCursor();
    $connection = NULL;
    return $result;

}
function delete ($query,$params = []){
    $connection = get_connection();
    $statement = $connection -> prepare($query);
    $success = $statement-> execute($params);

    $statement -> closeCursor();
    return $success;
}

function insert ($query,$params = []){
    $connection = get_connection();
    $stmt = $connection -> prepare($query);
    $success = $stmt-> execute($params);
    if ($success) {
        $stmt->closeCursor();
        return true; 
    } else {
        $errorInfo = $stmt->errorInfo();
        return "Hiba történt: " . $errorInfo[2];
    }

}
?>