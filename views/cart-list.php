

<div id="main">


    <div class="text_cart">
        <p>HOME</p>
        <i class='bx bx-chevron-right'></i>
        <p>Shoping Cart</p>
    </div>
    <div class="style"></div>

    <div class="item-cart">

        <div class="table-cart" data-aos="zoom-out-right">
            <table>
                <tr>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Xóa</th>

                </tr>
                <?php
                if (!empty($_SESSION['cart'])) :

                    foreach ($_SESSION['cart'] as $item) :

                ?>
                        <tr>
                            <td>
                                <img src="<?= BASE_URL . $item['img_thumbnail'] ?>" width="50" alt="">
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td><span><?= number_format($item['gia_khuyenmai'] ?: $item['gia_ban']); ?></span>USD</td>
                            <td>


                                <a href="<?= BASE_URL . '?act=cart-dec&id_sanpham=' . $item['id'] ?>"><i class='bx bxs-down-arrow'></i></a>
                                <input type="text" name="" value="<?= $item['so_luong'] ?>" id="">
                                <a href="<?= BASE_URL . '?act=cart-inc&id_sanpham=' . $item['id'] ?>"><i class='bx bxs-up-arrow'></i></a>
                            </td>
                            <td><span><?php
                                        $total = ($item['gia_khuyenmai'] ?: $item['gia_ban']) * $item['so_luong'];
                                        echo number_format($total);
                                        ?></span>VND</td>
                            <td>
                                <a href="<?= BASE_URL . '?act=cart-del&id_sanpham=' . $item['id'] ?>" onclick="return confirm('Có chắc chắn xóa không ?')" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                <?php
                    endforeach;
                endif; ?>
                <tr>

                    <td id="total_table" colspan="4">Tổng tiền</td>
                    <td id="price_total"><?= caculator_total_order(); ?></td>
                </tr>
                <tr>
                    <td colspan="5" id="update">
                        <input type="text" placeholder="Coupon Code">
                        <input type="submit" value="APPLY COUPON">
                        <input type="submit" value="UPDATE CART">
                    </td>
                </tr>
            </table>
        </div>


        <div class="cart-total" data-aos="zoom-out-left">


            <h3>CART TOTALS</h3>


            <div class="Subtotal">
                <p>Giảm giá:</p>
                <p><span>$</span></p>
            </div>



            <div class="Shipping">
                <div class="text">
                    <p>Shipping:</p>
                </div>

                <div class="text-shipping">

                    <p> Để chào mừng cửa hàng đầu tiên khai trương, chúng tôi sẽ Free Ship cho toàn bộ đơn hàng từ 01/04/2024 - 05/05/2024.</p>
                    <p>Mã giảm giá</p>
                    <form action="" onsubmit="return validateCart()">
                        <!-- <select name="" id="option">
                            <option value="0">select a country</option>
                            <option value="1">Thai Binh</option>
                            <option value="2">Ha Noi</option>
                            <option value="3">Quang Lich</option>
                        </select> -->
                        <?php
                        foreach ($coupon as $item) : 
                        if($item['trang_thai'] == 1) :?>
                            <input type="text" id="coupon" name="ma_khuyenmai" value="<?= $item['ma_khuyenmai']?>" disabled>
                        <?php
                        endif;
                        endforeach;
                        ?>

                    </form>

                </div>
            </div>
            <div class="total-cart">
                <p>Tổng tiền</p>
                <p><span>$</span> <?= caculator_total_order(); ?></p>
            </div>
            <a href="<?= BASE_URL . '?act=order-checkout' ?>">
                <input type="submit" value="Đi đến thanh toán" name="" id="">
            </a>

        </div>
    </div>

</div>