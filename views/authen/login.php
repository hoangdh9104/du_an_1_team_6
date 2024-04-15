<!-- Header -->
<div id="main">
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    <div class="SignIn container">
        <form action="" method="POST" class="user">
            <div class="form-SignIn">
                <div class="left-form-Sign-In">
                    <div class="inpt-form-sign-in">
                        <p>Email :</p>
                        <input type="text" id="email" placeholder="Enter your Email " name="email">
                        <span class="error-email">
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger">
                                    <?= $_SESSION['error'] ?>
                                </div>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="inpt-form-sign-in">
                        <p>Password :</p>
                        <input type="password" placeholder="Enter your Password " name="password">
                        <span class="error-password">
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger">
                                    <?= $_SESSION['error'] ?>
                                </div>
                                <?php unset($_SESSION['error']); ?>
                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="btn-signIn">
                        <div class="left-btn-signIn">
                            <p>Do not have an account ?</p> <a href="?act=sing-up"> Sing Up</a>
                        </div>
                        <div class="right-btn-signnIn">
                            <button type="submit">Sign In</button>
                        </div>
                    </div>
                </div>
                <div class="right-form-SignIn">
                    <img src="https://static.vecteezy.com/system/resources/previews/003/689/228/original/online-registration-or-sign-up-login-for-account-on-smartphone-app-user-interface-with-secure-password-mobile-application-for-ui-web-banner-access-cartoon-people-illustration-vector.jpg" width="70%" alt="">
                </div>
            </div>
        </form>
    </div>
</div>