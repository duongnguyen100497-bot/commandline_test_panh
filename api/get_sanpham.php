<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$sql = "
SELECT 
    SANPHAM.MASP,
    SANPHAM.TENSP,
    SANPHAM.GIABAN,
    SANPHAM.GIAGOC,
    DANHMUC.TENDM AS TEN_DANHMUC,
    DONVITINH.TENDVT AS DON_VI_TINH,
    THUONGHIEU.TENTH AS THUONG_HIEU
FROM SANPHAM
JOIN DANHMUC ON SANPHAM.MADM = DANHMUC.MADM
JOIN DONVITINH ON SANPHAM.MADVT = DONVITINH.MADVT
JOIN THUONGHIEU ON SANPHAM.MATH = THUONGHIEU.MATH
";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
