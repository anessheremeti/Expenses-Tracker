
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Tracker - LOGIN</title>
    <link rel="stylesheet" type="text/css" href="./login.css" media="all" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
    <a href="../index.php">
            <button class="btn"><i class="fas fa-arrow-left"></i></button>
        </a>
        <header>
            <h1 class="label">Log In</h1>
        </header>
        <form class="login_form" id="login_form" action="../register/register.php" method="post">
            <div class="field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_COOKIE['remembered_username']) ? $_COOKIE['remembered_username'] : ''; ?>">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            
        <div class="forgot-password">
        <a href="../forgot-password/forgot-password.php">Forgot Password?</a>
      </div>

           
            <button type="submit" class="button" name="login">Log In</button>
    
            <div id="error"></div>
            <p class="signup-text-button">Don't have an account? <a href="../Sing-up/sing-up.php">Sign Up</a></p>
        </form>
    </div>
    <script src="login.js"></script> 
</body>

</html>