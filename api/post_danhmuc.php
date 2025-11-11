<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "Dữ liệu JSON không hợp lệ"]);
    exit;
}

$MADM = $data["MADM"];
$TENDM = $data["TENDM"];

$sql = "INSERT INTO DANHMUC (MADM, TENDM) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $MADM, $TENDM);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Thêm danh mục thành công"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
