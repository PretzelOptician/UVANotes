<?php
session_start();

require("connect-db.php");
require("database-requests.php");

if(isset($_POST["username"]) && !empty($_POST["username"]) &&
isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["computingId"]) && !empty($_POST["computingId"])) {

    $name = $_POST["username"];
    $computingId = $_POST['computingId'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $user = getUser($name, $computingId, $hashed_password);

    if (empty($user)){
        $success = insertUser($name, $computingId, $hashed_password);

        if($success) {
            header("Location: departments.php");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
    }
    else{
        if(password_verify($_POST["password"], $user[0]["password"]) && $_POST['username'] === $user[0]['name']){
            $_SESSION['name'] = $name;
            $_SESSION['computingId'] = $computingId;
            header("Location: departments.php");
        }
        else{
            $_SESSION['errorMessage'] = "Incorrect computing ID or password";
            header("Location: login.php");
        }
    }
}