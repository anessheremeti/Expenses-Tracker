<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Transcation.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Transcation</title>
</head>

<body>
    <div class="contener">
        <div class="leftcontener">
            <div class="leftcontener-content">
                <div class="leftcontener-llogoja">
                    <img src="https://images.unsplash.com/photo-1535117423468-de0ff056882e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8aXNsYW18ZW58MHwxfDB8fHww" alt="">
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
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td>2024-12-15</td>
                        <td>Salary</td>
                        <td class="positive">+$3,000.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-16</td>
                        <td>Groceries</td>
                        <td class="negative">-$120.45</td>
                    </tr>
                    <tr>
                        <td>2024-12-17</td>
                        <td>Rent</td>
                        <td class="negative">-$1,200.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-18</td>
                        <td>Utilities (Electricity)</td>
                        <td class="negative">-$150.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-19</td>
                        <td>Restaurant</td>
                        <td class="negative">-$75.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-20</td>
                        <td>Internet Bill</td>
                        <td class="negative">-$50.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-21</td>
                        <td>Fuel</td>
                        <td class="negative">-$40.00</td>
                    </tr>
                    <tr>
                        <td>2024-12-22</td>
                        <td>Freelance Income</td>
                        <td class="positive">+$500.00</td>
                    </tr>
                </table>
            </div>
        </div>

</body>

</html>