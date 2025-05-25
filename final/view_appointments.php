<?php
include 'config.php';

// Nhận bộ lọc
$department = isset($_GET['department']) ? $_GET['department'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Lấy danh sách departments cho dropdown
$dept_result = $conn->query("SELECT id, name FROM departments");

// Xây dựng truy vấn với điều kiện lọc
$sql = "
    SELECT a.*, u.full_name, d.name AS department_name
    FROM appointments a
    JOIN users u ON a.user_id = u.id
    JOIN departments d ON a.department_id = d.id
    WHERE 1 = 1
";

if (!empty($department)) {
    $sql .= " AND a.department_id = " . intval($department);
}
if (!empty($date)) {
    $sql .= " AND a.appointment_date = '" . $conn->real_escape_string($date) . "'";
}
if (!empty($status)) {
    $sql .= " AND a.status = '" . $conn->real_escape_string($status) . "'";
}

$sql .= " ORDER BY a.appointment_date DESC, a.appointment_time DESC";
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
    <div class="sidebar" style = "width: 200px">
      <div class="site-title">Hospital's Name</div>
      <ul class="sidebar-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_departments.php">Manage Departments</a></li>
        <li><a href="view_reports.php">View Reports</a></li>
        <li class="active"><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>
    <!-- Main Content -->
    <main class="main-content">
      <div class="header">
        <h2>List of Appointments</h2>
      </div>

      <!-- Bộ lọc -->
      <div class="filters">
        <form method="get" style="display: flex; gap: 10px; align-items: center;">
          <!-- Department -->
          <select name="department" class="form-control">
            <option value="">All Departments</option>
            <?php while ($dept = $dept_result->fetch_assoc()) { ?>
              <option value="<?= $dept['id'] ?>" <?= $department == $dept['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($dept['name']) ?>
              </option>
            <?php } ?>
          </select>

          <!-- Date -->
          <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($date) ?>">

          <!-- Status -->
          <select name="status" class="form-control">
            <option value="">All Status</option>
            <option value="Waiting" <?= $status == 'Waiting' ? 'selected' : '' ?>>Waiting</option>
            <option value="Confirmed" <?= $status == 'Confirmed' ? 'selected' : '' ?>>Confirmed</option>
            <option value="Cancelled" <?= $status == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
            <option value="Completed" <?= $status == 'Completed' ? 'selected' : '' ?>>Completed</option>
          </select>

          <button type="submit" class="button">Filter</button>
        </form>
      </div>

      <!-- Bảng dữ liệu -->
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
            <td class="placeholder-block">
              <a href="manage_users_detail.php?id=<?= $row['user_id'] ?>">
                <?= htmlspecialchars($row['full_name']) ?>
              </a>
            </td>
            <td class="placeholder-block"><?= htmlspecialchars($row['department_name']) ?></td>
            <td class="placeholder-block"><?= $row['appointment_date'] ?></td>
            <td class="placeholder-block"><?= $row['appointment_time'] ?></td>
            <td class="placeholder-block"><?= $row['status'] ?></td>
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