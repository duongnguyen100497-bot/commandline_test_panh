<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "Dữ liệu JSON không hợp lệ"]);
    exit;
}

$sql = "INSERT INTO SANPHAM (MASP, MADM, MADVT, MATH, TENSP, GIABAN, GIAGOC)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss",
    $data["MASP"], $data["MADM"], $data["MADVT"], $data["MATH"],
    $data["TENSP"], $data["GIABAN"], $data["GIAGOC"]
);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Thêm sản phẩm thành công"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
