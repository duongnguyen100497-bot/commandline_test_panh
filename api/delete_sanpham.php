<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$MASP = $_GET["MASP"] ?? "";

$sql = "DELETE FROM SANPHAM WHERE MASP=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $MASP);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Xóa thành công"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
