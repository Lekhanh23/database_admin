<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "User ID is missing.";
    exit();
}

$id = intval($_GET['id']);

// Lấy thông tin user để hiển thị
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit();
}
// Cập nhật khi gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE users SET full_name = ?, role = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssi", $full_name, $role, $status, $id);
    $stmt->execute();

    header("Location: manage_users_detail.php?id=$id");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Add User</title>
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
    <main class="main-content">
      <div class="header">
        <h2>Edit User</h2>
      </div>

      <form method="post">
        <div class="form-group">
          <label for="full_name">Full Name</label>
          <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>" required>
        </div>

        <div class="form-group">
          <label for="role">Role</label>
          <select name="role" class="form-control">
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            <option value="doctor" <?= $user['role'] == 'doctor' ? 'selected' : '' ?>>Doctor</option>
            <option value="nurse" <?= $user['role'] == 'nurse' ? 'selected' : '' ?>>Nurse</option>
            <option value="patient" <?= $user['role'] == 'patient' ? 'selected' : '' ?>>Patient</option>
          </select>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" class="form-control">
            <option value="active" <?= $user['status'] == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= $user['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
          </select>
        </div>

        <div class="form-action">
          <button type="submit" class="button">Save Changes</button>
        </div>
      </form>
    </main>
    </div>
  </div>
</body>
</html>
