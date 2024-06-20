<?php

require '../includes/auth.php';


$query = "SELECT c.id, c.title, c.description, uc.progress FROM courses c
          INNER JOIN user_courses uc ON c.id = uc.course_id
          WHERE uc.user_id = ?";
$stmt = mysqli_prepare($link, $query);
$student_id = $_SESSION['user_id']; 
mysqli_stmt_bind_param($stmt, 'i', $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

