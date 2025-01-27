<?php
include '../database.php';

session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../log-in/login.php');
    exit();
}

$userBudgetQuery = "SELECT users.id, users.fullname, budget.Amount, budget.Source, budget.Confirm, budget.Date
                    FROM users
                    INNER JOIN budget ON users.id = budget.user";

$rez = mysqli_query($conn, $userBudgetQuery);

$userBudgetQueryTotal = "SELECT users.id, users.name,users.fullname, SUM(budget.Amount) AS totalBudget
                        FROM users
                        INNER JOIN budget ON users.id = budget.user
                        GROUP BY users.id";

$itemPriceQuery = "SELECT users.id, users.fullname, users.name,SUM(items.Amount) AS itemPrice, items.Description
                   FROM users
                   INNER JOIN items ON users.id = items.user
                   GROUP BY users.id";

$budgetResult = mysqli_query($conn, $userBudgetQueryTotal);
$itemResult = mysqli_query($conn, $itemPriceQuery);

if (!$budgetResult || !$itemResult) {
    die("Query failed: " . mysqli_error($conn));
}

$budgets = [];
$items = [];

if (!$rez) {
    die("Query failed: " . mysqli_error($conn));
}

if (isset($_POST["addfunds"])) {
    $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
    $source = isset($_POST["confirm"]) ? mysqli_real_escape_string($conn, $_POST["source"]) : '';
    $confirm = isset($_POST["confirm"]) ? 1 : 0;
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $userId = $_SESSION['id'];

    $query = "INSERT INTO budget (Amount, Source, Confirm, `Date`,user) VALUES (?, ?, ?, ?,?)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param('ssisi', $amount, $source, $confirm, $date,$userId);

        if ($stmt->execute()) {
            echo "<script> alert('Data Inserted Successfully'); </script>";
            header('Location: ./dashbord.php');            
        } else {
            echo "<script> alert('Error: " . $stmt->error . "'); </script>";
        }

        $stmt->close();
    } else {
        echo "<script> alert('Error preparing statement: " . $conn->error . "'); </script>";
    }
}



