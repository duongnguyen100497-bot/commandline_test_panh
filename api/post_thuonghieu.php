<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "Dữ liệu JSON không hợp lệ"]);
    exit;
}

$MATH = $data["MATH"];
$TENTH = $data["TENTH"];

$sql = "INSERT INTO THUONGHIEU (MATH, TENTH) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $MATH, $TENTH);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Thêm thương hiệu thành công"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
