
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Appointment Detail</title>
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
    <div class="main-content">
      <div class="header">
        <h2>View Appointments</h2>
      </div>

      <!-- Appointment Details -->
      <div class="detail-card highlighted">
        <h2>APPOINTMENT'S INFORMATION</h2>
        <div class="detail-row">
          <div class="detail-label">Patient: </div>
          <div class="detail-value">Patient 1</div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Doctor: </div>
          <div class="detail-value">Dr.John Doe</div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Department: </div>
          <div class="detail-value">Surgery</div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Time: </div>
          <div class="detail-value">11:00</div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Reason: </div>
          <div class="detail-value">Stomach ache for many days</div>
        </div>
        <div class="detail-row">
          <div class="detail-label">Status: </div>
          <div class="detail-value">Waiting</div>
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
