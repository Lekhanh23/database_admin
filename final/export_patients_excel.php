<?php
include 'config.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=patients_report.xls");

echo "<table border='1'>";
echo "<tr><th>Full Name</th><th>Email</th><th>Status</th></tr>";

$query = "SELECT * FROM users WHERE role = 'patient'";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . ucfirst($row['status']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
