<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - RAMBA VI Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit();
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    require_once 'db.php';

    $username = trim($conn->real_escape_string($_POST['username']));
    $password = $_POST['password']; 

    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Fetch user from database
        $sql    = "SELECT * FROM admin_users WHERE username = '$username' LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify password against hash stored in database
            if (password_verify($password, $user['password'])) {
                // Login successful
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id']        = $user['id'];
                $_SESSION['admin_username']  = $user['username'];
                $_SESSION['admin_name']      = $user['full_name'];
                $_SESSION['admin_role']      = $user['role'];

                header('Location: dashboard.php');
                exit();
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            $error_message = "Invalid username or password.";
        }
        $conn->close();
    }
}
?>

<div class="login-wrapper">
    <div class="login-card">
        <div class="form-header">
            <h2>🔐 Admin Login</h2>
            <p>RAMBA VI Hotel Staff Portal</p>
        </div>
        <div class="form-body">

            <?php if (!empty($error_message)): ?>
            <div class="alert alert-error">❌ <?= $error_message ?></div>
            <?php endif; ?>

            <?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
            <div class="alert alert-success">✅ You have been logged out successfully.</div>
            <?php endif; ?>

            <div class="alert alert-info" style="margin-bottom:24px;">
                <strong>Default Credentials:</strong><br>
                Username: <strong>admin</strong> | Password: <strong>admin123</strong>
            </div>

            <form action="login.php" method="POST">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"
                           placeholder="Enter your username"
                           value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>"
                           required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password"
                           placeholder="Enter your password"
                           required>
                </div>

                <div class="form-submit">
                    <button type="submit" name="login" class="btn btn-primary" style="width:100%;">
                        🔑 Login to Dashboard
                    </button>
                </div>

            </form>

            <div style="text-align:center;margin-top:24px;">
                <a href="index.php" style="font-family:var(--font-ui);font-size:0.85rem;color:var(--chocolate-mid);">
                    ← Back to Hotel Website
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
