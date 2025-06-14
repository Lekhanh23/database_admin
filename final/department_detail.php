<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Department Detail</title>
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
      </div>

      <!-- Department Details -->
      <div class="detail-card">
        <h2>DEPARTMENT'S INFORMATION</h2>
        <div class="detail-row">
          <div class="detail-label">Name:</div>
          <div class="detail-value"></div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Role:</div>
          <div class="detail-value"></div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Description:</div>
          <div class="detail-value"></div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Head:</div>
          <div class="detail-value"></div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Created At:</div>
          <div class="detail-value"></div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Status:</div>
          <div class="detail-value"></div>
        </div>
      </div>
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