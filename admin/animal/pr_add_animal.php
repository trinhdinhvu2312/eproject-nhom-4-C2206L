<?php
   $service = $name = $price = $description = $avatar = $fileToUpload =  $quantity = $status = $cartegory= "";
    if(!empty($_POST)){
        require_once ('../dbhelper.php');

        $service = $_POST['service'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $avatar = $_POST['avatar'];
        $fileToUpload = $_POST['fileToUpload'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $cartegory = $_POST['cartegory'];
        
        include 'uploadfile.php'; 

        $sql = "INSERT INTO animal(id_animal, service, name, price, avatar, description, quantity, status, id_mn_animal) 
        values('','$service', '$name', '$price', '$avatar', '$description', '$quantity', '$status', '$cartegory')";
        query($sql);
    }

    header('Location: list_animal.php');
?>