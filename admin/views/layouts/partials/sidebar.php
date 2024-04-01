<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php BASE_URL_ADMIN ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Quản lí user -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user"></i>
            <span>Quản lý user</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=users">Danh sách</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=users-create">Thêm mới</a>
            </div>
        </div>
    </li>
    <!-- Quản lí danh mục -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
            <i class="fas fa-fw fa-list-ul"></i>
            <span>Quản lý danh mục</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_danhmuc">Danh sách</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_danhmuc-create">Thêm mới</a>
            </div>
        </div>
    </li>

    <!-- Quản lí nội dung -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Quản lý nội dung</span>
        </a>
        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=setting-form">Danh sách</a>
            </div>
        </div>
    </li>

    <!-- Quản lí liên hệ -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Quản lý liên hệ</span>
        </a>
        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_lienhe">Danh sách</a>
            </div>
        </div>
    </li>

    <!-- Quản lí khuyến mại -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse7">
            <i class="fas fa-fw fa-gift"></i>
            <span>Quản lý khuyến mại</span>
        </a>
        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai">Danh sách</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_khuyenmai-create">Thêm mới</a>
            </div>
        </div>
    </li>
    <!-- Quản lí bình luận -->
 
    <!-- Quản lí đơn hàng -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Quản lý đơn hàng</span>
        </a>
        <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_donhang">Danh sách</a>
            </div>
        </div>
    </li>
    <!-- Quản lí sản phẩm -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
            <i class="fas fa-fw fa-glasses"></i>
            <span>Quản lý sản phẩm</span>
        </a>
        <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham">Danh sách</a>
                <a class="collapse-item"  href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham-create">Create</a>
            </div>
        </div>
    </li><!-- Quản lí tin tức -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapse12">
            <i class="fas fa-regular fa-icons"></i>
            <span>Quản lý tin tức</span>
        </a>
        <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_tintuc-create">Thêm mới</a>
                <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=tb_tintuc">Danh sách</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">



</ul>