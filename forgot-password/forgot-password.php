<?php
require '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $newPassword = trim($_POST['newPassword']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if (empty($username) || empty($newPassword) || empty($confirmPassword)) {
        $error = "All fields are required!";
    } elseif (strlen($newPassword) <= 8) {
        $error = "Password must be at least 8 characters long!";
    } elseif ($newPassword !== $confirmPassword) {
        $error = "Passwords do not match!";
    } else {

        $stmt = $conn->prepare("UPDATE users SET password=? WHERE name=?");
        $stmt->bind_param("ss", $newPassword, $username);
        if ($stmt->execute()) {
            $success = "Password updated successfully!";
            
        } else {
            $error = "Error updating password: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

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

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif (!empty($success)): ?>
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
