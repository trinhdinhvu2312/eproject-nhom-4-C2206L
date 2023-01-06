<?php
require_once('config.php');

function init(){
    initDB();

    query('create table if not exists events (
        id_ev int primary key auto_increment,
        ev_title varchar(50),
        ev_avatar varchar(100),
        ev_start datetime,
        ev_end datetime,
        ev_description varchar(200)
    )');


    query('create table if not exists booking (
        id_booking int primary key auto_increment,
        price varchar(20),
        date datetime,
        id_animal_bk int,
        id_product_bk int,
        id_user int
    )');


    query('create table if not exists animal (
        id_animal int primary key auto_increment,
        service varchar(100),
        name varchar(50),
        avatar varchar(100),
        price varchar(50),
        description varchar(200),
        id_animal_book int
    )');

    query('create table if not exists product (
        id_product int primary key auto_increment,
        avatar varchar(100),
        title varchar(50),
        description varchar(200),
        price varchar(50),
        id_product_book int 
    )');


    query('create table if not exists users (
        id_user int primary key auto_increment,
        name varchar(50),
        email varchar(50),
        phone varchar(20),
        address varchar(50),
        password varchar(50),
        id_user_book int
    )');

    query('create table if not exists admin (
        id_admin int primary key auto_increment,
        name varchar(50),
        password varchar(50),
        admin_status int
    )');

    query('create table if not exists contact (
        id_contact int primary key auto_increment,
        time_create varchar(50),
        name varchar(50),
        email varchar(50),
        address varchar(50),
        comment varchar(200)
    )');

    query('create table if not exists animal_book_info (
        id_a_info int primary key auto_increment,
        book_number int,
        sum_price varchar(50),
        id_book_a int
    )');

    query('create table if not exists product_book_info (
        id_p_info int primary key auto_increment,
        book_number int,
        sum_price varchar(50),
        id_book_p int
    )');

    query('ALTER TABLE animal 
        ADD CONSTRAINT FK_Animal_Book 
        FOREIGN KEY (id_animal_book) REFERENCES animal_book_info(id_a_info)
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');
    
    query('ALTER TABLE animal_book_info 
        ADD CONSTRAINT FK_Animal_Book_INFO 
        FOREIGN KEY (id_book_a) REFERENCES booking(id_booking) 
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');

    query('ALTER TABLE product 
        ADD CONSTRAINT FK_Product_Book 
        FOREIGN KEY (id_product_book) REFERENCES product_book_info(id_p_info) 
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');

    query('ALTER TABLE product_book_info 
        ADD CONSTRAINT FK_Product_Book_INFO 
        FOREIGN KEY (id_book_p) REFERENCES booking(id_booking) 
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');

    query('ALTER TABLE users 
        ADD CONSTRAINT FK_User_Book 
        FOREIGN KEY (id_user_book) REFERENCES booking(id_booking) 
        ON DELETE CASCADE ON UPDATE CASCADE;
    ');

    // query('ALTER TABLE admin AUTO_INCREMENT = 1;
    //     ALTER TABLE users AUTO_INCREMENT = 1;
    //     ALTER TABLE product AUTO_INCREMENT = 1;
    //     ALTER TABLE animal AUTO_INCREMENT = 1;
    //     ALTER TABLE events AUTO_INCREMENT = 1
    // ');
}

function initDB(){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, 'create database if not exists '.DB);

    mysqli_close($conn);
}

function query($sql){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);

    mysqli_close($conn);

}

function queryResult($sql, $isSingle = false){
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
    mysqli_set_charset($conn, 'utf8');

    $resultset = mysqli_query($conn, $sql);
    $data = [];

    while (($row = mysqli_fetch_array($resultset,1)) != null){
            $data[] = $row;
    }

    mysqli_close($conn);

    if($isSingle){
            if (count($data) == 0) return null;

            return $data[0];
    }
    return $data;
}
?>