<?php 

function authenShowFormLogin() {
    $views = 'authen/login';
    if (!empty($_POST)) {
        authenLogin();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}
function authenShowFormSingup() {
    $views = 'authen/adduser';  
    if (!empty($_POST)) {
        authenLogin();
    }
    require_once PATH_VIEW . 'layouts/master.php';
}

function authenLogin() {
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

function authenLogout() {
    if (!empty($_SESSION['user'])) {
        session_destroy();
    }

    header('Location: ' . BASE_URL);
    exit();
}