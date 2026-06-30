<?php

session_start();

if (!isset($_SESSION['splash_shown'])) {
    $_SESSION['splash_shown'] = true;
    header('Location: splash.php');
    exit();
}

//require_once 'config/database.php';

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {

        $error_message = "Please fill in all fields";

    } else {

        try {

            $sql = "
                SELECT id, email, password, role
                FROM users
                WHERE email = :email
            ";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                'email' => $email
            ]);

            $user = $stmt->fetch();

            if ($user) {

                if (password_verify($password, $user['password'])) {

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['login_time'] = time();

                    header("Location: home.php");
                    exit();

                } else {

                    $error_message = "Invalid password";

                }

            } else {
                $error_message = "User not found";
            }

        } catch (PDOException $e) {

            $error_message = "Login failed";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo htmlspecialchars($app_name); ?></title>
    <link rel="stylesheet" href="assets/style.css?v=<?php echo $timestamp; ?>">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta name="description" content="Login to <?php echo htmlspecialchars($app_name); ?>">
</head>
<body>
    <div class="geolink-login-container">
        <h1 class="geolink-main-title"><?php echo htmlspecialchars($app_name); ?></h1> 
        
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