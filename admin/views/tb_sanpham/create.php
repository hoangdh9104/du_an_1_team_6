<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Create
            </h6>
        </div>
        <div class="card-body">

            <?php
            // Thông báo thêm thành công
            if (isset($_SESSION['success'])) :
            ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php
            endif;
            ?>
            <?php
            // Thông báo lỗi
            if (isset($_SESSION['errors'])) :
            ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php
                        foreach ($_SESSION['errors'] as $error) :
                        ?>
                            <li><?= $error ?></li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <?php unset($_SESSION['errors']); ?>
            <?php
            endif;
            ?>
            <?php 
            $dmsp = listAllDanhMuc() ;
            // var_dump($currentTimestamp)
            // debug($currentTimestamp);
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null; ?>" placeholder="Enter name" name="name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Danh mục sản phẩm:</label>
                            <select class="form-control" name="id_danhmuc" id="">
                                <option value="0" selected="selected" hidden>Chọn tên danh mục</option>
                                <?php foreach ($dmsp as $key ) : ?>
                                <option value="<?=$key['id_danhmuc']?>"><?=$key['name']?></option>
                                <?php endforeach ; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="img_thumbnail" class="form-label">Hình ảnh:</label>
                        <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="gia_ban" class="form-label">Giá Bán:</label>
                        <input type="text" class="form-control" id="gia_ban" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['gia_ban'] : null; ?>" placeholder="Enter gia" name="gia_ban">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="gia_khuyenmai" class="form-label">Giá khuyến mãi:</label>
                        <input type="text" class="form-control" id="gia_khuyenmai" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['gia_khuyenmai'] : null; ?>" placeholder="Enter gia" name="gia_khuyenmai">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                        <label for="gia_khuyenmai" class="form-label">Mô tả:</label>
                        <input type="text" class="form-control" name="mo_ta" id="" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['mo_ta'] : null; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 mt-3">
                    <label for="pass" class="form-label">Ngày tạo:</label>
                            <input type="date" class="form-control" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['ngay_tao'] : null; ?>" id="ngay_tao" value="" placeholder="Enter time" name="ngay_tao" >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= BASE_URL_ADMIN ?>?act=tb_sanpham" class="btn btn-danger">Back to list</a>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['data'])) {
    unset($_SESSION['data']);
}
null; ?>