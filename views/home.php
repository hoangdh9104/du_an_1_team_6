<div id="main">

    <div id="content">

        <div data-aos="fade-up" class="content-text-img">
            <div class="content-img">
                <img id="image1" src="assets/client/src/img/ads1.jpg" alt="">
            </div>
            <div class="text-content">
                <div class="text-content-1">
                    <h2>Women</h2>
                    <p>Spring 2018</p>
                </div>
                <div class="content-text-2">
                    <h3>Shop Now</h3>
                    <span></span>
                </div>
            </div>
        </div>


        <div data-aos="fade-left" class="content-text-img">
            <div class="content-img">
                <img id="image1" src="assets/client/src/img/ads2.jpg" alt="">
            </div>
            <div class="text-content">
                <div class="text-content-1">
                    <h2>Men</h2>
                    <p>Spring 2018</p>
                </div>
                <div class="content-text-2">
                    <h3>Shop Now</h3>
                    <span></span>
                </div>
            </div>
        </div>


        <div data-aos="fade-up" class="content-text-img">
            <div class="content-img">
                <img id="image1" src="assets/client/src/img/ads3.jpg" alt="">
            </div>
            <div class="text-content">
                <div class="text-content-1">
                    <h2>Accessories</h2>
                    <p>New Trend</p>
                </div>
                <div class="content-text-2">
                    <h3>Shop Now</h3>
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
                    <ul>
                    <?php foreach($categoryTopViews as $categoryView): ?>
                        <li><a href=""><?= $categoryView['name']?></a></li>
                        <?php endforeach;
                    ?>
                    </ul>
                   
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

        <?php foreach($productTopViews as $productTopView): ?>
        <div class="image-product">


            <div class="item-image-product" data-aos="fade-up">
                <div class="test">
                <img src="<?= BASE_URL . $productTopView['img_thumbnail'] ?>" alt="" width="100%">
                </div>
                <p><a onclick="showProduct()">Quick View</a></p>
                <div class="name-item-image-product">
                    <div class="price-name-item-image-product">
                        <p><?= $productTopView['name'] ?></p>
                        <p><?= $productTopView['gia_ban'] ?></p>
                    </div>
                    <div class="heart-name-item-image-product">

                        <i id="bxs" onclick="addHeart()" class='bx bxs-heart'></i>
                    </div>

                </div>

            </div>

        </div>
        <?php endforeach;
        
        ?>


        <div class="btn-product">
            <a href="">LOAD MORE</a>
        </div>
    </div>

</div>