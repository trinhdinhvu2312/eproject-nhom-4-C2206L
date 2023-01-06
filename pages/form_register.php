<?php
    if(!empty($_POST)){
        require_once ('dbhelper.php');

        $id_users = $_POST['id_users'];
        $masv = $_POST['masv'];
        $username = $_POST['username'];
        $pwd = $_POST['pwd'];

        $sql = "INSERT INTO users (id_users, masv, username, password) values('$id_users','$masv','$username','$pwd')";
        query($sql);

    }
?>
