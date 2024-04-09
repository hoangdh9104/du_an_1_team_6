<?php

function categoryViewOnHome(){
    try {
        $sql = "SELECT DISTINCT `id_danhmuc`, `name` FROM `tb_danhmuc` WHERE 1";
        $stmt = $GLOBALS["conn"]->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();

    }
    catch (Exception $e) {
        debug($e);
    }
}
if(!function_exists('listAllDanhMuc')) {
    function listAllDanhMuc() {
        try {
            $sql = "
            SELECT `id`, `name` FROM `tb_danhmuc` WHERE 1";
            $stmt = $GLOBALS["conn"]->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();

        }
        catch (Exception $e) {
            debug($e);
        }

    }
}