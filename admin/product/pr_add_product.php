<?php
   $title = $price = $description = $avatar = $fileToUpload = "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $title = $_POST['title'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $fileToUpload = $_POST['fileToUpload'];

        include 'uploadfile.php'; 

        $sql = "INSERT INTO product(id_product, title, price, avatar, description) values('', '$title', '$price', '$avatar', '$description')";
        query($sql);
    }

    header('Location: list_product.php');
?>