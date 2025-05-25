<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Home</title>
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
        <li><a href="manage_departments.php">Manage Departments</a></li>
        <li class="active"><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="header">
        <h2>View Reports</h2>
        <div class="header-actions">
          <div class="notification-profile">

          </div>
        </div>
      </div>

      <!-- Department Cards Grid -->
      <div class="departments-grid">
        <div class="department-card">
          <div class="department-name"><a href="patients_report.php">Patients Report</a></div>
        </div>

        <div class="department-card">
          <div class="department-name"><a href="appointments_report.php">Appointments Report</a></div>
        </div>

        <div class="department-card">
          <div class="department-name"><a href="feedbacks_report.php">Feedbacks Report</a></div>
        </div>


      </div>
    </div>
  </div>
</body>

</html>