if (isset($_POST["addItem"])) {
    $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
    $description = isset($_POST["description"]) && is_string($_POST["description"]) ? mysqli_real_escape_string($conn, $_POST["description"]) : '';
    $confirm = isset($_POST["confirm"]) ? 1 : 0;
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $userId = $_SESSION['id'];  

    $query = "INSERT INTO items (Amount, `Description`, Confirm, `Date`, user) VALUES (?, ?, ?, ?, ?)";
   
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('ssisi', $amount, $description, $confirm, $date, $userId);

        if ($stmt->execute()) {
            echo "<script> alert('Data Inserted Successfully'); </script>";
            header('Location: ./dashbord.php');             
        } else {
            echo "<script> alert('Error: " . $stmt->error . "'); </script>";
        }

        $stmt->close();
    } else {
        echo "<script> alert('Error preparing statement: " . $conn->error . "'); </script>";
    }
}
?>

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
                        
                            <div class="balanci">
                            <?php
                            mysqli_data_seek($budgetResult, 0);
                            mysqli_data_seek($itemResult, 0);

                            $income = 0;
                            $expenses = 0;
                            $balance = 0;
                           
                            if (isset($_COOKIE["user_id"])) {
                                $cookieUsername = htmlspecialchars($_COOKIE["user_id"]);

                                // Fetch budget prej databazes
                                while ($row = mysqli_fetch_assoc($budgetResult)) {
                                    $userID = trim(strtolower($row['id']));
                                    $cookieName = trim(strtolower($cookieUsername));

                                    if ($userID=== $cookieName) {
                                        $income += $row['totalBudget'];
                                        $budgets[$row['id']] = [
                                            'id' => $row['id'],
                                            'totalBudget' => $row['totalBudget']
                                        ];
                                    }
                                }

                                mysqli_data_seek($itemResult, 0);

                               while ($row = mysqli_fetch_assoc($itemResult)) {
                                $userID = trim(strtolower($row['id']));
                                    $cookieName = trim(strtolower($cookieUsername));

                                    if ($userID === $cookieName) {
                                        $expenses += $row['itemPrice'];
                                    }
                                }

                              $balance = $income - $expenses;

                              
                                echo "<span>Balanci :  {$balance}$</span><br>";
                            } 
                            

                            if (!empty($budgets)) {
                                echo "<div class='budgets'>";
                              
                               
                                echo "</div>";
                            } 
                            ?>
                            </div>
                        


                    </div>

                    <div class="shpenzie-teArdhurat">
                        <div class="teArdhurat">
                            <span>Te ardhurat</span>
                            <?php
                           mysqli_data_seek($budgetResult, 0);
                            mysqli_data_seek($itemResult, 0);

                            $income = 0;
                            $expenses = 0;
                            $balance = 0;
                            $budgets = []; 

                     
                            if (isset($_COOKIE["user_id"])) {
                                $cookieUsername = htmlspecialchars($_COOKIE["user_id"]);

                              
                                while ($row = mysqli_fetch_assoc($budgetResult)) {
                                    $userID = trim(strtolower($row['id']));
                                    $cookieName = trim(strtolower($cookieUsername));

                                    if ($userID === $cookieName) {
                                        $income += $row['totalBudget'];
                                        $budgets[$row['id']] = [
                                            'id' => $row['id'],
                                            'totalBudget' => $row['totalBudget']
                                        ];
                                    }
                                }

                                mysqli_data_seek($itemResult, 0);

                             
                                while ($row = mysqli_fetch_assoc($itemResult)) {
                                    $userID = trim(strtolower($row['id']));
                                    $cookieName = trim(strtolower($cookieUsername));

                                    if ($userID === $cookieName) {
                                        $expenses += $row['itemPrice'];
                                    }
                                }

                             
                                $balance = $income - $expenses;

                               
                                echo "<span>{$income}$</span><br>";
                                
                            } else {
                                echo "<span>User not logged in or no remembered cookie set.</span>";
                            }

                          
                            if (!empty($budgets)) {
                                echo "<div class='budgets'>";
                                echo "</div>";
                            } else {
                                echo "<span>No budgets found.</span>";
                            }
                            ?>


                        </div>
                        <div class="Shpenzimet">
                            <span>Shpenzimet</span>
                            <?php
                            
                            mysqli_data_seek($budgetResult, 0);
                            mysqli_data_seek($itemResult, 0);

                            $expenses = 0;
                            $balance = 0;
                            

                            
                            if (isset($_COOKIE["user_id"])) {
                                $cookieUsername = htmlspecialchars($_COOKIE["user_id"]);

                              
                                while ($row = mysqli_fetch_assoc($budgetResult)) {
                                    $userID = trim(strtolower($row['id']));
                                    $cookieName = trim(strtolower($cookieUsername));

                                    
                                    if ($userID === $cookieName) {
                                        $income += $row['totalBudget'];
                                        $budgets[$row['id']] = [
                                            'id' => $row['id'],
                                            'totalBudget' => $row['totalBudget']
                                        ];
                                    }
                                }

                                mysqli_data_seek($itemResult, 0);

                                
                                while ($row = mysqli_fetch_assoc($itemResult)) {
                                    $userID = trim(strtolower($row['id']));
                                    $cookieName = trim(strtolower($cookieUsername));

                                   
                                    if ($userID === $cookieName) {
                                        $expenses += $row['itemPrice'];
                                    }
                                }

                             
                                $balance = $income - $expenses;

                             
                               
                                echo "<span> {$expenses}$</span><br>";
                              
                            } else {
                                echo "<span>User not logged in or no remembered cookie set.</span>";
                            }

                           
                            if (!empty($budgets)) {
                                echo "<div class='budgets'>";
                             
                                
                                echo "</div>";
                            } else {
                                echo "<span>No budgets found.</span>";
                            }
                            ?>
                        </div>

                    </div>
                </div>

                <div class="overlay" id="outlay"></div>

                <div class="buton-contener">
                    <div>
                        <button type="submit" id="Addfonds">Add funds</button>
                    </div>
                    <div>
                        <button type="submit" id="Withdraw">Add Item</button>
                    </div>
                </div>
            </div>

            <form method="POST" action="./dashbord.php" id="add-funds-form">
                <div class="form-buton-contener" id="form-buton-contener">
                    <input type="hidden" name="addfunds" />
                    <i class="fa-solid fa-x" id="add-funds-delet"></i>
                    <label class="amount">Amount</label>
                    <input id="amaunt-input" name="amount" type="number" min="1" required>
                    <label class="source">Source</label>
                    <input id="sourece-input" name="source" type="text" required>
                    <label>Date</label>
                    <input id="date-input" name="date" type="date">
                    <label>Confirm</label>
                    <input id="conf-input" name="confirm" type="checkbox">
                    <button type="submit" name="btn-submit">Submit</button>
                </div>
            </form>

            <form method="POST" action="./dashbord.php" id="Withdraw-form">
                <div class="Withdraw-contener" id="Withdraw-contener">
                    <input type="hidden" name="addItem" />
                    <i class="fa-solid fa-x" id="WithdrawDelet"></i>
                    <label>Amount</label>
                    <input id="amaunt-input" name="amount" type="number" min="1" required>
                    <label>Description</label>
                    <input id="Description-input" name="description" type="text">
                    <label>Date</label>
                    <input id="date-input" name="date" type="date" required>
                    <label>Confirm</label>
                    <input id="conf-input" name="confirm" type="checkbox" required>
                    <button type="submit" name="submit-item">Submit</button>
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
    <script src="dashbord.js"></script>
</body>

</html>