<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot-password.css">
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif (isset($success)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="newPassword" placeholder="Enter New Password" required>
            <input type="password" name="confirmPassword" placeholder="Confirm New Password" required>
            <button type="submit">Change Password</button>
        </form>

        <a href="../log-in/login.php">Back to Login</a>
    </div>
</body>
</html>
