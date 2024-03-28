<?php

if (!function_exists('showDonHang')) {
    function showDonHang($id)
    {
        $sql = "SELECT tb_donhang.*, tb_taikhoan.ten_dang_nhap
            FROM tb_donhang
            INNER JOIN tb_taikhoan ON tb_donhang.id_khachhang = tb_taikhoan.id WHERE tb_donhang.id  = :id LIMIT 1";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
?>