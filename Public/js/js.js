
listenForFocusAndFocusOutAndSetImg("email", "mail", "mail-hover");
listenForFocusAndFocusOutAndSetImg("password","lock","lock-hover");
listenForFocusAndFocusOutAndSetImg("reg_name", "person","person-hover");
listenForFocusAndFocusOutAndSetImg("reg_email","mail","mail-hover");
listenForFocusAndFocusOutAndSetImg("reg_password","lock","lock-hover");

listenSubmitButtonAndSubmitForms("login");
listenSubmitButtonAndSubmitForms("register");

function listenForFocusAndFocusOutAndSetImg(name, img, imgFocus){
    MagicUnicorn("#" + name).on("focus",()=>{
        MagicUnicorn("#" + name + "_image").src("Public/img/" + imgFocus + ".png");
    });
    MagicUnicorn("#" + name).on("focusout",()=>{
        MagicUnicorn("#" + name + "_image").src("Public/img/" + img + ".png");
    })
};

MagicUnicorn("#signUp").on("click",(e)=>{
    e.preventDefault();
    MagicUnicorn("#login-form").addClass("login-form-left");
    MagicUnicorn("#register-form").addClass("register-form-left");
});

MagicUnicorn("#login").on("click",(e)=>{
    e.preventDefault();
    MagicUnicorn("#login-form").removeClass("login-form-left");
    MagicUnicorn("#register-form").removeClass("register-form-left");
});

function listenSubmitButtonAndSubmitForms(loginOrRegister){
    MagicUnicorn("#submit_" + loginOrRegister).on("click",()=>{
        MagicUnicorn("#" + loginOrRegister+ "_form").submit();
    });
}
