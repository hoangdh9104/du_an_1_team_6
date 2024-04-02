<?php
function orderCheckOut()
{
    $views = 'order';
    require_once PATH_VIEW . 'layouts/master.php';
}
function orderPurchase()
{
    if (!empty($_POST) && !empty($_SESSION['cart'])) {
        // Xử lí lưu vào bảng đơn hàng và chi tiết đơn hàng
        // debug($_SESSION);
        try {
            $data = $_POST;
            $data['id_khachhang'] = $_SESSION['user']['id'];
            $data['tong_tien'] = caculator_total_order(false);
            $data['trang_thai'] = STATUS_DELIVERY_WFC;
            $data['phuongthuc_thanhtoan'] = STATUS_PAYMENT_UNPAID;

            $orderID = insert_get_last_id('tb_donhang', $data);
            foreach ($_SESSION['cart'] as $productID => $item) {
                // $total +=
                $orderItem = [
                    'id_donhang' => $orderID,
                    // 'soluong_sanpham' => $item['soluong_sanpham'],
                    // 'thanh_tien' => ($item['gia_khuyenmai'] ?: $item['gia_ban']) * $item['soluong_sanpham'],
                    'id_sanpham' => $productID,
                    'don_gia' => $item['gia_khuyenmai'] ?: $item['gia_ban'],
                ];
                insert('tb_chitiet_donhang', $orderItem);
            }

            // Xử lí hậu 
            deleteCartItemByCartID($_SESSION['cartID']);

            delete('tb_giohang', $_SESSION['cartID']);

            // Xóa session
            unset($_SESSION['cart']);
            unset($_SESSION['cartID']);
        } catch (\Exception $e) {
            debug($e);
        }

        header('Location: ' . BASE_URL . '?act=order-success');
        exit();
    }
    // Chuyển hướng qua trang list cart

    header('Location: ' . BASE_URL);
}

function orderSuccess()
{
    require_once PATH_VIEW . 'order-success.php';
}
