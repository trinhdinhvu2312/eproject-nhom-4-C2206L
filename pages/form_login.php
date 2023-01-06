<?php
    if(!empty($_POST)){
        require_once ('dbhelper.php');

        $masv = $_POST['masv'];
        $pwd = $_POST['pwd'];

        $sql = "SELECT * from users WHERE masv = '$masv' and password = '$pwd'";
        $user = queryResult($sql, true);

        if($user != null){
            $_SESSION['user'] = $user;
            header('Location: navbar.php');
            die();
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Must Register First")';
            echo '</script>';
        }
    }
?>