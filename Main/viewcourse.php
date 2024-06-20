<?php
session_start(); 


if (!isset($_SESSION['user']['id'])) {
    header('Location: login.php'); 
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input data
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $user_id = $_SESSION['user']['id']; 


    if (empty($title) || empty($description)) {
        echo "Title and description are required.";
        exit();
    }

    require '../includes/connection.php'; 

   
    $query = "INSERT INTO courses (title, description, user_id) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters and execute query
        mysqli_stmt_bind_param($stmt, 'ssi', $title, $description, $user_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "Course created successfully!";
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt); 
    } else {
        echo "Failed to prepare statement: " . mysqli_error($conn);
    }

    mysqli_close($conn); 
}
?>
        <?php
        session_start(); 

        
        if (isset($_SESSION['user']['id'])) {
            $user_id = $_SESSION['user']['id'];
            
            require '../includes/connection.php'; 

            $query = "SELECT * FROM courses WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'i', $user_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($course = mysqli_fetch_assoc($result)) {
                    echo '<a href="course_detail.php?id=' . htmlspecialchars($course['id']) . '" class="list-group-item list-group-item-action">';
                    echo htmlspecialchars($course['title']);
                    echo '</a>';
                }

                mysqli_stmt_close($stmt); 
            } else {
                echo "Failed to prepare statement: " . mysqli_error($conn);
            }

            mysqli_close($conn); 
            echo "User ID not set in session. Please log in.";
        }
        ?>