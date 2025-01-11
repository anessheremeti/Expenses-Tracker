<?php
session_start();
require '../database.php';


if (!isset($_SESSION['username'])) {
    header("Location: ../log-in/login.php");
    exit();
}

$username = $_SESSION['username'];

$queryCheckFirstLogin = "SELECT first_login FROM users WHERE name = ?";
$stmtCheck = $conn->prepare($queryCheckFirstLogin);
$stmtCheck->bind_param("s", $username);
$stmtCheck->execute();
$resultCheck = $stmtCheck->get_result();
$firstLoginRow = $resultCheck->fetch_assoc();


if (is_null($firstLoginRow['first_login'])) {
    $updateFirstLoginQuery = "UPDATE users SET first_login = NOW() WHERE name = ?";
    $stmtUpdate = $conn->prepare($updateFirstLoginQuery);
    $stmtUpdate->bind_param("s", $username);
    $stmtUpdate->execute();
}


$query = "SELECT users.fullname, users.email, users.name, users.first_login
          FROM users
          WHERE users.name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    header("Location: ../log-in/login.php?error=UserNotFound");
    exit();
}


$firstLogin = isset($user['first_login']) ? date("jS F Y, H:i", strtotime($user['first_login'])) : "N/A";


if(isset($_POST['Log_Out'])){
    session_unset();
    
    session_destroy();

    header("Location: /Expenses-Tracker/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="contener">
        <div class="leftcontener">
            <div class="leftcontener-content">
                <div class="leftcontener-llogoja">
                    <img src="https://images.unsplash.com/photo-1535117423468-de0ff056882e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aXNsYW18ZW58MHwxfDB8fHww" alt="">
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
                <div class="profile-header">
                    <img src="../assets/profile.png" alt="Profile Image">
                    <h1><?php echo htmlspecialchars($user['fullname']); ?></h1>
                </div>
                <div class="profile-details">
                    <table>
                        <tr>
                            <th>Username:</th>
                            <td><input type="text" value="<?php echo htmlspecialchars($user['name']); ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><input type="email" value="<?php echo htmlspecialchars($user['email']); ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Budget:</th>
                            <td><input type="number" value="<?php echo htmlspecialchars($user['budget'] ?? 0); ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>First Logged In:</th>
                            <td><input type="text" value="<?php echo htmlspecialchars($firstLogin); ?>" disabled></td>
                        </tr>
                    </table>
                </div>
                <div class="action-buttons">
                    <a href="../edit-profile/edit-profile.php"><button>Edit Profile</button></a>
                    <form action="" method="post">
                        <button class="danger" type="submit" name="Log_Out">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
