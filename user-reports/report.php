<?php
require '../database.php';
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../log-in/login.php');
    exit();
}

$userId = $_SESSION['id'];

$incomeQuery = "SELECT SUM(budget.Amount) AS totalIncome 
                FROM budget 
                WHERE budget.user = ?";
$stmtIncome = $conn->prepare($incomeQuery);
$stmtIncome->bind_param("i", $userId);
$stmtIncome->execute();
$resultIncome = $stmtIncome->get_result();
$incomeRow = $resultIncome->fetch_assoc();
$totalIncome = $incomeRow['totalIncome'] ?? 0;

$expensesQuery = "SELECT SUM(items.Amount) AS totalExpenses 
                  FROM items 
                  WHERE items.user = ?";
$stmtExpenses = $conn->prepare($expensesQuery);
$stmtExpenses->bind_param("i", $userId);
$stmtExpenses->execute();
$resultExpenses = $stmtExpenses->get_result();
$expensesRow = $resultExpenses->fetch_assoc();
$totalExpenses = $expensesRow['totalExpenses'] ?? 0;

$currentBalance = $totalIncome - $totalExpenses;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>
    <link rel="stylesheet" href="./report.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="contener">
        <div class="leftcontener">
            <div class="leftcontener-content">
            <div class="leftcontener-llogoja">
                    <img src="../assets/img/logoo.png" alt="">
                </div>
                <a href="../profile/profile.php" class="link">
                    <div class="leftcontener-Profili">
                        <i class="fas fa-user"></i><span>Profile</span>
                    </div>
                </a>
                <a href="../dashbord/dashbord.php" class="link">
                    <div class="leftcontener-Boxheti">
                        <i class="fas fa-wallet"></i><span>wallet</span>
                    </div>
                </a>
                <a href="../Transcation/Transcation.php" class="link">
                    <div class="leftcontener-transactionet">
                        <i class="fas fa-exchange-alt"></i><span>Transactions</span>
                    </div>
                </a>
                <div class="leftcontener-raporti">
                    <i class="fas fa-chart-line"></i><span>Report</span>
                </div>
            </div>
        </div>
        <div class="right-container">
            <div class="report-container">
                <h1>Report Overview</h1>
                <table class="summary-table">
                    <tr>
                        <td>Total Income</td>
                        <td class="income">$<?php echo number_format($totalIncome, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Total Expenses</td>
                        <td class="expenses">$<?php echo number_format($totalExpenses, 2); ?></td>
                    </tr>
                    <tr>
                        <td>Current Balance</td>
                        <td>$<?php echo number_format($currentBalance, 2); ?></td>
                    </tr>
                </table>
                <button class="find-average-btn" onclick="openModal()">Find Average</button>
            </div>
            <div class="modal" id="averageModal">
                <div class="modal-content">
                    <h2>Average Report</h2>
                    <p id="daily-average">Daily Average: Calculating...</p>
                    <p id="monthly-average">Monthly Average: Calculating...</p>
                    <p id="yearly-average">Yearly Average: Calculating...</p>
                    <button class="close-modal" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./report.js"></script>
</body>
</html>