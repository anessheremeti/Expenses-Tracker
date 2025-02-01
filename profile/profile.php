<?php
// Prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

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
          FROM users WHERE users.name = ?";
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

$userIdQuery = "SELECT id FROM users WHERE name = ?";
$stmtUserId = $conn->prepare($userIdQuery);
$stmtUserId->bind_param("s", $username);
$stmtUserId->execute();
$resultUserId = $stmtUserId->get_result();
$userRow = $resultUserId->fetch_assoc();
$userId = $userRow['id'];

$incomeQuery = "SELECT SUM(budget.Amount) AS totalIncome FROM budget WHERE budget.user = ?";
$stmtIncome = $conn->prepare($incomeQuery);
$stmtIncome->bind_param("i", $userId);
$stmtIncome->execute();
$resultIncome = $stmtIncome->get_result();
$incomeRow = $resultIncome->fetch_assoc();
$totalIncome = $incomeRow['totalIncome'] ?? 0;

$expensesQuery = "SELECT SUM(items.Amount) AS totalExpenses FROM items WHERE items.user = ?";
$stmtExpenses = $conn->prepare($expensesQuery);
$stmtExpenses->bind_param("i", $userId);
$stmtExpenses->execute();
$resultExpenses = $stmtExpenses->get_result();
$expensesRow = $resultExpenses->fetch_assoc();
$totalExpenses = $expensesRow['totalExpenses'] ?? 0;

$currentBalance = $totalIncome - $totalExpenses;

if (isset($_POST['Log_Out'])) {
    session_unset();
    session_destroy();

    // Ensure session cookie is removed
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
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
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="profile.css">
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
                            <td><input type="number" value="<?php echo htmlspecialchars($currentBalance); ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>First Logged In:</th>
                            <td><input type="text" value="<?php echo htmlspecialchars($firstLogin); ?>" disabled></td>
                        </tr>
                    </table>
                </div>
                <div class="action-buttons">
                    <a href="../edit-profile/edit-profile.php"><button>Edit Profile</button></a>
                    <form action="./profile.php" method="post">
                        <button class="danger" type="submit" name="Log_Out">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
</body>
</html>