<div class="slider">

    <div class="title-slider">
        <div class="text-animation">
            <h5>Painting Collection 2024</h5>
            <h3>NEW ARRIVALS</h3>
            <button>SHOP NOW</button>
        </div>
    </div>

</div>
<!-- Background -->
<div class="background">
    <img src="assets/client/src/img/slide1.png" alt="">
</div>
<div id="main">

    <div id="content">

        <div data-aos="fade-up" class="content-text-img">
            <div class="content-img">
                <img id="image1" src="assets/client/src/img/ads1.png" alt="">
            </div>
            <div class="text-content">
                <div class="text-content-1">
                    <h2>NẾN THƠM</h2>
                    <p>Mới 2024</p>
                </div>
                <div class="content-text-2">
                    <h3>Mua ngay</h3>
                    <span></span>
                </div>
            </div>
        </div>


        <div data-aos="fade-left" class="content-text-img">
            <div class="content-img">
                <img id="image1" src="assets/client/src/img/ads2.png" alt="">
            </div>
            <div class="text-content">
                <div class="text-content-1">
                    <h2>VÒNG TAY</h2>
                    <p>Mới 2024</p>
                </div>
                <div class="content-text-2">
                    <h3>Mua Ngay</h3>
                    <span></span>
                </div>
            </div>
        </div>


        <div data-aos="fade-up" class="content-text-img">
            <div class="content-img">
                <img id="image1" src="assets/client/src/img/ads3.png" alt="">
            </div>
            <div class="text-content">
                <div class="text-content-1">
                    <h2>THỦ CÔNG</h2>
                    <p>Mới 2024</p>
                </div>
                <div class="content-text-2">
                    <h3>Mua ngay</h3>
                    <span></span>
                </div>
            </div>
        </div>

    </div>

    <div class="product">
        <div class="text-product">
            <h3>Product Overview</h3>
            <div class="menu-filter-product">
                <div class="menu-product">

                    <h4>Bộ lọc</h4>
                    <form action="" method="GET">
                        <div class="form-group">
                            <label for="category">Danh mục:</label>
                            <select class="col-6 col-sm-8" name="id_danhmuc">
                                <option value="">Tất cả</option>
                                <?php foreach ($catelogues as $catelogue) : ?>
                                    <option value="<?= $catelogue['id'] ?>"><?= $catelogue['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6 col-sm-8">
                            <label for="name">Tên sản phẩm:</labsel>
                                <input type="text" class="col-6 col-sm-8" name="sanpham_name">
                        </div>
                        <div class="col-6 col-sm-8">
                            <label for="gia_ban">Giá thấp nhất:</label>
                            <input type="number" class="col-6 col-sm-8" name="gia_ban_min">
                        </div>
                        <div class="col-6 col-sm-8">
                            <label for="gia_ban">Giá cao nhất:</label>
                            <input type="number" class="col-6 col-sm-8" name="gia_ban_max">
                        </div>
                        <button type="submit" name="search" class="btn btn-primary mt-3">Áp dụng</button>
                    </form>


                </div>
                <div class="filter-product">
                    <div class="filter">
                        <i class='bx bx-filter'></i> <span>Filter</span>
                    </div>
                    <div class="search-filter-product">
                        <i class='bx bx-search-alt-2'></i><span>Search</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="image-product">
            <?php foreach ($products as $product) : ?>
                <div class="item-image-product" data-aos="fade-up">
                    <div class="test">
                        <img src="<?= BASE_URL . $product['img_thumbnail'] ?>" alt="" width="100%" height="210px">
                    </div>
                    <p><a href="#" onclick="showProduct()">Quick View</a></p>
                    <div class="name-item-image-product">
                        <div class="price-name-item-image-product">
                            <p><?= $product['name'] ?></p>
                            <p><?= $product['gia_ban']?>USD</p>
                            <p><a href="<?= BASE_URL . '?act=cart-add&id_sanpham=' . $product['id'] . '&so_luong=1' ?>">Thêm giỏ hàng</a></p>
                        </div>
                        <div class="heart-name-item-image-product">
                            <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
                        </div>

                    </div>

                </div>
            <?php endforeach;
            ?>
        </div>


        <div class="btn-product">
            <a href="">LOAD MORE</a>
        </div>
    </div>

</div>