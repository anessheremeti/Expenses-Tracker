<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stiliD.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <title>Document</title>
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

           
                <div class="leftcontener-Boxheti">
                    <i class="fas fa-wallet"></i><span>wallet</span>
                </div>
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
        <div class="rightcontenier" id="rightcontenier">

            <div class="uperrbar">
                <div class="logoja">
                    <img src="../assets/img/logoo.png" alt="">
                </div>
                <i class="fa-solid fa-bars" id="hamburgerlogo" style="font-size: 30px; cursor: pointer;"></i>

            </div>

            <div class="main-contener">
                <div class="title-contener">
                    <i class="fas fa-wallet"></i><span>Wallet Overview</span>
                </div>
                <div class="balanc-contener">
                    <div class="balanci">
                        <span>balanci</span>
                        <span>500$</span>
                    </div>
                    <div class="shpenzie-teArdhurat">
                        <div class="Shpenzimet">
                            <span>Shpaenzimet</span>
                            <span>1000$</span>
                        </div>
                        <div class="teArdhurat">
                            <span>Te ardhurat</span>
                            <span>2000$</span>
                        </div>
                    </div>
                </div>
                <div class="overlay" id="outlay"></div>
                <div class="buton-contener">
                    <div>
                        <button type="submit" id="Addfonds">Add funds</button>
                    </div>
                    <div>
                        <button type="submit" id="Withdraw">Withdraw</button>
                    </div>
                    <div>
                        <button>outlay</button>
                    </div>
                </div>
            </div>
            <div class="overlay" id="outlay"></div>
            <form action="" id="add-funds-form">
                <div class="form-buton-contener" id="form-buton-contener">
                    <i class="fa-solid fa-x" id="add-funds-delet"></i>
                    <label>Amount</label>
                    <input id="amaunt-input" type="number" min="1" required>
                    <label>Source</label>
                    <input id="sourece-input" type="text">
                    <label>Confirm</label>
                    <input id="conf-input" type="checkbox" required>
                    <button type="submit">submit</button>
                </div>
            </form>

            <form action="" id="Withdraw-form">
                <div class="Withdraw-contener" id="Withdraw-contener">
                    <i class="fa-solid fa-x" id="WithdrawDelet"></i>
                    <label>Amount</label>
                    <input id="amaunt-input" type="number" min="1" required>

                    <label>Discription</label>
                    <input id="Discription-input" type="text">
                    <label>Confirm</label>
                    <input id="conf-input" type="checkbox" required>
                    <button type="submit">submit</button>
                </div>
            </form>
        </div>
        <div class="hamburger-contener" id="hamburger-contener">

            <div class="hamburger-contener-Profili">
                <i class="fa-solid fa-x" id="hamburger-contener-delet"></i>
                <i class="fas fa-user"></i><span>Profile</span>
            </div>
            <div class="hamburger-contener-Boxheti">
                <i class="fas fa-wallet"></i><span>wallet</span>
            </div>
            <div class="hamburger-contener-transactionet">
                <i class="fas fa-exchange-alt"></i><span>Transactions</span>
            </div>
            <div class="hamburger-contener-raporti">
                <i class="fas fa-chart-line"></i><span>Report</span>
            </div>
        </div>
    </div>
    </div>

    <script src="dashbord.js"></script>
</body>

</html>