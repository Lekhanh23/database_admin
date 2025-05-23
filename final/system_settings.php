<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - System Settings</title>
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
      <span>Admin-System Settings</span>
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
        <li><a href="view_appointments.php">View Appointments</a></li>
        <li class="active"><a href="system_settings.php">System Settings</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="header">
        <h2>System Settings</h2>
      </div>

      <!-- Settings Form -->
      
        <div class="form-group">
          <label for="siteName">Site Name</label>
          <input type="text" id="siteName" class="form-control" value="Hospital Management System">
        </div>
        <div class="form-group">
          <label for="siteEmail">Site Email</label>
          <input type="email" id="siteEmail" class="form-control" value="admin@hospital.com">
        </div>




        <div class="card">
          <div class="card-header">
            <h3>Change Password</h3>
          </div>
          <form action="change_password.php" method="POST">
            <div class="info-grid">
              <div class="info-label">Current Password</div>
              <input type="password" name="current_password" required>

              <div class="info-label">New Password</div>
              <input type="password" name="new_password" id="new_password" required>

              <div class="info-label">Confirm New Password</div>
              <input type="password" name="confirm_new_password" id="confirm_new_password" required>

              <div class="password-requirements">
                Password must be at least 8 characters and include uppercase, lowercase, numbers, and special
                characters.
              </div>

              <div class="form-actions">
                <button type="submit" class="btn btn-primary">Change Password</button>
              </div>
            </div>
          </form>
        </div>



        <div class="form-action">
          <button type="submit">Save Settings</button>
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