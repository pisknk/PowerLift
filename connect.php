<?php

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'PowerLift');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into users(firstName, lastName, email, password) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
        $stmt->execute();
        echo "Registration Successful...";
        $stmt->close();
        $conn->close();
    }

?>