<?php
function countOrder()
{
    $sql = "SELECT COUNT(id_sanpham) AS total_count
    FROM tb_chi_tiet_giohang;";
}
