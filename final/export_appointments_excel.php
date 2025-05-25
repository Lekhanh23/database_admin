<?php
include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=appointments_report.xls");

// Lấy giá trị lọc từ URL
$department = isset($_GET['department']) ? intval($_GET['department']) : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';

// Truy vấn
$sql = "
    SELECT a.*, u.full_name, d.name AS department_name
    FROM appointments a
    JOIN users u ON a.user_id = u.id
    JOIN departments d ON a.department_id = d.id
    WHERE 1 = 1
";

if (!empty($department)) {
    $sql .= " AND a.department_id = $department";
}
if (!empty($status)) {
    $sql .= " AND a.status = '" . $conn->real_escape_string($status) . "'";
}
if (!empty($date)) {
    $sql .= " AND a.appointment_date = '" . $conn->real_escape_string($date) . "'";
}

$sql .= " ORDER BY a.appointment_date DESC, a.appointment_time DESC";
$result = $conn->query($sql);

// In bảng HTML tương thích Excel
echo "<table border='1'>";
echo "<tr><th>Patient Name</th><th>Department</th><th>Date</th><th>Time</th><th>Status</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['department_name']) . "</td>";
    echo "<td>" . $row['appointment_date'] . "</td>";
    echo "<td>" . $row['appointment_time'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
