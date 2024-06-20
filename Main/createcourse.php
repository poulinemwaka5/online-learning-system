<?php
session_start(); 

if (!isset($_SESSION['user']['id'])) {
    header('Location: login.php'); 
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $user_id = $_SESSION['user']['id']; // Get user ID from session

   
    if (empty($title) || empty($description)) {
        echo "Title and description are required.";
        exit();
    }

 
    require '../includes/connection.php'; 

    
    $query = "INSERT INTO courses (title, description, user_id) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $query);

    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, 'ssi', $title, $description, $user_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Course created successfully!";
        } else {
            echo "Error executing query: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt); 
    } else {
        echo "Failed to prepare statement: " . mysqli_error($link);
    }

    mysqli_close($link);
}
?>
