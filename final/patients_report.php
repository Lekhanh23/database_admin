<?php
include 'config.php';

// Lấy giá trị lọc status từ query string (?status=active)
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

// Tạo câu truy vấn có điều kiện lọc
$sql = "SELECT * FROM users WHERE role = 'patient'";
if ($status_filter === 'active' || $status_filter === 'inactive') {
    $sql .= " AND status = '$status_filter'";
}
$sql .= " ORDER BY full_name ASC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - List Appointments</title>
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
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_departments.php">Manage Departments</a></li>
        <li class="active"><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>
    <!-- Main Content -->
    <main class="main-content">
      <div class="header">
        <h1>Patients Report</h1>
      </div>
      <div class="filters">
  <form method="get" style="display: flex; align-items: center; gap: 10px;">
    <select name="status" class="form-control" onchange="this.form.submit()">
      <option value="">-- Filter by Status --</option>
      <option value="active" <?= $status_filter === 'active' ? 'selected' : '' ?>>Active</option>
      <option value="inactive" <?= $status_filter === 'inactive' ? 'selected' : '' ?>>Inactive</option>
    </select>

    <a
      href="export_patients_excel.php<?= $status_filter ? '?status=' . urlencode($status_filter) : '' ?>"
      class="button"
      style="white-space: nowrap;"
    >
      Export to Excel
    </a>
  </form>
</div>
      <table>
        <thead>
            
          <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td class="placeholder-block"><?= htmlspecialchars($row['full_name']) ?></td>
            <td class="placeholder-block"><?= htmlspecialchars($row['email']) ?></td>
            <td class="placeholder-block"><?= ucfirst($row['status']) ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </main>
  </div>

  <script>
    document.querySelector('.menu-toggle').addEventListener('click', function () {
      document.querySelector('.sidebar').classList.toggle('collapsed');
      document.querySelector('.main-content').classList.toggle('expanded');
    });
  </script>