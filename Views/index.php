<?php include("header.php")?>
<div class="bg-image-birds">
</div>


<div class="form-container">

    <div class="register-card-blue">
        <h1>Dont't have an account?</h1>
        <span class="line-blue"></span>
        <p>Lorem ipsum dolor sit amet,
            consectetur adipisicing elit. Atque, aut
            consequuntur dicta doloremque doloribus doloremque doloribus eos,
            fuga iste.</p>
        <button class="btn" id="sign-up">SIGN UP</button>
    </div>

    <div class="login-card-blue">
        <h1>Have an account?</h1>
        <span class="line-blue"></span>
        <p>Lorem ipsum dolor sit amet,
            consectetur adipisicing elit.</p>
        <button class="btn" type="button" id="login">LOGIN</button>
    </div>


    <div class="register-card-white">
        <h1>Sign Up <span class="logo"></span></h1>
        <span class="line-blue"></span>

        <form novalidate autocomplete="off" id="register-form">
            <div class="form-row">
                <label for="reg-name" class="required">Name</label>
                <input type="text" name="reg_name" id="reg-name">
                <span class="reg-name-icon"></span>
            </div>
            <div class="form-row">
                <label for="reg-email" class="required">Email</label>
                <input type="email" name="reg_email" id="reg-email">
                <span class="reg-email-icon"></span>
            </div>
            <div class="form-row">
                <label for="reg-password" class="required">Password</label>
                <input type="text" name="reg_password" id="reg-password">
                <span class="reg-password-icon"></span>
            </div>
            <button type="button" class="btn btn-orange" id="submit-register">SIGN UP</button>
        </form>
    </div>

    <div class="login-card-white">
        <h1>Login <span class="logo"></span></h1>
        <span class="line-blue"></span>
        <form novalidate autocomplete="off" action="/login" method="post" id="login-form">

            <div class="form-row">
                <label for="email" class="required">Email</label>
                <input type="email" name="email" id="email">
                <span class="email-icon"></span>
            </div>
            <div class="form-row">
                <label for="password" class="required">password</label>
                <input type="text" name="password" id="password">
                <span class="password-icon"></span>
            </div>
            <button type="button" class="btn btn-orange" id="submit-login">LOGIN</button>
        </form>
    </div>


</div>

<p class="copy-rights">Magebit</p>

<script src="Public/js/js.js"></script>

<?php include("footer.php")?>



