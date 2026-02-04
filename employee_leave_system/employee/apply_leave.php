<?php
session_start();
require "../config/db.php";

if ($SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("
        INSERT INTO leave_requests
        (user_id, leave_type, start_date, end_date, reason)
        VALUES (?, ?, ?, ?, ?);
    ");

    $stmt->execute([
        $_SESSION['user_id'],
        $_POST['leave_type'],
        $_POST['start_date'],
        $_POST['end_date'],
        $_POST['reason']
    ]);

    echo "Leave request submitted";
}
?>

<form method="POST">
    <input name="leave_type" class="form-control mb-2" placeholder="Leave Type" required>
    <input type="date" name="start_date" class="form-control mb-2" required>
    <input type="date" name="end_date" class="form-control mb-2" required>
    <textarea name="reason" class="form-control mb-2" placeholder="Reason" required></textarea>
    <button class="btn btn-primary">Submit</button>
</form>