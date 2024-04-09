<?php

function authenShowFormLogin()
{
    $views = 'authen/login';
    if (!empty($_POST)) {
        authenLogin();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}
function authenShowFormSingup()
{
    $views = 'authen/adduser';
    if (!empty($_POST)) {
        $data = [
            "name" => $_POST['name'] ?? null,
            "email" => $_POST['email'] ?? null,
            "password" => $_POST['password'] ?? null,
            "re_password" => $_POST['re_password'] ?? null,
            "type" => $_POST['type'] ?? null,
        ];
        authenSingUp($data);
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function authenLogin()
{
    $user = getUserClientByEmailAndPassword($_POST['email'], $_POST['password']);

    if (empty($user)) {
        $_SESSION['error'] = 'Email hoặc password chưa đúng!';

        header('Location: ' . BASE_URL . '?act=login');
        exit();
    }

    $_SESSION['user'] = $user;
    header('Location: ' . BASE_URL);
    exit();
}
function authenSingUp($data)
{
    $errors = validateCreateClient($data);
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        // debug($_SESSION['errors']);
        $_SESSION['data'] = $data;
        header('Location: ' . BASE_URL . '?act=sing-up');
        exit();
    }
    $keyToRemove = 're_password';
    // Tạo một mảng mới bằng cách lọc ra các cặp key-value không chứa key cần loại bỏ
    $newArray = array_filter($data, function ($key) use ($keyToRemove) {
        return $key !== $keyToRemove;
    }, ARRAY_FILTER_USE_KEY);
    // Hiển thị mảng mới
    // print_r($newArray);
    insert('users', $newArray);
    $_SESSION['success'] = 'Tạo tài khoản thành công';
    unset($_SESSION['errors']);
    unset($_SESSION['data']);
    header('Location: ' . BASE_URL . '?act=login');
    exit();
}

function authenLogout()
{
    if (!empty($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    header('Location: ' . BASE_URL);
    exit();
}
function validateCreateClient($data)
{
    $errors = [];
    if (empty($data['name'])) {
        $errors['name'] = 'trường name là bắt buộc';
    } else if (strlen($data['name']) > 50) {
        $errors['name'] = 'trường name tối đa 50 ký tự';
    }

    if (empty($data['email'])) {
        $errors['email'] = 'trường email là bắt buộc';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'trường email không đúng định dạng';
    } else if (!checkUniqueEmail('users', $data['email'])) {
        $errors['email'] = 'email đã tồn tại';
    }
    if (empty($data['password'])) {
        $errors['password'] = 'trường password là bắt buộc';
    } else if (strlen($data['password'])  < 8 || strlen($data['password'])  > 20) {
        $errors['password'] = 'trường password tối thiểu 8 ký tự và tối đa 20 ký tự';
    }
    if (empty($data['re_password'])) {
        $errors['re_password'] = 'trường Repassword là bắt buộc';
    } else if ($data['re_password'] !== $data['password']) {
        $errors['re_password'] = 'Không khớp với mật khẩu ban đầu';
    }
    return $errors;
}
