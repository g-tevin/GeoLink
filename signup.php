<?php

session_start();

//require_once 'config/database.php';

$error_message = "";
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $phone = trim($_POST['phone']);
    $id_number = trim($_POST['id_number']);
    $university = trim($_POST['university']);
    $email = trim($_POST['email']);
    $age = (int) $_POST['age'];
    $gender = trim($_POST['gender']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (
        empty($first_name) ||
        empty($last_name) ||
        empty($phone) ||
        empty($id_number) ||
        empty($university) ||
        empty($email) ||
        empty($age) ||
        empty($gender) ||
        empty($password) ||
        empty($confirm_password)
    ) {
        $errors[] = "All fields are required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if ($age < 18 || $age > 100) {
        $errors[] = "Age must be between 18 and 100";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    try {

        $stmt = $conn->prepare(
            "SELECT id FROM users WHERE email = :email"
        );

        $stmt->execute([
            'email' => $email
        ]);

        if ($stmt->fetch()) {
            $errors[] = "Email already registered";
        }

        $stmt = $conn->prepare(
            "SELECT id FROM users WHERE id_number = :id_number"
        );

        $stmt->execute([
            'id_number' => $id_number
        ]);

        if ($stmt->fetch()) {
            $errors[] = "ID number already registered";
        }

        if (empty($errors)) {

            $hashed_password =
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );

            $sql = "
            INSERT INTO users
            (
                first_name,
                last_name,
                phone,
                id_number,
                university,
                email,
                age,
                gender,
                password,
                role
            )
            VALUES
            (
                :first_name,
                :last_name,
                :phone,
                :id_number,
                :university,
                :email,
                :age,
                :gender,
                :password,
                'user'
            )";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $phone,
                'id_number' => $id_number,
                'university' => $university,
                'email' => $email,
                'age' => $age,
                'gender' => $gender,
                'password' => $hashed_password
            ]);

            $success_message =
                "Account created successfully!";

        }

    } catch (PDOException $e) {

        $errors[] = "Database error occurred.";

    }

    if (!empty($errors)) {
        $error_message = implode("<br>", $errors);
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