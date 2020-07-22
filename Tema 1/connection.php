<?php
$server_name = "localhost";
$username = "";
$password = "";
$database_name = "";

try {
    $conn = new PDO("mysql:host=$server_name;dbname=$database_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function text_validation($val){
    $val = trim($val);
    $val = htmlspecialchars($val);
    if(preg_match("/^[a-zA-Z,.?! ]*$/",$val)){
        return $val;
    }else{
        return null;
    }
}

function year_validation($val){
    $val = trim($val);
    $val = htmlspecialchars($val);
    if(preg_match("/^[0-9]{4}$/",$val)){
        return $val;
    }else{
        return null;
    }
}
