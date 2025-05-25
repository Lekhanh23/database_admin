<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "User ID is missing.";
    exit();
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - User Details</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar" style = "width: 120px">
      <div class="site-title">Hospital's Name</div>
      <ul class="sidebar-menu">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_departments.php">Manage Departments</a></li>
        <li><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="header">
        <h2>Manage Users</h2>
        <div class="header-actions">
          <button class="button edit-btn"><a href="edit_user.php">Edit</a></button>
          <button class="button delete-btn">Delete</button>
        </div>
      </div>
      <div class="card">
        <div class="user-profile-container">
          <div class="round">
            <!-- Add user image here if available -->
          </div>
          <main class="main-content">
      <div class="header">
        <h1>User Details</h1>
      </div>

      <div class="detail-section">
        <div class="detail-label">Full Name</div>
        <div class="detail-value"><?= htmlspecialchars($user['full_name']) ?></div>

        <div class="detail-label">Email</div>
        <div class="detail-value"><?= htmlspecialchars($user['email']) ?></div>

        <div class="detail-label">Role</div>
        <div class="detail-value"><?= ucfirst($user['role']) ?></div>

        <div class="detail-label">Created Date</div>
        <div class="detail-value"><?= $user['created_date'] ?></div>

        <div class="detail-label">Status</div>
        <div class="detail-value"><?= ucfirst($user['status']) ?></div>
      </div>

      <div class="form-action">
        <a href="edit_user.php?id=<?= $user['id'] ?>" class="button">Edit</a>
        <a href="delete_user.php?id=<?= $user['id'] ?>" class="button" style="color:red" onclick="return confirm('Are you sure?')">Delete</a>
      </div>
    </main>
    </div>
  </div>
</body>

</html>