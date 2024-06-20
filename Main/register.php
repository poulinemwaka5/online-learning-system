<?php
require '../includes/auth.php';

$message = ''; // Variable to store message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Retrieve selected role from form

    if (register($name, $email, $password, $role)) {
        $message = "Registration successful!"; // Set success message
    } else {
        $message = "Registration failed!"; // Set failure message
    }
}
?>



</body>
</html>
