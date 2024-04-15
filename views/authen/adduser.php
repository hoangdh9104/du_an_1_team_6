<div id="main">
    <div class="SignIn">
        <form class="form-SignIn" method="post">
            <div class="left-form-Sign-In">
                <div class="inpt-form-sign-in">
                    <p>Email :</p>
                    <input type="email" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['email'] : null ?>" name="email" placeholder="Enter your Email "> 
                    <br>
                    <span class="error">
                        <?=  (isset($_SESSION['errors']['email'])) ?  $_SESSION['errors']['email'] : '' ; ?>
                    </span>
                </div>
                <div class="inpt-form-sign-in">
                    <p>Name :</p>
                    <input type="text" name="name" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['name'] : null ?>" placeholder="Enter your Name ">
                    <br>
                    <span class="error">
                        <?=  (isset($_SESSION['errors']['name'])) ?  $_SESSION['errors']['name'] : '' ; ?>
                    </span>
                </div>
                <div class="inpt-form-sign-in">
                    <p>Password :</p>
                    <input type="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['password'] : null ?>"  name="password" placeholder="Enter your Password ">
                    <br>
                    <span class="error">
                        <?=  (isset($_SESSION['errors']['password'])) ?  $_SESSION['errors']['password'] : '' ; ?>
                    </span>
                </div>
                <div class="inpt-form-sign-in">
                    <p>RePassword :</p>
                    <input type="password" value="<?= isset($_SESSION['data']) ? $_SESSION['data']['re_password'] : null ?>" name="re_password" placeholder="Enter your RePassword ">
                    <br>
                    <span class="error">
                        <?=  (isset($_SESSION['errors']['re_password'])) ?  $_SESSION['errors']['re_password'] : '' ; ?>
                    </span>
                </div>
                <input type="hidden" name="type" value="0">
                <div class="btn-signIn">
                    <div class="left-btn-signIn">
                        <p>Do you have an account ?</p><a href="?act=login"> Đăng nhập</a>
                    </div>
                    <div class="right-btn-signnIn">
                        <button type="submit">Đăng Ký</button>
                    </div>
                </div>
            </div>
            <div class="right-form-SignIn">
                <img src="https://static.vecteezy.com/system/resources/previews/003/689/228/original/online-registration-or-sign-up-login-for-account-on-smartphone-app-user-interface-with-secure-password-mobile-application-for-ui-web-banner-access-cartoon-people-illustration-vector.jpg" width="70%" alt="">
            </div>
        </form>
    </div>

</div>