<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - User Details</title>
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
      <span>Admin-User Details</span>
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
          <button class="button edit-btn"><a href="edit_user.php">Edit</a></button>
          <button class="button delete-btn">Delete</button>
        </div>
      </div>
      <div class="card">
        <div class="user-profile-container">
          <div class="round">
            <!-- Add user image here if available -->
          </div>
          <div class="user-detail-card">
            <h2>USER'S INFORMATION</h2>
            <div class="user-avatar">
              <div class="avatar-circle"></div>
            </div>
            <div class="user-info">
              <div class="info-group">
                <label>Full Name:</label>
                <span class="info-value">John Doe</span>
              </div>
              <div class="info-group">
                <label>Phone Number:</label>
                <span class="info-value">+1234567890</span>
              </div>
              <div class="info-group">
                <label>Email:</label>
                <span class="info-value">johndoe@example.com</span>
              </div>
              <div class="info-group">
                <label>Role:</label>
                <span class="info-value">Doctor</span>
              </div>
              <div class="info-group">
                <label>Status:</label>
                <span class="info-value">Active</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>