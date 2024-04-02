<header>

    <div id="header">

        <div class="header-top">
            <div class="sub-header-top">
                <div class="left-title">
                    <h4>Website designed by Team 6</h4>
                </div>
                <div class="list-header">
                    <ul>
                        <li><a href=""> Trợ Giúp</a></li>
                        <li><a href="">My Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sub-nav" id="nav">
            <div class="nav">
                <div class="photo-logo">
                    <a href="index.html"><img src="assets/client/src/img/logo.png" style="cursor: pointer;" alt="" /></a>
                </div>
                <!-- dùng thẻ nav -->
                <nav>
                    <div class="list-menu">
                        <ul>
                            <li>
                                <a href="?act=/" id="home"> Trang chủ
                                    <ul class="sub-menu">
                                        <li><a href="">Homepage 1</a></li>
                                        <li><a href="">Homepage 1</a></li>
                                        <li><a href="">Homepage 1</a></li>
                                    </ul>
                                </a>
                            </li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="about.html">Giới thiệu</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="list-icon" id="list-icon">
                    <div class="icons search" id="iconSearch">

                        <input type="text" id="input_search" placeholder="New Product..?">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="icons cart">
                        <a href="features.html"></a><i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <?php
                    if (!isset($_SESSION['user'])) :
                    ?>
                        <div class="icons heart">
                            <a href="?act=login"> <i class='bx bxs-user'></i></a>
                        </div>
                    <?php else : ?>
                        <div class="dropdown">
                            <div class="namngang">
                                <img class="dropbtn" width="40px" height="40px" src="<?= BASE_URL ?>assets/admin/img/undraw_profile.svg">
                                <span><?= $_SESSION['user']['name'] ?></span>
                            </div>
                            <div class="dropdown-content" >
                                <?php
                                if ($_SESSION['user']['type'] == 1) :
                                ?>
                                <a href="<?= BASE_URL_ADMIN?>">
                                    Vào trang admin
                                </a>
                                <?php endif; ?>
                                <a class="" href="">
                                    Quản lý tài khoản
                                </a>
                                <a class="" href="<?= BASE_URL ?>?act=logout" >
                                    Logout
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="toggle">
                        <i class='bx bx-sun'></i>
                    </div>
                </div>
            </div>
        </div>
</header>