<?php
include 'config.php';
session_start();

$message = '';
$admin_id = $_SESSION['admin_id']; // nếu bạn đang dùng users thì thay bằng user_id và bảng users

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
    $current = md5($_POST['current_password']);
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        $message = "❌ Mật khẩu xác nhận không trùng khớp.";
    } elseif (strlen($new) < 8) {
        $message = "❌ Mật khẩu phải có ít nhất 8 ký tự.";
    } else {
        // Lấy mật khẩu cũ
        $stmt = $conn->prepare("SELECT password FROM admins WHERE id = ?");
        $stmt->bind_param("i", $admin_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $admin = $result->fetch_assoc();

        if ($admin && $admin['password'] === $current) {
            $new_hashed = md5($new);
            $update = $conn->prepare("UPDATE admins SET password = ? WHERE id = ?");
            $update->bind_param("si", $new_hashed, $admin_id);
            $update->execute();
            $message = "✅ Đổi mật khẩu thành công.";
        } else {
            $message = "❌ Mật khẩu hiện tại không chính xác.";
        }
    }
}
?>
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
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar" style = "width: 120px">
      <div class="site-title">Hospital's Name</div>
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
            <?php if (!empty($message)): ?>
                <p style="color:<?= strpos($message, '✅') === 0 ? 'green' : 'red' ?>;">
    <?= $message ?>
  </p>
<?php endif; ?>

          </div>
          <form method="POST">
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
  <a href="logout.php" class="button">Logout</a>
  <button type="submit" name="save_settings">Save Settings</button>
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