

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
                            <td><span><?= number_format($item['gia_khuyenmai'] ?: $item['gia_ban']); ?></span>VND</td>
                            <td>
                                </ /?=$item['so_luong'] ?>

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
                <p><span>$</span>79.65</p>
            </div>



            <div class="">
                <div class="text">
                    <p>Thông tin giao hàng:</p>
                </div>

                <div class="">

                    <!-- <p> There are no shipping methods available. Please double check your address, or contact us
                        if you need any help.</p>
                    <p>CALCULATE SHIPPING</p> -->
                    <form action="<?= BASE_URL . '?act=order-purchase'?>" onsubmit="return validateCart()" method="POST">
                        <!-- <select name="" id="option">
                            <option value="0">select a country</option>
                            <option value="1">Thai Binh</option>
                            <option value="2">Ha Noi</option>
                            <option value="3">Quang Lich</option>
                        </select> -->
                        <input type="text" id="ten_khachhang" name="ten_khachhang" value="<?= $_SESSION['user']['name'] ?>" required placeholder="Tên khách hàng">
                        <input type="email" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required placeholder="Email">
                        <input type="tel" id="sdt" name="sdt" required placeholder="Số điện thoại">
                        <input type="text" id="diachi_muahang" name="diachi_muahang" required placeholder="Địa chỉ">
                        <input type="submit" name="" value="Thanh toán" id="" onclick="alert('Đặt hàng thành công')">

                    </form>

                </div>
            </div>
            <div class="total-cart">
                <p>Tổng tiền : </p>
                <p><?= caculator_total_order(); ?></p>
            </div>
            <a href="<?= BASE_URL ?>"onclick="return confirm('Bạn muốn thoát khỏi thanh toán ?')" class="btn btn-warning">
                <input type="submit" value="Quay lại trang chủ" name="" id="">
            </a>

        </div>
    </div>

</div>