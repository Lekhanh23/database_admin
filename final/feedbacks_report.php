<?php
include 'config.php';

// Bộ lọc
$department = isset($_GET['department']) ? intval($_GET['department']) : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Danh sách khoa
$departments = $conn->query("SELECT id, name FROM departments");

// Truy vấn feedback
$sql = "
    SELECT f.*, u.full_name, d.name AS department_name
    FROM feedbacks f
    JOIN users u ON f.user_id = u.id
    JOIN departments d ON f.department_id = d.id
    WHERE 1 = 1
";

if (!empty($department)) {
    $sql .= " AND f.department_id = $department";
}
if (!empty($date)) {
    $sql .= " AND f.feedback_date = '$date'";
}
if (!empty($search)) {
    $sql .= " AND f.feedback_text LIKE '%$search%'";
}

$sql .= " ORDER BY f.feedback_date DESC, f.feedback_time DESC";
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
        <li class="active"><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>
    <!-- Main Content -->
    <main class="main-content">
    <div class="header">
      <h1>Feedbacks Report</h1>
    </div>

    <!-- Bộ lọc -->
    <form method="get" style="display: flex; gap: 10px; margin-bottom: 20px;">
      <!-- Khoa -->
      <select name="department" class="form-control">
        <option value="">All Departments</option>
        <?php while ($dept = $departments->fetch_assoc()) { ?>
          <option value="<?= $dept['id'] ?>" <?= $department == $dept['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($dept['name']) ?>
          </option>
        <?php } ?>
      </select>

      <!-- Ngày -->
      <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($date) ?>">

      <!-- Từ khóa -->
      <input type="text" name="search" class="form-control" placeholder="Search feedback..." value="<?= htmlspecialchars($search) ?>">

      <button type="submit" class="button">Filter</button>
    </form>
    <a
  href="export_feedbacks_excel.php?department=<?= $department ?>&date=<?= urlencode($date) ?>&search=<?= urlencode($search) ?>"
  class="button"
>
  Export to Excel
</a>

    <!-- Bảng kết quả -->
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Department</th>
          <th>Date</th>
          <th>Time</th>
          <th>Feedback</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
          <td class="placeholder-block"><a href="manage_users_detail.php?id=<?= $row['user_id'] ?>"><?= htmlspecialchars($row['full_name']) ?></a></td>
          <td class="placeholder-block"><?= htmlspecialchars($row['department_name']) ?></td>
          <td class="placeholder-block"><?= $row['feedback_date'] ?></td>
          <td class="placeholder-block"><?= $row['feedback_time'] ?></td>
          <td class="placeholder-block"><?= htmlspecialchars($row['feedback_text']) ?></td>
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