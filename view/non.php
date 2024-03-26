
<a href="#show-re"><img src="img/img2.jpg" style="height:45px;width:45px;padding-right:10px"></a>
            <!-- modal layout -->
            <div class="modal" id="show-re">
                <a href="#" class="overlay-close"></a>
                <div class="modal__overlay"></div>

                <div class="modal__body"> 
                <!-- register form -->
                    <form action="view/register.php" method="post" enctype="multipart/form-data"> 
                    <div class="auth-form">
                        <div class="auth-form__container">

                            <div class="auth-form__header">
                                <a class="btn-close" href="#">&times;</a>
                                <h3 class="auth-form__heading">Đăng ký</h3>
                                <a href="#show-log"><span class="auth-form__switch-btn">Đăng nhập</span></a> 
                            </div>

                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="name" placeholder="Nhập tên của bạn">
                                </div>
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="email" placeholder="Nhập email của bạn">
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" class="auth-form__input" name="password" placeholder="Nhập mật khẩu của bạn">
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" class="auth-form__input" name="cpassword" placeholder="Nhập lại mật khẩu của bạn">
                                </div>
                            </div>

                            <div class="auth-form__aside">
                                <p class="auth-form__policy-text">
                                    Bạn đã có tài khoản?
                                    <a href="#show-log" class="auth-form__text-link">Đăng nhập</a>
                                </p>
                            </div>

                            <div class="auth-form__controls">
                                    <!-- <button class="btnn">TRỞ LẠI</button> -->
                                    <button name="dangky" class="btnn btn--primary">ĐĂNG KÝ</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    </div>
            </div>

            <div class="modal" id="show-log">
                <a href="#" class="overlay-close"></a>
                <div class="modal__overlay"></div>

                <div class="modal__body"> 
                <!-- login form -->
                <form action="view/login.php" method="post" enctype="multipart/form-data">
                <div class="auth-form" id="show-log">
                        <div class="auth-form__container">

                            <div class="auth-form__header">
                            <a class="btn-close" href="#">&times;</a>
                                <h3 class="auth-form__heading">Đăng nhập</h3>
                                <a href="#show-re"><span class="auth-form__switch-btn">Đăng ký</span></a>
                            </div>

                            <div class="auth-form__form">
                                <div class="auth-form__group">
                                    <input type="text" class="auth-form__input" name="email" placeholder="Nhập email của bạn">
                                </div>
                                <div class="auth-form__group">
                                    <input type="password" class="auth-form__input" name="password" placeholder="Nhập mật khẩu của bạn">
                                </div>
                            </div>

                            <div class="auth-form__aside">
                                <p class="auth-form__policy-text">
                                    Bạn chưa có tài khoản?
                                    <a href="#show-re" class="auth-form__text-link">Đăng ký</a>
                                    <br><a href="" class="auth-form__text-link">Quên mật khẩu</a>

                                </p>
                            </div>

                            <div class="auth-form__controls">
                                    <button class="btnn btn--primary" name="dangnhap">ĐĂNG NHẬP</button>
                            </div>
                        </div>
                </div>
                </form>
                </div>
            </div>


