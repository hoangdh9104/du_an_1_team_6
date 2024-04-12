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

if (!function_exists('listAll_history')) {
    function listAll_history($user)
    {
        $sql = "SELECT *
            FROM tb_donhang WHERE id_khachhang = :user
            ORDER BY id DESC";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}

if (!function_exists('getData_tb_chitiet_donhang')) {
    function getData_tb_chitiet_donhang($id)
    {
        $sql = "SELECT tb_chitiet_donhang.id
                        FROM tb_donhang
                        INNER JOIN tb_chitiet_donhang ON tb_donhang.id = tb_chitiet_donhang.id_donhang WHERE tb_donhang.id  = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
if (!function_exists('layBanGhi_forTableChitietDonHang')) {
    function layBanGhi_forTableChitietDonHang($mang_id = [])
    {
        try {
            // SELECT * FROM ten_bang WHERE id IN ($ids_string)
            $ids_string = implode(', ', array_fill(0, count($mang_id), '?'));


            $sql = "SELECT tb_chitiet_donhang.*, tb_sanpham.* FROM tb_chitiet_donhang INNER JOIN tb_sanpham ON tb_chitiet_donhang.id_sanpham = tb_sanpham.id WHERE tb_chitiet_donhang.id IN ($ids_string)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            foreach ($mang_id as $key => $id) {
                $stmt->bindValue($key + 1, $id, PDO::PARAM_INT);
            }
            $stmt->execute();
            // Gán giá trị cho tham số :i

            // Lấy kết quả trả về
            $result = $stmt->fetchAll();

            // Xử lý kết quả
            return $result;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
?>