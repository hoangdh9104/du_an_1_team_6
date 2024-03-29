<?php

// function productTopViewOnHome(){

//     try {
//         $sql = "SELECT * FROM tb_sanpham ORDER BY id DESC";

//         $stmt = $GLOBALS['conn']->prepare($sql);

//         $stmt->execute();

//         return $stmt->fetchAll();
//     } catch (\Exception $e) {
//         debug($e);
//     }

// }

if (!function_exists('productTopViewOnHome')) {
    function productTopViewOnHome() {
        try {
            $sql = "SELECT * FROM tb_sanpham ORDER BY id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}