<?php
function getCartID( $userID){
    // Lấy dữ liệu trong db
    $cart = getCartByUserID($userID);

    if(empty($cart)){
        return insert_get_last_id('tb_giohang', [
            'id_taikhoan' => $userID
        ]);
    }
    return $cart['id'];
}   
// Lấy dữ liệu của giỏ hàng theo của người dùng
if (!function_exists('getCartByUserID')) {
    function getCartByUserID($userID)
    {
        try {
            $sql = "SELECT * FROM tb_giohang WHERE id_taikhoan = :id_taikhoan";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_taikhoan", $userID);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Lấy ra thông tất cả sản phẩm có trong giỏ hàng của khách hàng
if (!function_exists('getProductInCartItem')) {
    function getProductInCartItem($cart_id)
    {
        try {
            $sql = "SELECT * FROM cart_items WHERE cart_id = :cart_id AND product_id = :product_id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":cart_id", $cart_id);

            $stmt->bindParam(":product_id", $_GET["id_product"]);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Cập nhật số lượng của sản phẩm trong giỏ hàng
if (!function_exists('updateQuantityCartItem')) {
    function updateQuantityCartItem($quantity, $cart_id)
    {
        try {
            $sqlUpdate = "UPDATE cart_items SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id";

            $stmtUpdate = $GLOBALS['conn']->prepare($sqlUpdate);

            $stmtUpdate->bindParam(":quantity", $quantity);

            $stmtUpdate->bindParam(":cart_id", $cart_id);

            $stmtUpdate->bindParam(":product_id", $_GET["id_product"]);

            $stmtUpdate->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

// Xóa toàn bộ sản phẩm trong giỏ hàng
if (!function_exists('remoteAllCartItem')) {
    function remoteAllCartItem($cart_id)
    {
        try {
            // Xóa toàn bộ mục trong bảng cart_items có cart_id tương ứng
            $sql_delete_items = "DELETE FROM cart_items WHERE cart_id = :cart_id";

            $stmt_delete_items = $GLOBALS['conn']->prepare($sql_delete_items);

            $stmt_delete_items->bindParam(':cart_id', $cart_id);

            $stmt_delete_items->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
