<?php
include '../database.php';
session_start();

if (isset($_COOKIE["user_id"])) {
    $cookieUsername = mysqli_real_escape_string($conn, $_COOKIE["user_id"]);
} else {
    die("User is not logged in.");
}

$userId = $_SESSION['id']; 


if (!is_numeric($userId)) {
    die("Invalid user ID.");
}


$query = "SELECT ItemID FROM items";
$queryForItemDelete = mysqli_query($conn, $query);

if ($queryForItemDelete) {
    while ($row = mysqli_fetch_assoc($queryForItemDelete)) {
        $itemID = $row['ItemID'];
    }
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];
    $itemDelete = "DELETE FROM `items` WHERE ItemID = $id";
    $rez = mysqli_query($conn, $itemDelete);
    if (!$rez) {
        die(mysqli_error($conn));
    }
    
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$transactionQuery = "
    (SELECT 
        users.id,
        users.name,
        items.description AS transaction_description,
        items.Date AS transaction_date,
        items.Amount AS transaction_amount,
        NULL AS budget_source,
        NULL AS budget_amount,
        NULL AS budget_date,
        'expense' AS transaction_type
    FROM 
        users
    LEFT JOIN 
        items ON users.id = items.user
    WHERE 
        users.id = $userId)
    
    UNION ALL
    
    (SELECT 
        users.id,
        users.name,
        NULL AS transaction_description,
        NULL AS transaction_date,
        NULL AS transaction_amount,
        budget.Source AS budget_source,
        budget.Amount AS budget_amount,
        budget.Date AS budget_date,
        'fund' AS transaction_type
    FROM 
        users
    LEFT JOIN 
        budget ON users.id = budget.user
    WHERE 
        users.id = $userId)
";

$result = mysqli_query($conn, $transactionQuery);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Transcation.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Transaction</title>
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
                        <i class="fas fa-wallet"></i><span>Wallet</span>
                    </div>
                </a>
                <div class="leftcontener-transactionet">
                    <i class="fas fa-exchange-alt"></i><span>Transactions</span>
                </div>
                <a href="../user-reports/report.php" class="link">
                    <div class="leftcontener-raporti">
                        <i class="fas fa-chart-line"></i><span>Report</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="rightcontenier">
            <div class="uperrbar">
                <i class="fa-solid fa-bars" id="hamburgerlogo" style="font-size: 30px; cursor: pointer;"></i>
                <div class="logoja">
                    <img src="https://images.unsplash.com/photo-1535117423468-de0ff056882e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aXNsYW18ZW58MHwxfDB8fHww" alt="">
                </div>
            </div>
        </div> 
        <div class="table-container">
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr data-transaction-id="<?php echo htmlspecialchars($row['id']); ?>">
                                <td><?= htmlspecialchars($row['transaction_date'] ?? $row['budget_date']); ?></td>

                                <td>
                                    <?php
                                    if ($row['transaction_type'] == 'fund' && !empty($row['budget_source'])) {
                                        echo htmlspecialchars($row['budget_source']);
                                    } elseif ($row['transaction_type'] == 'expense' && !empty($row['transaction_description'])) {
                                        echo htmlspecialchars($row['transaction_description']);
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if ($row['transaction_type'] == 'fund' && isset($row['budget_amount']) && $row['budget_amount'] > 0) {
                                        echo '+' . htmlspecialchars($row['budget_amount']) . " $";
                                    } elseif ($row['transaction_type'] == 'expense' && isset($row['transaction_amount'])) {
                                        echo '-' . htmlspecialchars($row['transaction_amount']) . " $";
                                        echo '
                                            <form method="GET" style="display:inline;">
                                            <input type="hidden" name="deleteid" value="' . $itemID . '">
                                              <button class="btn">Delete</button>
                                                </form>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
