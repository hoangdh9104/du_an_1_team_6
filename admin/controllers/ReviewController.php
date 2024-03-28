<?php
function tb_danhgiaListAll(){
    $title = 'Danh sách đánh giá';
    $views = 'tb_danhgia/index';
    $script = 'datatable';
    $script2 = 'tb_danhgia/script';
    $style = 'datatable';

    $reviews = listAll('tb_danhgia');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_danhgiaShowOne($id){
    $review = showOne('tb_danhgia', $id);
    if (empty($review)) {
        e404();
    }
    if(isset($data_nameUser[0]['name'])){
        $str = $data_nameUser[0]['name'];
    }else{
        $str = null;
    }
    $data_nameUser = getData_users_fortb_danhgia($review['id']);
    $titel = 'Chi tiết đánh giá của khách hàng: ' . $str ;
    $views = 'tb_danhgia/show';

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function tb_danhgiaDelete($id){
    delete('tb_danhgia', $id);
    $_SESSION['success'] = 'Xóa thành công';
    header('Location: ' . BASE_URL_ADMIN . '?act=tb_danhgia');
    exit();
}
// function tb_danhgiaStatus($id){
//     $review = showOne('tb_danhgia', $id);
//     if (empty($review)) {
//         e404();
//     }
//     if($review['trang_thai'] === 0){
//         $data = [
//             "trang_thai" => '1' ?? null,
//         ];
//     }else{
//         $data = [
//             "trang_thai" => '0' ?? null,
//         ];
//     }
//     update('tb_danhgia', $id, $data);
//     $_SESSION['success'] = 'Thao tác thành công';
//     header('Location: ' . BASE_URL_ADMIN . '?act=tb_danhgia');
//     exit();
// }