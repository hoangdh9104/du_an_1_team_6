<?php

// function productTopViewOnHome(){

//     try {
//         $sql = "SELECT * FROM tb_sanpham ORDER BY id DESC";

//         $stmt = $GLOBALS['conn']->prepare($sql);

//         $stmt->execute();

//         return $stmt->fetchAll();
//     } catch (\Exception $e) {
//         debug($e);
//     }

// }

if (!function_exists('productTopViewOnHome')) {
    function productTopViewOnHome() {
        try {
            $sql = "SELECT * FROM tb_sanpham ORDER BY id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('getData_tb_binhluan')) {
    function getData_tb_binhluan($id)
    {
        $sql = "SELECT tb_binhluan.id
                        FROM tb_sanpham
                        INNER JOIN tb_binhluan ON tb_binhluan.id_sanpham = tb_sanpham.id WHERE tb_sanpham.id  = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
if (!function_exists('getData_tb_danhgia')) {
    function getData_tb_danhgia($id)
    {
        $sql = "SELECT tb_danhgia.id
                        FROM tb_sanpham
                        INNER JOIN tb_danhgia ON tb_danhgia.id_sanpham = tb_sanpham.id WHERE tb_sanpham.id  = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
}
if (!function_exists('layBanGhi_forTableDanhgia')) {
    function layBanGhi_forTableDanhgia($mang_id = [])
    {
        try {
            // SELECT * FROM ten_bang WHERE id IN ($ids_string)
            $ids_string = implode(', ', array_fill(0, count($mang_id), '?'));


            $sql = "SELECT tb_danhgia.*, users.name FROM tb_danhgia INNER JOIN users ON users.id = tb_danhgia.id_khachhang WHERE tb_danhgia.id IN ($ids_string)";
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

