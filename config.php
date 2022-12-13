<?php

    //host
    $host= "localhost";

    //database name
    $dbname="auth-sys";

    //username
    $user= "root";

    //password
    $pass="";

    $conn =new PDO("mysql:host=$host;dbname=$dbname;", $user, $pass);

    //check if connection is successfull

    //if($conn == true){
    //    echo "it is working fine";
    //}

    //else{
    //    echo "Error connection";
    //}
    
?>