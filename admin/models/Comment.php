<?php
if (!function_exists('getData_tb_sanpham')) {
    function getData_tb_sanpham($id)
    {
        $sql = "SELECT tb_binhluan.*, tb_sanpham.name
            FROM tb_binhluan
            INNER JOIN tb_sanpham ON tb_binhluan.id_sanpham = tb_sanpham.id WHERE tb_binhluan.id  = :id LIMIT 1";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
