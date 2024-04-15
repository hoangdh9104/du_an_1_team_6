<?php
function updateQuantityByCartIDAndProductID($cartID, $productID, $quantity)
{
    try {

        $sql = "UPDATE tb_chi_tiet_giohang SET so_luong = :so_luong WHERE id_giohang = :id_giohang AND id_sanpham = :id_sanpham;";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":so_luong", $quantity);
        $stmt->bindParam(":id_giohang", $cartID);
        $stmt->bindParam(":id_sanpham", $productID);


        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}

function deleteCartItemByCartIDAndProductID($cartID, $productID)
{
    try {

        $sql = "DELETE FROM tb_chi_tiet_giohang WHERE id_giohang = :id_giohang AND id_sanpham = :id_sanpham;";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_giohang", $cartID);
        $stmt->bindParam(":id_sanpham", $productID);


        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}



function deleteCartItemByCartID($cartID)
{
    try {

        $sql = "DELETE FROM tb_chi_tiet_giohang WHERE id_giohang = :id_giohang";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_giohang", $cartID);
        $stmt->execute();
    } catch (\Exception $e) {
        debug($e);
    }
}

if(!function_exists('showCoupon')) {
    function showCoupon() {

        try {
            $sql = "
            SELECT * FROM `tb_khuyenmai` WHERE 1";
            $stmt = $GLOBALS["conn"]->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();

        }
        catch (Exception $e) {
            debug($e);
        }

    }
}