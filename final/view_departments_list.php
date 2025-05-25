<?php
include 'config.php';

$result = $conn->query("SELECT * FROM departments_list ORDER BY name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List of Departments</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
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
      <div class="header">
        <h1>List of Departments</h1>
        <a href="manage_departments_add.php" class="button">Add</a>
      </div>

      <table>
        <thead>
          <tr>
            <th>Code</th>
            <th>Name (VN)</th>
            <th>Name (EN)</th>
            <th>Head</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <td class="placeholder-block"><?= htmlspecialchars($row['code']) ?></td>
              <td class="placeholder-block"><?= htmlspecialchars($row['name']) ?></td>
              <td class="placeholder-block"><?= htmlspecialchars($row['name_en']) ?></td>
              <td class="placeholder-block"><?= htmlspecialchars($row['head']) ?></td>
              <td class="placeholder-block"><?= ucfirst($row['status']) ?></td>
              <td class="placeholder-block">
  <a href="manage_departments_edit.php?id=<?= $row['id'] ?>" class="button">Edit</a>
  <a href="manage_departments_delete.php?id=<?= $row['id'] ?>" class="button" style="color:red" onclick="return confirm('Are you sure?')">Delete</a>
</td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </main>
  </div>
</body>
</html>
