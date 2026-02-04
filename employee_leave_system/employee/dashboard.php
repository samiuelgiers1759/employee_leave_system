<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
    header("Location: ../index.php");
    exit();
}
?>

<h3>Employee Dashboard</h3>
<p>Welcome, Employee! You can manage your leave requests here.</p>

<a href="apply_leave.php" class="btn btn-success">Apply for Leave</a>
<a href="../auth/logout.php" class="btn btn-danger">Logout</a>