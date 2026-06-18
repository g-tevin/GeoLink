<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
require_once 'config/database.php';

$error_message = "";
$success_message = "";

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error_message = "Please fill in all fields";
    } else {
        // Prepare SQL query to prevent SQL injection
        $sql = "SELECT id, email, password, role FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($user = mysqli_fetch_assoc($result)) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                
                // Redirect to dashboard
                header("Location: dashboard.php");
                exit();
            } else {
                $error_message = "Invalid password!";
            }
        } else {
            $error_message = "User not found!";
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GeoLink</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="geolink-login-container">
        <h1 class="geolink-main-title">GeoLink</h1>
        
        <?php if (!empty($error_message)): ?>
            <div class="geolink-error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success']) && !empty($_GET['success'])): ?>
            <div class="geolink-success-message">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error']) && !empty($_GET['error'])): ?>
            <div class="geolink-error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="geolink-form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="geolink-input-email" placeholder="Enter your email" required>
            </div>

            <div class="geolink-form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="geolink-input-password" placeholder="Enter your password" required>
            </div>

            <button type="submit" name="login" class="geolink-btn-login">Login</button>
        </form>

        <div class="geolink-bottom-links">
            <a href="forgot_password.php" class="geolink-forgot-password">Forgot Password?</a>
            <span class="geolink-signup-link">Don't have an account? <a href="signup.php">Sign Up</a></span>
        </div>
    </div>
</body>
</html>