<?php
session_start();
require '../includes/auth.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    if (login($email, $password, $role)) {
        session_start();
        $_SESSION['user'] = [
            'email' => $email,
            'role' => $role
        ];

           
        if ($role === 'student') {
            echo "Redirecting to student dashboard...";
            header('Location: studentDashboard.php');
            exit();
        } elseif ($role === 'instructor') {
            echo "Redirecting to instructor dashboard...";
            header('Location: instructordashboard.php');
            exit();
        } elseif ($role === 'approver') {
            echo "Redirecting to approver dashboard...";
            header('Location: approverdashboard.php');
            exit();
        } else {
            echo "Redirecting to default dashboard...";
            header('Location: dashboard.php');
            exit();
        }
        
        exit();
    } else {
        echo "Login failed! Please check your email, password, and role."; 
    }
}

?>
