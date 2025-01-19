<?php
include './database.php';

session_start();

$user = null;
$deleteId = null;

if (isset($_GET['delete_id'])) {
    $deleteId = intval($_GET['delete_id']); 

    $query = "SELECT name FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
</head>
<body>

<div class="content-wrapper <?php echo isset($deleteId) ? 'blurred' : ''; ?>">

    <?php
    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<h2>Users in the System</h2>";
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Action</th>
                    <th></th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['fullname'] . "</td>
                    <td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>
                    <td><a href='admin.php?delete_id=" . $row['id'] . "'>Delete</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No users in the system.";
    }

    $conn->close();
    ?>

</div>

<?php if (isset($deleteId) && $user): ?>
<div class="alert-box" style="display: block;">
    <h3>Are you sure you want to delete the user?</h3>
    <p>User: <strong><?php echo htmlspecialchars($user['name']); ?></strong></p>
    <div class="alert-buttons">
        <a href="delete.php?id=<?php echo $deleteId; ?>">Confirm</a>
        <a href="admin.php">Cancel</a>
    </div>
</div>
<?php endif; ?>

</body>
</html>
