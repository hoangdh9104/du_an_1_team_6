<?php

function homeIndex()
{
    // $products = listAll('products');
     $views = 'home';
    //  $productTopViews = productTopViewOnHome();
     $catelogues = listAll('tb_danhmuc');
    //  var_dump($catelogues);die();
     $products = listAll('tb_sanpham');
    //  debug($productTopViews);
        if (isset($_GET["search"])) {
            $id_danhmuc = isset($_GET["id_danhmuc"]) ? $_GET["id_danhmuc"] : null;
            // var_dump("". $id_danhmuc ."");die();    

            $sanpham_name = isset($_GET["sanpham_name"]) ? $_GET["sanpham_name"] : null;

            $gia_ban_min = isset($_GET["gia_ban_min"]) ? $_GET["gia_ban_min"] : null;

            $gia_ban_max = isset($_GET["gia_ban_max"]) ? $_GET["gia_ban_max"] : null;

            $products = getSearchProduct($id_danhmuc, $sanpham_name, $gia_ban_min, $gia_ban_max);
        }
        


    require_once PATH_VIEW . 'layouts/master.php';
}