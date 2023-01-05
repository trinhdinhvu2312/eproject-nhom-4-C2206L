<?php
$id_animal = $service = $name = $price = $description = $avatar = $image = $fileToUpload =  "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id_animal = $_POST['id_animal'];
    $service = $_POST['service'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES["fileToUpload"]["name"];

    if($image != ""){
        include 'uploadfile.php';

        $sql = "Update animal set service='$service', name='$name', price='$price', description='$description', avatar='$avatar' where id_animal='$id_animal'";
        query($sql);
        header('Location: list_animal.php');
    }
    else{
        $sql = "Update animal set service='$service', name='$name', price='$price', description='$description' where id_animal='$id_animal'";
        query($sql);
        header('Location: list_animal.php');
    }

}

