<?php
// Include authentication check and any necessary dependencies
require '../includes/auth.php';

// Retrieve student's enrolled courses
$query = "SELECT c.id, c.title, c.description, uc.progress FROM courses c
          INNER JOIN user_courses uc ON c.id = uc.course_id
          WHERE uc.user_id = ?";
$stmt = mysqli_prepare($link, $query);
$student_id = $_SESSION['user_id']; // Assuming user_id is stored in session after login
mysqli_stmt_bind_param($stmt, 'i', $student_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css"> <!-- Your custom CSS -->
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <!-- Navbar content -->
</nav>

<!-- Main Content -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Sidebar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dashboard</h5>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="dashboard.php">My Courses</a></li>
                            <!-- Add more options as needed (e.g., profile, grades, etc.) -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Course Listing -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">My Courses</h5>
                        <div class="list-group">
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <a href="course.php?id=<?php echo $row['id']; ?>" class="list-group-item list-group-item-action">
                                    <h5 class="mb-1"><?php echo htmlspecialchars($row['title']); ?></h5>
                                    <p class="mb-1"><?php echo htmlspecialchars($row['description']); ?></p>
                                    <small>Progress: <?php echo $row['progress']; ?>%</small>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and any additional scripts -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
