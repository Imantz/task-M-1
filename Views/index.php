<?php include("header.php")?>
<div class="bg-image-birds">
</div>
    <div class="form-container">

        <!-- signup card -->
        <div class="signup-text">
            <img src="../Public/img/signup-text.png">
            <span></span>
            <a href="" id="signUp"></a>
        </div>
        <!-- login card -->
        <div class="login-text">
            <img src="../Public/img/login-text.png">
            <span></span>
            <a href="" id="login"></a>
        </div>

        <div class="position-relative">

            <div id="login-form" class="login-form">
                <form autocomplete="off" action="/login" method="POST" id="login_form">
                    <div class="margin-bottom-10">
                        <div>
                            <img src="../Public/img/login.png" alt="">
                            <img class="float-right" src="../Public/img/magebit.png" alt="">
                        </div>
                        <img width="43" src="../Public/img/line.png" alt="">
                    </div>
                    <div>
                        <img src="../Public/img/email.png">
                        <img id="email_image" class="float-right" src="../Public/img/mail.png" alt="">
                        <input name="email" id="email" type="text">
                        <img src="/Public/img/input_line.png" height="3" width="284">
                    </div>
                    <div>
                        <img src="../Public/img/password.png">
                        <img id="password_image" class="float-right" src="../Public/img/lock.png" alt="">
                        <input name="password" id="password" type="text">
                        <img src="/Public/img/input_line.png" height="3" width="284">
                    </div>
                    <div>
                        <a href="#" id="submit_login"></a>
                        <a href="#" id="forgot"></a>
                    </div>
                </form>
            </div><!-- login- form ends-->

            <div id="register-form" class="register-form">
                <form autocomplete="off" action="/register" method="POST" id="register_form">
                    <div style="margin-bottom: 10px">
                        <div>
                            <img src="../Public/img/signup.png" alt="">
                            <img class="float-right" src="../Public/img/magebit.png" alt="">
                        </div>
                        <img width="43" src="../Public/img/line.png" alt="">
                    </div>
                    <div>
                        <img src="../Public/img/name.png">
                        <img id="reg_name_image" class="float-right" src="../Public/img/person.png" alt="">
                        <input name="name" id="reg_name" type="text">
                        <img src="/Public/img/input_line.png" height="3" width="284">
                    </div>
                    <div>
                        <img src="../Public/img/email.png">
                        <img id="reg_email_image" class="float-right" src="../Public/img/mail.png" alt="">
                        <input name="email" id="reg_email" type="text">
                        <img src="/Public/img/input_line.png" height="3" width="284">
                    </div>
                    <div>
                        <img src="../Public/img/password.png">
                        <img id="reg_password_image" class="float-right" src="../Public/img/lock.png" alt="">
                        <input name="password" id="reg_password" type="text">
                        <img src="/Public/img/input_line.png" height="3" width="284">
                    </div>
                    <a href="#" id="submit_register"></a>
                </form>
            </div><!-- register form ends-->

        </div>
        <div class="copy-rights"></div>

    </div>


    <script src="Public/js/js.js"></script>
<?php include("footer.php")?>