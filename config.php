<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "bootstrap-challenge";

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    }catch(Exception $e){
        echo "error ". $e->getMessage();
    }
?>