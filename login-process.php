<?php
session_start();

require("connect-db.php");
require("database-requests.php");

if(isset($_POST["username"]) && !empty($_POST["username"]) &&
isset($_POST["password"]) && !empty($_POST["password"]) && isset($_POST["computingId"]) && !empty($_POST["computingId"])) {

    echo $_POST['username'];
    echo $_POST['computingId'];
    echo $_POST['password'];

    $name = $_POST["username"];
    $computingId = $_POST['computingId'];
    $password = $_POST['password'];

    $user = getUser($name, $computingId);

    if (empty($user)){
        $success = insertUser($name, $computingId);

        if($success) {
            header("Location: departments.php");
            exit();
        } else {
            header("Location: login.php");
            exit();
        }
    }
    else{
        $_SESSION['name'] = $name;
        $_SESSION['computingId'] = $computingId;
        header("Location: departments.php");
    }
}