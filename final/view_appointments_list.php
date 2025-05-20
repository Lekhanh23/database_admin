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
  <header class="page-header">
    <div class="logo">
      <img src="assets:icons/healthcare.png" alt="Hospital Logo" class="logo-image">
      <span class="logo-text">Hospital's Name</span>
    </div>
  </header>
  <div class="page-header">
    <div class="logo">
      <span>Admin-View Appointments</span>
    </div>
  </div>

  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
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
    <div class="main-content">
      <div class="header">
        <h2>List of Appointments</h2>
        <div class="header-actions">
          <div class="notification-profile">

          </div>
        </div>
      </div>
      <!-- Users Table -->
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
          <tr>
            <td class="placeholder-block"><a href="appointment_detail.php" class="user-link">Patient 1</a></td>
            <td class="placeholder-block">Clinical Department</td>
            <td class="placeholder-block">23/05/2025</td>
            <td class="placeholder-block">10:35:02</td>
            <td class="placeholder-block">Waiting</td>
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