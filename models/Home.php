<?php

if (!function_exists('getSearchProduct')) {
    function getSearchProduct($catalogue_id, $product_name, $price_min = null, $price_max = null)
    {
        try {
            $sql = "SELECT * FROM products WHERE 1=1"; // Bắt đầu câu truy vấn với điều kiện luôn đúng

            // Thêm điều kiện cho catalogue_id nếu được chỉ định
            if (!empty($catalogue_id)) {
                $sql .= " AND catalogue_id = :catalogue_id";
            }

            // Thêm điều kiện cho product_name nếu được chỉ định
            if (!empty($product_name)) {
                $sql .= " AND name LIKE :product_name";
                $product_name = "%" . $product_name . "%"; // Thêm ký tự wildcard để tìm kiếm gần đúng
            }

            // Thêm điều kiện cho giá tối thiểu nếu được chỉ định
            if (!is_null($price_min) && $price_min !== '') {
                $sql .= " AND price_regular >= :price_min";
            }

            // Thêm điều kiện cho giá tối đa nếu được chỉ định
            if (!is_null($price_max) && $price_max !== '') {
                $sql .= " AND price_regular <= :price_max";
            }

            $sql .= " ORDER BY id DESC"; // Sắp xếp kết quả theo id giảm dần

            $stmt = $GLOBALS['conn']->prepare($sql);

            // Bind các tham số vào câu truy vấn nếu chúng được chỉ định
            if (!empty($catalogue_id)) {
                $stmt->bindParam(':catalogue_id', $catalogue_id);
            }

            if (!empty($product_name)) {
                $stmt->bindParam(':product_name', $product_name);
            }

            if (!is_null($price_min) && $price_min !== '') {
                $stmt->bindParam(':price_min', $price_min);
            }

            if (!is_null($price_max) && $price_max !== '') {
                $stmt->bindParam(':price_max', $price_max);
            }

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            // Xử lý ngoại lệ ở đây
            debug($e);
        }
    }
}
