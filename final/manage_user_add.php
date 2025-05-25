<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hoặc dùng password_hash() nếu muốn bảo mật hơn
    $role = $_POST['role'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $email, $password, $role, $status);
    $stmt->execute();

    $new_user_id = $stmt->insert_id;

    // Chuyển hướng sang trang chi tiết
    header("Location: manage_users_detail.php?id=$new_user_id");
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
    <div class="main-content">
      <div class="header">
        <h2>Add Users</h2>
      </div>

      <form method="post">
        <div class="form-group">
          <label for="full_name">Full Name</label>
          <input type="text" name="full_name" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="role">Role</label>
          <select name="role" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="nurse">Nurse</option>
            <option value="patient">Patient</option>
          </select>
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" class="form-control">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>

        <div class="form-action">
          <button type="submit" class="button">Add User</button>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
