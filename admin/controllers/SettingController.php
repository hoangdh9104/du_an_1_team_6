<?php
function settingShowForm()
{
    $title = 'Danh sách setting';
    $views = 'tb_noidung/form';


    $settings = settingPluckKeyValue();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function settingSave()
{

   
    $settings = settingPluckKeyValue();
    // if(empty($_POST['logo'])){
    //     echo 'Có tồn tại';
    // };
    // debug($_POST);
    foreach ($_POST as $key => $value) {
        if (isset($settings[$key])) {
            //         // Update
            // debug($settings['key']); die; 
            if($value != $settings[$key]){
                settingUpdateByKey($key, [
                    'value' => $value
                ]);
            }
            } else {
                // Insert 
                insert('tb_noidung', [
                    'key' => $key,
                    'value' => $value
                ]); 
            //     // debug($key); die;
        }
    };
    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=tb_noidung');
    exit();
}

function settingPluckKeyValue()
{
    $data = listAll('tb_noidung');
    // debug($data);
    
    $settings = [];
    foreach ($data as $item) {
       
        $settings[$item['key']] = $item['value'];
    }
    return $settings;
}
