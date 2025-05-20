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
  <header class="page-header">
    <div class="logo">
      <img src="assets:icons/healthcare.png" alt="Hospital Logo" class="logo-image">
      <span class="logo-text">Hospital's Name</span>
    </div>
  </header>
  <div class="page-header">
    <div class="logo">
      <span>Admin-Manage Users</span>
    </div>
  </div>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
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
            <th>User's Name</th>
            <th>Role</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="placeholder-block"><a href="manage_users_detail.php" class="user-link">John Doe</a></td>
            <td class="placeholder-block">Doctor</td>
            <td class="placeholder-block">17/05/2020</td>
            <td class="placeholder-block">10:35:02</td>
            <td class="placeholder-block">Active</td>
          </tr>
          <tr>
            <td class="placeholder-block"><a href="manage_users_detail.php" class="user-link">Khanh</a></td>
            <td class="placeholder-block">Admin</td>
            <td class="placeholder-block">12/06/2019</td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block">Active</td>
          </tr>
          <tr>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
          </tr>
          <tr>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
          </tr>
          <tr>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
          </tr>
          <tr>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
          </tr>
          <tr>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
            <td class="placeholder-block"></td>
          </tr>
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