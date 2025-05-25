<?php
include 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM departments_list WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$dept = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $name_en = $_POST['name_en'];
    $head = $_POST['head'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE departments_list SET code = ?, name = ?, name_en = ?, head = ?, description = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $code, $name, $name_en, $head, $description, $status, $id);
    $stmt->execute();

    header("Location: view_departments_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Department</title>
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
    <h1>Edit Department</h1>
    <form method="post">
      <div class="form-group">
        <label>Code</label>
        <input type="text" name="code" class="form-control" value="<?= htmlspecialchars($dept['code']) ?>" required>
      </div>
      <div class="form-group">
        <label>Name (VN)</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($dept['name']) ?>" required>
      </div>
      <div class="form-group">
        <label>Name (EN)</label>
        <input type="text" name="name_en" class="form-control" value="<?= htmlspecialchars($dept['name_en']) ?>">
      </div>
      <div class="form-group">
        <label>Head</label>
        <input type="text" name="head" class="form-control" value="<?= htmlspecialchars($dept['head']) ?>">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control"><?= htmlspecialchars($dept['description']) ?></textarea>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
          <option value="active" <?= $dept['status'] == 'active' ? 'selected' : '' ?>>Active</option>
          <option value="inactive" <?= $dept['status'] == 'inactive' ? 'selected' : '' ?>>Inactive</option>
        </select>
      </div>
      <div class="form-action">
        <button type="submit" class="button">Update Department</button>
      </div>
    </form>
  </main>
</div>
</body>
</html>
