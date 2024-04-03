<?php

if (!function_exists('getSearchProduct')) {
    function getSearchProduct($id_danhmuc, $sanpham_name, $gia_ban_min = null, $gia_ban_max = null)
    {
        try {
            $sql = "SELECT * FROM tb_sanpham WHERE 1=1"; // Bắt đầu câu truy vấn với điều kiện luôn đúng

            // Thêm điều kiện cho catalogue_id nếu được chỉ định
            if (!empty($id_danhmuc)) {
                $sql .= " AND id_danhmuc = :id_danhmuc";
            }

            // Thêm điều kiện cho product_name nếu được chỉ định
            if (!empty($sanpham_name)) {
                $sql .= " AND name LIKE :sanpham_name";
                $sanpham_name = "%" . $sanpham_name . "%"; // Thêm ký tự wildcard để tìm kiếm gần đúng
            }

            // Thêm điều kiện cho giá tối thiểu nếu được chỉ định
            if (!is_null($gia_ban_min) && $gia_ban_min !== '') {
                $sql .= " AND gia_ban >= :gia_ban_min";
            }

            // Thêm điều kiện cho giá tối đa nếu được chỉ định
            if (!is_null($gia_ban_max) && $gia_ban_max !== '') {
                $sql .= " AND gia_ban <= :gia_ban_max";
            }

            $sql .= " ORDER BY id DESC"; // Sắp xếp kết quả theo id giảm dần

            $stmt = $GLOBALS['conn']->prepare($sql);

            // Bind các tham số vào câu truy vấn nếu chúng được chỉ định
            if (!empty($id_danhmuc)) {
                $stmt->bindParam(':id_danhmuc', $id_danhmuc);
            }
            // var_dump($sql);die();

            if (!empty($sanpham_name)) {
                $stmt->bindParam(':sanpham_name', $sanpham_name);
            }

            if (!is_null($gia_ban_min) && $gia_ban_min !== '') {
                $stmt->bindParam(':gia_ban_min', $gia_ban_min);
            }

            if (!is_null($gia_ban_max) && $gia_ban_max !== '') {
                $stmt->bindParam(':gia_ban_max', $gia_ban_max);
            }

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            debug($e);
        }
    }
}

