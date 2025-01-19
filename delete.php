<?php
include './database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE users SET name = ?, fullname = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssi", $name, $fullname, $email, $id);

    if ($stmt->execute()) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating user information: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
    header("Location: admin.php"); 
    exit;
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
    $stmt->close();
} else {
    echo "Invalid request.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="edit.css">

</head>
<body>
<form  method='POST'>
    <h2>Edit User Information</h2>
    <input type='hidden' name='id' value='<?php echo $user['id']; ?>'>

    <label for='name'>Username:</label>
    <input type='text' id='name' name='name' value='<?php echo $user['name']; ?>' required>

    <label for='fullname'>Full Name:</label>
    <input type='text' id='fullname' name='fullname' value='<?php echo $user['fullname']; ?>' required>

    <label for='email'>Email:</label>
    <input type='email' id='email' name='email' value='<?php echo $user['email']; ?>' required>

    <button type='submit'>Save Changes</button>

</form>

</body>
</html>
