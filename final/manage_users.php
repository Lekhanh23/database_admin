<?php
include 'config.php';
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Manage Users</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar" style = "width: 150px">
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
          <a href="manage_user_add.php" class="button">Add</a>
        </div>
      </div>

      <!-- Users Table -->
      <table>
        <thead>
          <tr>
          <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
          <tr>
          <td class="placeholder-block">
              <a href="manage_users_detail.php?id=<?= $row['id'] ?>">
                <?= htmlspecialchars($row['full_name']) ?>
              </a>
            </td>
            <td class="placeholder-block"><?= htmlspecialchars($row['email']) ?></td>
            <td class="placeholder-block"><?= ucfirst($row['role']) ?></td>
            <td class="placeholder-block"><?= $row['created_date'] ?></td>
            <td class="placeholder-block"><?= ucfirst($row['status']) ?></td>
            <td class="placeholder-block">
              <a href="edit_user.php?id=<?= $row['id'] ?>" class="button">Edit</a>
              <a href="delete_user.php?id=<?= $row['id'] ?>" class="button" style="color:red" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  

  <script>
    document.querySelector('.menu-toggle').addEventListener('click', function () {
      document.querySelector('.sidebar').classList.toggle('collapsed');
      document.querySelector('.main-content').classList.toggle('expanded');
    });
  </script>
</body>

</html>