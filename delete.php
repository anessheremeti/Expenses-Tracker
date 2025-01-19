<?php
include './database.php';

if (isset($_GET['id'])) {
    $delete_id = intval($_GET['id']);

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        header("Location: admin.php?status=success");
    } else {
        header("Location: admin.php?status=error");
    }

    $stmt->close();
}
$conn->close();
?>
