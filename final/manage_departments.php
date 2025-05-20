
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Home</title>
  <link rel="stylesheet" href="styles.css">

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
        <li><a href="manage_users.php">Manage Users</a></li>
        <li class="active"><a href="manage_departments.php">Manage Departments</a></li>
        <li><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="header">
        <h2>Manage Departments</h2>
        <div class="header-actions">
          <div class="notification-profile">

          </div>
        </div>
      </div>

      <!-- Department Cards Grid -->
      <div class="departments-grid">
        <div class="department-card">
          <div class="department-name"><a href="manage_departments_detail.php">Clinical Department</a></div>
        </div>

        <div class="department-card">
          <div class="department-name">Paraclinical Department</div>
        </div>

        <div class="department-card">
          <div class="department-name">Supporting Departments</div>
        </div>

        <div class="department-card">
          <div class="department-name">Others</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
