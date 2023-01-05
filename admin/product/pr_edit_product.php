<?php
$id_product = $title = $price = $description = $avatar = $fileToUpload = $image = "";
if (!empty($_POST)) {
    require_once('../dbhelper.php');

    $id_product  = $_POST['id_product'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES["fileToUpload"]["name"];

    if($image != ""){
        include 'uploadfile.php';
        $sql = "Update product set title='$title', price='$price', description='$description', avatar='$avatar' where id_product ='$id_product'";
        query($sql);
        header('Location: list_product.php');
        
    }else{

        $sql = "Update product set title='$title', price='$price', description='$description' where id_product ='$id_product'";
        query($sql);
        header('Location: list_product.php');
    }
}

