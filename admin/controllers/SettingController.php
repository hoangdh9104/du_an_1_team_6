<?php
function settingShowForm()
{
    $title = 'Danh sách setting';
    $views = 'settings/form';


    $settings = settingPluckKeyValue();

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function settingSave()
{


    $settings = settingPluckKeyValue();
    foreach ($_POST as $key => $value) {
        if (isset($settings[$key])) {
            if ($value != $settings[$key]) {
                settingUpdateByKey($key, [
                    'value' => $value
                ]);
            }
        } else {
            insert('settings', [
                'key' => $key,
                'value' => $value
            ]);
        }
    };
    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=setting-form');
    exit();
}
// kỹ năng biến value thành key
function settingPluckKeyValue()
{
    $data = listAll('settings');
    // debug($data);

    $settings = [];
    foreach ($data as $item) {

        $settings[$item['key']] = $item['value'];
    }
    return $settings;
}
