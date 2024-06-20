<?php
require 'connection.php';


function register($name, $email, $password, $role) {
    global $link;

       $hash = password_hash($password, PASSWORD_BCRYPT);

       $stmt = mysqli_prepare($link, 'INSERT INTO users (name, email, password, usertype) VALUES (?, ?, ?, ?)');
    
    
    if (!$stmt) {
        die('mysqli_prepare failed: ' . mysqli_error($link));
    }

   
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $hash, $role);

   
    $result = mysqli_stmt_execute($stmt);

   
    if ($result) {
        return true; 
    } else {
        return false; 
    }
}


function login($email, $password, $role) {
    global $link;
    
    $stmt = mysqli_prepare($link, 'SELECT * FROM users WHERE email = ? AND usertype = ?');
    if (!$stmt) {
        return false; 
    }
    
    mysqli_stmt_bind_param($stmt, 'ss', $email, $role);
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        return true;
    }

    return false; 
}



function logout() {
   
    session_start();
    session_unset();

    session_destroy();
}

function authenticate() {
   
    session_start();
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    return false;
}
