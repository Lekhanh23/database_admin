<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Home</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar" style = "width: 120px">
      <div class="site-title">Hospital's Name</div>
      <ul class="sidebar-menu">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_departments.php">Manage Departments</a></li>
        <li><a href="view_reports.php">View Reports</a></li>
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="header">
        <div>

          <span>Welcome back, Admin</span>
        </div>

      </div>

      <!-- Dashboard Cards -->
      <div class="dashboard">
        <div class="card">
          <h2><a href="manage_departments.php">Manage Departments</a></h2>
          <div class="card-content">
            <div class="placeholder-block">Clinic Departments</div>
            <br>
            <div class="placeholder-block">Paraclinical Departments</div>
          </div>
        </div>

        <div class="card">
          <h2><a href="manage_users.php">Manage Users</a></h2>
          <div class="card-content">
            <div class="placeholder-block">Lê Khanh</div>
            <br>
            <div class="placeholder-block">Minh Tâm</div>
          </div>
        </div>

        <div class="card">
          <h2><a href="system_settings.php">System Settings</a></h2>
          <div class="card-content">
            <div class="placeholder-block">Change Password</div>
          </div>
        </div>

        <div class="card">
          <h2><a href="view_appointments.php">View Appointments</a></h2>
          <div class="card-content">
            <div class="placeholder-block">Minh Tâm - Clinical Department - 09:00</div>
            <br>
            <div class="placeholder-block">Alice - Supporting Department - 21:00</div>
            <br>
            <div class="placeholder-block">Vân - Supporting Department - 17:00 </div>
            <br>
            <div class="placeholder-block">John - Clinical Department - 15:00</div>
            <br>
            <div class="placeholder-block">Hồng Ngọc - Paraclinical Department - 09:00</div>
            <br>
            <div class="placeholder-block">Duy Anh - Paraclinical Department - 15:00 </div>
          </div>
        </div>

        <div class="card">
          <h2><a href="view_reports.php">View Reports</a></h2>
          <div class="card-content">
          <div class="placeholder-block">Patients Report</div>
            <br>
            <div class="placeholder-block">Appointments Report</div>
            <br>
            <div class="placeholder-block">Feedbacks Report</div>

          </div>
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