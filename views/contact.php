<link rel="stylesheet" href="<?= BASE_URL ?>assets/client/src/css/contact.css" />
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<style>
    .trai-grid {
        padding: 40px;
        border: 1px solid #88888850;
        /* text-align: center; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .trai-grid input {
        width: 500px;
        padding: 15px;
        margin: 20px 0px;
        outline: none;
        border-radius: 10px;
        border: 1px solid #88888891;
    }

    .trai-grid div:nth-child(5) input {
        height: 200px;
        cursor: grab;
    }

    .trai-grid div:nth-child(6) input {
        background-color: #222222;
        color: #fff;
        font-weight: 550;
        width: 50%;
        transition: .3s linear;
        cursor: pointer;
    }

    .trai-grid div:nth-child(6) input:hover {
        background-color: #6775d6;
        transition: .3s linear;
    }

    div {
        text-align: left;
    }
</style>
<div style="margin : 10%;" id="main">
    <div class="banner">
        <div class="text-banner">
            <h1>Contact</h1>
        </div>
    </div>
    <div style="width: 100% ;" class="grid">
        <div class="trai-grid">
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="alert alert-success">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            <h3>Gửi tin nhắn cho chúng tôi</h3>
            <form action="" method="post">
                <div class="">
                    <input value="<?= isset($_SESSION['data_contact']) ? $_SESSION['data_contact']['sdt'] : null ?>" type="text" name="sdt" id="" placeholder=" Số điện thoại"><br>
                    <span class="error">
                        <?= (isset($_SESSION['errors_contact']['sdt'])) ?  $_SESSION['errors_contact']['sdt'] : ''; ?>
                    </span>
                </div>
                <div class="">
                    <input type="text" name="email" value="<?= isset($_SESSION['data_contact']) ? $_SESSION['data_contact']['email'] : null ?>" id="inputEmail" placeholder=" Địa chỉ email"><br>
                    <span class="error">
                        <?= (isset($_SESSION['errors_contact']['email'])) ?  $_SESSION['errors_contact']['email'] : ''; ?>
                    </span>
                </div>
                <div class="">
                    <input type="text" value="<?= isset($_SESSION['data_contact']) ? $_SESSION['data_contact']['ten_khachhang'] : null ?>" name="ten_khachhang" id="" placeholder=" Tên của bạn"><br>
                    <span class="error">
                        <?= (isset($_SESSION['errors_contact']['ten_khachhang'])) ?  $_SESSION['errors_contact']['ten_khachhang'] : ''; ?>
                    </span>
                </div>
                <div class="">
                    <?php
                    $currentDate = date("Y-m-d");
                    ?>
                    <input type="hidden" value="<?= $currentDate ?>" name="created_at">
                </div>
                <div class="">
                    <input type="text"  value="<?= isset($_SESSION['data_contact']) ? $_SESSION['data_contact']['noi_dung'] : null ?>" name="noi_dung" placeholder="How can we help  ?"><br>
                    <span class="error">
                        <?= (isset($_SESSION['errors_contact']['noi_dung'])) ?  $_SESSION['errors_contact']['noi_dung'] : ''; ?>
                    </span>
                </div>
                
                <div class="">
                    <div style="text-align: center  ;" class="">
                        <input type="submit" name="" value="SUBMIT" id="">
                    </div>
                </div>
            </form>
        </div>
        <div class="right-grid" data-aos="fade-left">
            <div class="address">
                <div><i class='bx bx-map'></i></div>
                <div class="text-address">
                    <h4>Address</h4>
                    <p>Xom 1, Vu Binh, Kien Xuong, Thai Binh</p>
                </div>
            </div>
            <div class="talk">
                <div><i class='bx bxs-phone'></i></div>
                <div class="text-address">
                    <h4>Lets Talk</h4>
                    <p>+1 800 1236879</p>
                </div>
            </div>
            <div class="sale">
                <div><i class='bx bx-map'></i></div>
                <div class="text-address">
                    <h4>
                        Sale Support</h4>
                    <p>contact@example.com</p>
                </div>
            </div>
        </div>
    </div>
    <div class="maps" data-aos="fade-up">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7481.684880480121!2d106.3892054649998!3d20.348126674609237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135fdaa91b73cf9%3A0x932e3f873571859b!2zQsawdSDEkGnhu4duIFZp4buHdCBOYW0!5e0!3m2!1sen!2s!4v1659610745724!5m2!1sen!2s" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>