<?php

function homeIndex()
{
    // $products = listAll('products');
     $views = 'home';
     $productTopViews = productTopViewOnHome();
     $categoryTopViews = categoryViewOnHome();
    //  debug($productTopViews);

    require_once PATH_VIEW . 'layouts/master.php';
}