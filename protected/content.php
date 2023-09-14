<?php

if (!filter_has_var(INPUT_GET, 'U')) {
    
    $unit = START_CONTENT;
}
else{
    $unit = filter_input(INPUT_GET,'U',FILTER_SANITIZE_STRING);
}

$unitRoot = CONTENT_DIR.$unit.'.php';  
if(!file_exists($unitRoot)){
    header('Location: '.BASE_URL);
}
require_once $unitRoot;

if(filter_has_var(INPUT_GET,'A'))
{
    $local_operation = filter_input(INPUT_GET,'A',FILTER_SANITIZE_STRING);
    
    if($local_operation == false){
        header('Location:'.BASE_URL);
    }

    if (!function_exists($local_operation) || !in_array($local_operation, $public_functions)) {
        header('Location:'.BASE_URL);
    }

    $operation = $local_operation;
    $operation();
    
}

?>
