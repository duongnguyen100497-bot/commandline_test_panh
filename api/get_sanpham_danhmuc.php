<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$MADM = $_GET["MADM"] ?? "";

$sql = "SELECT MASP, TENSP, GIABAN 
        FROM SANPHAM WHERE MADM = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $MADM);
$stmt->execute();

$result = $stmt->get_result();
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
