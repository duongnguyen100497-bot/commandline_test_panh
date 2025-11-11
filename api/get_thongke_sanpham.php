<?php
header("Content-Type: application/json; charset=UTF-8");
include "db.php";

$sql = "SELECT 
            d.MADM, 
            d.TENDM, 
            COUNT(s.MASP) AS SoLuongSP,
            ROUND(AVG(s.GIABAN), 2) AS GiaTrungBinh,
            MAX(s.GIABAN) AS GiaCaoNhat,
            MIN(s.GIABAN) AS GiaThapNhat
        FROM DANHMUC d
        LEFT JOIN SANPHAM s ON d.MADM = s.MADM
        GROUP BY d.MADM, d.TENDM
        ORDER BY SoLuongSP DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(["status" => "success", "data" => $data], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(["status" => "error", "message" => "Không có dữ liệu thống kê"], JSON_UNESCAPED_UNICODE);
}

$conn->close();
?>
