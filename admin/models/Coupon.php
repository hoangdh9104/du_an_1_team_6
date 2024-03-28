<?php 

if (!function_exists('checkUniqueKhuyenmai')) {

    // Nếu không trùng trả về true, trùng sẽ trả về false
    function checkUniqueKhuyenmai($tableName, $coupon) {
        try {
            $sql = "SELECT * FROM $tableName WHERE ma_khuyenmai = :ma_khuyenmai LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":ma_khuyenmai", $coupon);

            $stmt->execute();

            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailForUpdate')) {

    // Nếu không trùng trả về true, trùng sẽ trả về false
    function checkUniqueKhuyenmaiForUpdate($tableName, $id, $coupon) {
        try {
            $sql = "SELECT * FROM $tableName WHERE ma_khuyenmai = :ma_khuyenmai AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":ma_khuyenmai", $coupon);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
?>