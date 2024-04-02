<footer id="footer">
    <div class="text-footer">
        <div class="cate">
            <h3>Danh mục</h3>
            <?php if (isset($categoryTopViews)) : ?>
                <?php foreach ($categoryTopViews as $categoryView) : ?>
                    <p><a href="">
                            <?= $categoryView['name'] ?>
                        </a></p>
                <?php endforeach;
                ?>
            <?php endif;
            ?>

        </div>
        <div class="help">
            <h3>Hỗ trợ</h3>
            <p><a href="">Theo dõi đơn hàng</a></p>
            <p><a href="">Vận chuyển</a></p>
            <p><a href="">Câu hỏi ?</a></p>
        </div>
        <div class="touch">
            <h3>Liên lạc</h3>
            <p>Bạn có câu hỏi nào không? Hãy cho chúng tôi biết tại cửa hàng Trinh Van Bo, Nam Tu Liem Ha Noi
                on
                (+84) 868 489 234</p>
            <p>
                <i class='bx bxl-facebook'></i>
                <i class='bx bxl-instagram'></i>
                <i class='bx bxl-twitter'></i>
            </p>
        </div>
        <div class="mail">
            <h3>Nhận bản tin</h3>

            <div class="input-mail">

                <input type="email" placeholder="email@example.com">
                <span></span>
            </div>

            <p><a href="">SUBSCRIBE</a></p>

        </div>
    </div>



    <div class="local-footer">
        <div class="image-logo-footer">
            <img src="assets/client/src/img/ft1.webp" alt="">
            <img src="assets/client/src/img/ft2.webp" alt="">
            <img src="assets/client/src/img/ft3.webp" alt="">
            <img src="assets/client/src/img/ft4.webp" alt="">
            <img src="assets/client/src/img/ft5.webp" alt="">
        </div>
        <div class="text-local-footer">
            <p>Copyright ©2024 by Team 6 | This template is made with <i class='bx bx-heart'></i> by
                <span style="color: #007bff;cursor: pointer;">Team 6 </span>
            </p>
        </div>
    </div>

    <div class="back-footer">
        <a href="#"><i class='bx bx-arrow-to-top bx-fade-up'></i></a>
    </div>
</footer>