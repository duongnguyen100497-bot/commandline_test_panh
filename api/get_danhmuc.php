<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$sql = "SELECT * FROM DANHMUC";
$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
