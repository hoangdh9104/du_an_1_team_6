<?php
function showOneProduct($idProduct)
{  
    $views = 'product';
    $dmsp = listAllDanhMuc();
    $product = showOne('tb_sanpham', $idProduct);
    if (empty($product)) {
        e404();
    }
    $thoi_gian_hien_tai = time();
    $title = 'Chi tiết sản phẩm: ' . $product['name'];
    if (!empty($_POST)) {
        $data = [
            "diem_danhgia" => $_POST['quality'] ?? null,
            "noi_dung" => $_POST["comment"] ?? null,
            "thoi_gian" => $_POST["thoi_gian"] ?? null,
            "id_sanpham" => $_POST["id_sanpham"] ?? null,
            "id_khachhang" => $_POST["id_khachhang"] ?? null,
        ];
        $errors = validateCommentCreate($data);
        // debug($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header('Location: ' . BASE_URL . '?act=product-detail&id='.$idProduct.'&conditions=0');
            exit();
        }
        unset($_SESSION['errors']);
        unset($_SESSION['data']);
        insert('tb_danhgia', $data);
        // $_SESSION['success'] = 'Bình luận thành công thành công!';
        header('Location: ' . BASE_URL . '?act=product-detail&id='.$idProduct);
    }
    require_once PATH_VIEW . 'layouts/master.php';
}
function validateCommentCreate($data)
{
    $errors = [];
    if (empty($data['diem_danhgia'])) {
        $errors[] = 'Vui lòng đánh giá số điểm của sản phẩm';
    }
    if (empty($data['noi_dung'])) {
        $errors[] = 'Vui lòng nhập nội dung bình luận';
    } else if (strlen($data['noi_dung']) < 10) {
        $errors[] = 'Mô tả tối thiểu 10 kí tự';
    }
    return $errors;
}
