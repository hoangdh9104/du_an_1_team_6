<?php
function showFormContact()
{
    $views = 'contact';
    if (!empty($_POST)) {
        $data = [
            "sdt" => $_POST['sdt'] ?? null,
            "email" => $_POST['email'] ?? null,
            "ten_khachhang" => $_POST['ten_khachhang'] ?? null,
            "created_at" => $_POST['created_at'] ?? null,
            "noi_dung" => $_POST['noi_dung'] ?? null,
        ];
        $errors = validateCreateContact($data);
        if (!empty($errors)) {
            $_SESSION['errors_contact'] = $errors;
            $_SESSION['data_contact'] = $data;
            header('Location: ' . BASE_URL . '?act=contact');
            exit();
        }
        insert('tb_lienhe', $data);
        $_SESSION['success'] = 'Cảm ơn quý khách đã';
        unset($_SESSION['errors_contact']);
        unset($_SESSION['data_contact']);
        header('Location: ' . BASE_URL . '?act=contact');
        exit();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}
function validateCreateContact($data)
{
    $errors = [];
    if (empty($data['ten_khachhang'])) {
        $errors['ten_khachhang'] = 'trường tên của bạn là bắt buộc';
    } else if (strlen($data['ten_khachhang']) > 50) {
        $errors['ten_khachhang'] = 'trường name tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'trường email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'trường email không đúng định dạng';
    }
    if (empty($data['sdt'])) {
        $errors['sdt'] = 'trường số điện thoại là bắt buộc';
    } else if (validatePhoneNumber($data['sdt']) == false) {
        $errors['sdt'] = 'Số điện thoại không hợp lệ';
    }
    if (empty($data['noi_dung'])) {
        $errors['noi_dung'] = 'trường nội dung là bắt buộc';
    } else if (strlen($data['noi_dung'])  < 10) {
        $errors['re_password'] = 'trường nội dung tối thiểu 10 ký tự';
    }
    return $errors;
}

function validatePhoneNumber($phoneNumber)
{
    // Loại bỏ các ký tự không phải số từ chuỗi số điện thoại
    $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

    // Kiểm tra xem chuỗi có chứa 10 hoặc 11 chữ số (phù hợp với số điện thoại di động) hay không
    if (preg_match('/^\d{10,11}$/', $phoneNumber)) {
        return true;
    } else {
        return false;
    }
}
