<?php
   $service = $name = $price = $description = $avatar = $fileToUpload = "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $service = $_POST['service'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $fileToUpload = $_POST['fileToUpload'];

        include 'uploadfile.php'; 

        $sql = "INSERT INTO animal(id_animal, service, name, price, avatar, description) values('','$service', '$name', '$price', '$avatar', '$description')";
        query($sql);
    }

    header('Location: list_animal.php');
?>