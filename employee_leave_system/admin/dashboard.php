<?php
session_start();
require '../config/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
}

$leaves = $conn->query("
    SELECT leave_requests.*, users.name
    FROM leave_requests
    JOIN users ON leave_requests.user_id = users.id
");
?>

<h3>Admin Dashboard</h3>

<table class="table table-bordered">
<tr>
    <th>Employee</th>
    <th>Leave Type</th>
    <th>Status</th>
    <th>Actions</th> 
</tr>

<?php foreach ($leaves as $leave): ?>
<tr>
    <td><?= $leave['name'] ?></td>
    <td><?= $leave['leave_type'] ?></td>
    <td><?= $leave['status'] ?></td>
    <td>
        <a href="?approve=<?= $leave['id'] ?>" class="btn btn-success btn-sm">Approve</a>
        <a href="?reject=<?= $leave['id'] ?>" class="btn btn-danger btn-sm">Reject</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<?php
if (isset($_GET['approve'])) {
    $conn->prepare("UPDATE leave_requests SET status='Approved' WHERE id=?")
       ->execute([$_GET['approve']]);
}
if (isset($_GET['reject'])) {
    $conn->prepare("UPDATE leave_requests SET status='Rejected' WHERE id=?")
       ->execute([$_GET['reject']]);
}
?>