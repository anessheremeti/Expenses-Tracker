<?php
// Activate sessions
session_start();

// Include database connection
include('../database.php'); // Update path based on your file structure

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addContactInfoForm'])) {
    // Retrieve user inputs
    $fullName = trim($_POST['Full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!empty($fullName) && !empty($email) && !empty($message)) {
        try {
            // Prepare the query with placeholders
            $query = "INSERT INTO contact (FullName, Email, `Message`) VALUES (:fullName, :email, :message)";
            $stmt = $conn->prepare($query);

            // Bind parameters
            $stmt->bindParam(':fullName', $fullName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            // Execute the query
            if ($stmt->execute()) {
                $thankYouMessage = "Thank you for your message!";
                header("Location: /Expenses-Tracker/index.php?success=true&message=" . urlencode($thankYouMessage));
                exit();
            } else {
                echo "<script>alert('Error executing query.');</script>";
            }
        } catch (PDOException $e) {
            // Handle errors
            echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill out all fields correctly.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact-us.css">
    
</head>
<body>
<div class="upper_content">
            <!--Pjesa e Navbar-->
            <div class="item_container">

                <a href="../index.php">
                    <li>Home</li>
                </a>
                <a href="../About0us/About-Us.php">
                    <li>About us</li>
                </a>
                <a href="./contact-us.php">
                    <li>Contact us</li>
                </a>

                <a href="../features/features.php">
                    <li>Features</li>
                </a>
                <div class="burger_menu">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
                </div>
            </div>
            <img class="logo" src="../assets/img/logoo.png" />
            


            <div class="sidebar_item_container">
                <div class="sidebar_content">

                    <a href="/index.php">
                        <li>Home</li>
                    </a>
                    <a href="./About0us/About-Us.php">
                        <li>About Us</li>
                    </a>

                    <a href="./contact-us/contact-us.php">
                        <li>Contact us</li>
                    </a>

                    <a href="../features/features.php">
                        <li>Features</li>
                    </a>
                    <div class="close_button">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
                    </div>
                </div>
            </div>
    
    <div class="container">
        <header>
            <h1>CONTACT US</h1>
            <p>If you have any questions or suggestions, please contact us!</p>
        </header>
       
      
        <form id="contactForm" action="./contact-us.php" method="post">
        <input type="hidden" name="addContactInfoForm" />
            <div class="form-field">
                <label for="name">Full Name: <span class="required"></span></label>
                <div class="field">
                    <input type="text" id="name" name="Full_name" placeholder="Write your name and surname" required>
                </div>
            </div>
            <div class="form-field">
                <label for="email">Email: <span class="required"></span></label>
                <div class="field">
                    <input type="email" id="email" name="email" placeholder="Write your email" required>
                </div>
            </div>
            <div class="form-field message">
                <label for="message">Message: <span class="required"></span></label>
                <div class="field">
                    <textarea id="message" name="message" placeholder="Write your message..." required></textarea>
                </div>
            </div>
            <div class="button-area">
                <button type="submit">Submit your message</button>
            </div>
        </form>

      
    </div>
    <script src="./contact-us.js"></script>
</body>
</html>
