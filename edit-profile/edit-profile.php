<?php
session_start();
require '../database.php';


if (!isset($_SESSION['username'])) {
    header("Location: ../log-in/login.php");
    exit();
}

$username = $_SESSION['username'];


$sql = "SELECT * FROM users WHERE name='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}


if (isset($_POST['updateProfile'])) {
    $newUsername = trim($_POST['username']);
    $newEmail = trim($_POST['email']);


    $updateQuery = "UPDATE users SET name='$newUsername', email='$newEmail' WHERE name='$username'";

    if ($conn->query($updateQuery) === TRUE) {
        $_SESSION['username'] = $newUsername; 
        header("Location: ../profile/profile.php"); 
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="edit-profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="contener">

        <div class="leftcontener">
            <div class="leftcontener-content">
            <div class="leftcontener-llogoja">
                    <img src="../assets/img/logoo.png" alt="">
                </div>
                <div class="leftcontener-Profili">
                    <i class="fas fa-user"></i><span>Profile</span>
                </div>
                <a href="../dashbord/dashbord.php" class="link">
                    <div class="leftcontener-Boxheti">
                        <i class="fas fa-wallet"></i><span>Wallet</span>
                    </div>
                </a>
                <a href="../Transcation/Transcation.php" class="link">
                    <div class="leftcontener-transactionet">
                        <i class="fas fa-exchange-alt"></i><span>Transactions</span>
                    </div>
                </a>
                <a href="../user-reports/report.php" class="link">
                    <div class="leftcontener-raporti">
                        <i class="fas fa-chart-line"></i><span>Report</span>
                    </div>
                </a>
            </div>
        </div>

       
        <div class="right-container">
            <div class="rightcontainer-content">
                <h2>Edit Profile</h2>
                <form action="edit-profile.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                    </div>
                    <button type="submit" name="updateProfile" class="btn">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
