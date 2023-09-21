<?php
    $servername = "localhost";
    $username = "id21286551_wp_5c196333257440f8dce5e9e39b4b0068";
    $password = "tmKzjfBs[7mY=f>r";
    try{
        $options=array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $conn = new PDO("mysql:host=$servername;dbname=id21286551_wp_b06776a4c854cb0411904ed1671acd14", $username, $password, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?>