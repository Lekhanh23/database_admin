<?php
include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=feedbacks_report.xls");

// Lấy bộ lọc từ URL
$department = isset($_GET['department']) ? intval($_GET['department']) : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Truy vấn
$sql = "
    SELECT f.*, u.full_name, d.name AS department_name
    FROM feedbacks f
    JOIN users u ON f.user_id = u.id
    JOIN departments d ON f.department_id = d.id
    WHERE 1 = 1
";

if (!empty($department)) {
    $sql .= " AND f.department_id = $department";
}
if (!empty($date)) {
    $sql .= " AND f.feedback_date = '$date'";
}
if (!empty($search)) {
    $search_safe = $conn->real_escape_string($search);
    $sql .= " AND f.feedback_text LIKE '%$search_safe%'";
}

$sql .= " ORDER BY f.feedback_date DESC, f.feedback_time DESC";
$result = $conn->query($sql);

// In bảng Excel
echo "<table border='1'>";
echo "<tr><th>Patient Name</th><th>Department</th><th>Date</th><th>Time</th><th>Feedback</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['department_name']) . "</td>";
    echo "<td>" . $row['feedback_date'] . "</td>";
    echo "<td>" . $row['feedback_time'] . "</td>";
    echo "<td>" . htmlspecialchars($row['feedback_text']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
