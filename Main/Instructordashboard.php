
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WELCOME TO E&M TECH ONLINE LEARNING</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container py-5">
    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="create_course.php" class="list-group-item list-group-item-action">Add Course</a>
                <a href="manage_courses.php" class="list-group-item list-group-item-action">Manage Courses</a>
                <a href="view_students.php" class="list-group-item list-group-item-action">View Students</a>
                <!-- Add more links as needed -->
            </div>
        </div>
        
        <!-- Main Content Section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create New Course</h5>
                    <!-- Form to create a new course -->
                    <form method="POST" action="createcourse.php">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Course</button>
                    </form>
                </div>
            </div>
            <div class="mt-4">
    <h5>Your Courses</h5>
    <div class="list-group">

    
    </div>
</div>




</body>
</html>
