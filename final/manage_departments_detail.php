<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Manage Departments</title>
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
      <span>Admin-Home</span>
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
          <!-- Removed empty button and notification elements -->
        </div>
      </div>

      <div class="department-info-card">
        <h2>DEPARTMENT'S INFORMATION</h2>

        <div class="info-item">
          <div class="info-label">Name:Department of Internal Medicine</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Role:</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Description: Non-surgical treatment</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Head:</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Created At:</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Status: Active</div>
          <div class="info-value"></div>
        </div>

      </div>
      <br>
      <div class="department-info-card">
        <h2>DEPARTMENT'S INFORMATION</h2>
        <div class="info-item">
          <div class="info-label">Name:Department of Surgery</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Role:</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Description: Surgical treatment</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Head:</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Created At:</div>
          <div class="info-value"></div>
        </div>
        <div class="info-divider"></div>

        <div class="info-item">
          <div class="info-label">Status: Active</div>
          <div class="info-value"></div>
        </div>
      </div>
    </div>
</body>

</html>