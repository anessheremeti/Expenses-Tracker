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
