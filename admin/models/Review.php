<?php
if (!function_exists('getData_tb_sanpham_fortb_danhgia)')) {
    function getData_tb_sanpham_fortb_danhgia($id)
    {
        $sql = "SELECT tb_danhgia.*, tb_sanpham.name
            FROM tb_danhgia
            INNER JOIN tb_sanpham ON tb_danhgia.id_sanpham = tb_sanpham.id WHERE tb_danhgia.id  = :id LIMIT 1";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
if (!function_exists('getData_users_fortb_danhgia')) {
    function getData_users_fortb_danhgia($id)
    {
        $sql = "SELECT tb_danhgia.*, users.name
            FROM tb_danhgia
            INNER JOIN users ON tb_danhgia.id_khachhang = users.id WHERE tb_danhgia.id  = :id LIMIT 1";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
