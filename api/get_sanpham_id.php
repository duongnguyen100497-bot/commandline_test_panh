<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$MASP = $_GET["MASP"] ?? "";

$sql = "SELECT * FROM SANPHAM WHERE MASP = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $MASP);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["status" => "error", "message" => "Không tìm thấy sản phẩm"]);
}

$conn->close();
?>
