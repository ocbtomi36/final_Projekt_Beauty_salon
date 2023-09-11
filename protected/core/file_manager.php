<?php

function file_get_content($file_path, $delimeter){

    $file = fopen($file_path, "r");

    $header_line = fgets($file);
    $header_fields = explode($delimeter,$header_line);

    $rows = [];

    while(!feof($file)){
        $line = fgets($file);
        $fields = explode($delimeter, $line);

        $cnt = count($fields);
        $temp = [];
        for ($i=0; $i <$cnt ; $i++) { 
            $key = $header_fields[$i];
            $value = $fields[$i];
            $temp[$key] = $value;
        }
        $rows[] = $temp;
    }
    fclose($file);
}
function get_file_row($file_path, $delimeter, $filter){
    $file = fopen($file_path, "r");

    $header_line = fgets($file);
    $header_fields = explode($delimeter,$header_line);

    $row = NULL;

    while(!feof($file)){
        $line = fgets($file);
        $fields = explode($delimeter, $line);

        $cnt = count($fields);
        $temp = [];
        for ($i=0; $i <$cnt ; $i++) { 
            $key = $header_fields[$i];
            $value = $fields[$i];
            $temp[$key] = $value;
        }
        $correct = true;
        foreach ($filter as $name => $value) {
            if($temp[$name] !== $value){
                $correct = false;
                break;
            }
        }

        if ($correct) {
            $row = $temp;
            break;
        }
    }
    fclose($file);
    return $row;


}

?>