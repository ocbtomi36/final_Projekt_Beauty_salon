
<?php

if (!array_key_exists('submit',$_POST) || $_POST['submit'] != 'Send'){
    echo 'Wrong';
}
/* file validation */
$fileSize = $_FILES['file']['size'];
if($fileSize > (1024 * 1024)){
    echo 'Túl nagy fájl';
    return BASE_URL.'start.php';
}
/* Files upload is valid if extentions are txt or xlsx*/
$extensions = ['txt','xlsx','xls'];
$fileName = $_FILES['file']['name'];
$fileNameParts = explode('.',$fileName);
$fileExtension = end($fileNameParts);
$fileExtension = strtolower($fileExtension);

if(!in_array($fileExtension, $extensions)){
    echo 'Wrong extension';
    return BASE_URL.'start.php';
}

$file_source = $_FILES['file']['tmp_name'];
$destSource = './uploads/'.$fileName;

if(!move_uploaded_file($file_source,$destSource)){
    echo 'Wrong file moving!';
}
echo 'Uploading OK';

?>