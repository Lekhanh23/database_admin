<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $name_en = $_POST['name_en'];
    $head = $_POST['head'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO departments_list (code, name, name_en, head, description, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $code, $name, $name_en, $head, $description, $status);
    $stmt->execute();

    header("Location: view_departments_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Add Department</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar" style = "width: 120px">
      <div class="site-title">Hospital's Name</div>
      <ul class="sidebar-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li class="active"><a href="manage_departments.php">Manage Departments</a></li>
        <li><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>
  <main class="main-content">
    <h1>Add Department</h1>
    <form method="post">
      <div class="form-group">
        <label>Code</label>
        <input type="text" name="code" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Name (VN)</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Name (EN)</label>
        <input type="text" name="name_en" class="form-control">
      </div>
      <div class="form-group">
        <label>Head</label>
        <input type="text" name="head" class="form-control">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      <div class="form-action">
        <button type="submit" class="button">Add Department</button>
      </div>
    </form>
  </main>
</div>
</body>
</html>
