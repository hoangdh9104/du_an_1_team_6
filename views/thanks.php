<?php
if (isset($_GET['partnerCode'])) {        
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];
    $data = [];
    $data['partner_Code'] = $partnerCode;
    $data['order_Id'] = $orderId;
    $data['amount'] = $amount;
    $data['order_Info'] = $orderInfo;
    $data['order_Type'] = $orderType;
    $data['trans_Id'] = $transId;
    $data['pay_Type'] = $payType;
    insert('tb_momo', $data);
}
// var_dump($_SESSION['cart']);
if (!empty($_SESSION['cart'])) {
    // Xử lí lưu vào bảng đơn hàng và chi tiết đơn hàng
    try {
        $parts = splitByQuotes($_GET['extraData']);
        $data2['ten_khachhang'] = $_SESSION['user']['name'];
        $data2['email'] = $_SESSION['user']['email'];
        $data2['sdt'] = $parts[0];
        $data2['diachi_muahang'] = $parts[2];
        $data2['id_khachhang'] = $_SESSION['user']['id'];
        $data2['tong_tien'] = caculator_total_order(false);
        $data2['trang_thai'] = STATUS_DELIVERY_WFC;
        $data2['phuongthuc_thanhtoan'] = 0;
        // $data['phuongthuc_thanhtoan'] = $_POST['pttt'];
        // debug($data);
        $orderID = insert_get_last_id('tb_donhang', $data2);
        foreach ($_SESSION['cart'] as $productID => $item) {
            // $total +=
            $orderItem = [
                'id_donhang' => $orderID,
                // 'soluong_sanpham' => $item['soluong_sanpham'],
                // 'thanh_tien' => ($item['gia_khuyenmai'] ?: $item['gia_ban']) * $item['soluong_sanpham'],
                // 'ngay_mua' => date("Y-m-d"),
                'id_sanpham' => $productID,
                'don_gia' => $item['gia_khuyenmai'] ?: $item['gia_ban'],
            ];
            insert('tb_chitiet_donhang', $orderItem);
        }
        // Xử lí hậu 
        // deleteCartItemByCartID($_SESSION['cartID']);

        // delete('tb_giohang', $_SESSION['cartID']);

        // Xóa session
        unset($_SESSION['cart']);
        unset($_SESSION['cartID']);
    } catch (\Exception $e) {
        debug($e);
    }

    header('Location: ' . BASE_URL);
    exit();
}
function splitByQuotes($inputString) {
    // Sử dụng preg_split với biểu thức chính quy để tách chuỗi khi gặp dấu '' hoặc ""
    $parts = preg_split("/('|\")/", $inputString, -1, PREG_SPLIT_DELIM_CAPTURE);

    // Loại bỏ các phần tử rỗng (do dấu '' hoặc "" nằm ở đầu hoặc cuối chuỗi)
    $result = array_filter($parts, 'strlen');

    return $result;
}
