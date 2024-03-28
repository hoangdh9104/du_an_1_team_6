<?php


if(!function_exists('listAllDanhMuc')) {
    function listAllDanhMuc() {

        try {
            $sql = "
            SELECT `id_danhmuc`, `name` FROM `tb_danhmuc` WHERE 1";
            $stmt = $GLOBALS["conn"]->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();

        }
        catch (Exception $e) {
            debug($e);
        }

    }
}

if (!function_exists('showOneDanhMuc')) {
    function showOneDanhMuc($tableName, $id_danhmuc) {
        try {
            $sql = "SELECT * FROM $tableName WHERE id_danhmuc = :id_danhmuc LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_danhmuc", $id_danhmuc);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('deleteDanhMuc')) {
    function deleteDanhMuc($tableName, $id_danhmuc) {
        try {
            $sql = "DELETE FROM $tableName WHERE id_danhmuc = :id_danhmuc";
            
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id_danhmuc", $id_danhmuc);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('updateDanhMuc')) {
    function updateDanhMuc($tableName, $id_danhmuc, $data = []) {
        try {
            $setParams = get_set_params($data);

            $sql = "UPDATE $tableName SET $setParams WHERE id_danhmuc = :id_danhmuc";
            
            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id_danhmuc", $id_danhmuc);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}