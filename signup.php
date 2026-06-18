<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database connection
require_once 'config/database.php';

$error_message = "";
$success_message = "";

// Handle signup form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    // Get and sanitize inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);
    $university = mysqli_real_escape_string($conn, $_POST['university']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = (int)$_POST['age'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation array
    $errors = [];

    // Check required fields
    if (empty($first_name) || empty($last_name) || empty($phone) || empty($id_number) || 
        empty($university) || empty($email) || empty($age) || empty($gender) || 
        empty($password) || empty($confirm_password)) {
        $errors[] = 'All fields are required';
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    // Validate age
    if ($age < 18 || $age > 100) {
        $errors[] = 'Age must be between 18 and 100';
    }

    // Validate gender
    if (!in_array($gender, ['male', 'female'])) {
        $errors[] = 'Invalid gender selection';
    }

    // Validate password
    if (strlen($password) < 6) {
        $errors[] = 'Password must be at least 6 characters';
    }

    // Check password match
    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match';
    }

    // Check if email already exists
    if (empty($errors)) {
        $check_email = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $check_email);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = 'Email already registered';
        }
        mysqli_stmt_close($stmt);
    }

    // Check if ID number already exists
    if (empty($errors)) {
        $check_id = "SELECT id FROM users WHERE id_number = ?";
        $stmt = mysqli_prepare($conn, $check_id);
        mysqli_stmt_bind_param($stmt, "s", $id_number);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) > 0) {
            $errors[] = 'ID number already registered';
        }
        mysqli_stmt_close($stmt);
    }

    // If there are errors, store them
    if (!empty($errors)) {
        $error_message = implode('; ', $errors);
    } else {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $sql = "INSERT INTO users (first_name, last_name, phone, id_number, university, email, age, gender, password, role) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'user')";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssiss", 
            $first_name, $last_name, $phone, $id_number, $university, $email, $age, $gender, $hashed_password
        );

        if (mysqli_stmt_execute($stmt)) {
            $success_message = "Account created successfully! Please login.";
        } else {
            $error_message = "Registration failed. Please try again.";
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
    <title>Sign Up</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="geolink-signup-container">
        <h1 class="geolink-main-title">GeoLink</h1>
        <h2 class="geolink-sub-title">Graduate Sign Up</h2>

        <!-- Display error message -->
        <?php if (!empty($error_message)): ?>
            <div class="geolink-error-message">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <!-- Display success message -->
        <?php if (!empty($success_message)): ?>
            <div class="geolink-success-message">
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" id="geolink-signupForm">
            <!--First Name Last Name Row-->
            <div class="geolink-form-row">
                <div class="geolink-form-group">
                    <label for="first_name">First Name <span class="geolink-required">*</span></label>
                    <input type="text" id="first_name" name="first_name" class="geolink-input-text" placeholder="Enter first name" required>
                </div>

                <div class="geolink-form-group">
                    <label for="last_name">Last Name <span class="geolink-required">*</span></label>
                    <input type="text" id="last_name" name="last_name" class="geolink-input-text" placeholder="Enter last name" required>
                </div>
            </div>

            <!--Phone and ID-->
            <div class="geolink-form-row">
                <div class="geolink-form-group">
                    <label for="phone">Phone Number <span class="geolink-required">*</span></label>
                    <input type="text" id="phone" name="phone" class="geolink-input-text" placeholder="Enter phone number" required>
                </div>

                <div class="geolink-form-group">
                    <label for="id_number">ID Number <span class="geolink-required">*</span></label>
                    <input type="text" id="id_number" name="id_number" class="geolink-input-text" placeholder="Enter ID number" required>
                </div>
            </div>

            <!-- University & Email -->
            <div class="geolink-form-row">
                <div class="geolink-form-group">
                    <label for="university">University/College <span class="geolink-required">*</span></label>
                    <input type="text" id="university" name="university" class="geolink-input-text" placeholder="Enter university name" required>
                </div>

                <div class="geolink-form-group">
                    <label for="email">Email Address <span class="geolink-required">*</span></label>
                    <input type="email" id="email" name="email" class="geolink-input-email" placeholder="Enter email address" required>
                </div>
            </div>

            <!-- Age & Gender -->
            <div class="geolink-form-row">
                <div class="geolink-form-group">
                    <label for="age">Age <span class="geolink-required">*</span></label>
                    <input type="number" id="age" name="age" class="geolink-input-number" placeholder="Enter age" min="18" max="100" required>
                </div>

                <div class="geolink-form-group">
                    <label>Gender <span class="geolink-required">*</span></label>
                    <div class="geolink-radio-group">
                        <div class="geolink-radio-option">
                            <input type="radio" id="male" name="gender" value="male" required>
                            <label for="male">Male</label>
                        </div>
                        <div class="geolink-radio-option">
                            <input type="radio" id="female" name="gender" value="female" required>
                            <label for="female">Female</label>
                        </div>
                    </div>
                    <small class="geolink-radio-hint">Please select one option</small>
                </div>
            </div>

            <!-- Password  and confirmation-->
            <div class="geolink-form-row">
                <div class="geolink-form-group">
                    <label for="password">Create Password <span class="geolink-required">*</span></label>
                    <input type="password" id="password" name="password" class="geolink-input-password" placeholder="Create a password" required minlength="6">
                </div>

                <div class="geolink-form-group">
                    <label for="confirm_password">Confirm Password <span class="geolink-required">*</span></label>
                    <input type="password" id="confirm_password" name="confirm_password" class="geolink-input-password" placeholder="Confirm password" required>
                </div>
            </div>

            <button type="submit" name="signup" class="geolink-btn-signup">Sign Up</button>
        </form>

        <div class="geolink-bottom-link">
            Already signed up? <a href="login.php">Login!</a>
        </div>
    </div>

   
</body>
</html>