
//  listen for input fields focus/ focus out state and put icons.
//icons for focus and focusout.

// Icon Path by default: "Public/img/"
// file extension:  'png'

listenForFocusAndFocusOutAndSetImg("email", "mail", "mail-hover");
listenForFocusAndFocusOutAndSetImg("password","lock","lock-hover");
listenForFocusAndFocusOutAndSetImg("reg_name", "person","person-hover");
listenForFocusAndFocusOutAndSetImg("reg_email","mail","mail-hover");
listenForFocusAndFocusOutAndSetImg("reg_password","lock","lock-hover");


function listenForFocusAndFocusOutAndSetImg(name, img, imgFocus){

    //When focus, then put bg icon image.

    MagicUnicorn("#" + name).on("focus",()=>{
        MagicUnicorn("#" + name + "_image").src("Public/img/" + imgFocus + ".png");
    });

    //on focusout change img.
    MagicUnicorn("#" + name).on("focusout",()=>{
        MagicUnicorn("#" + name + "_image").src("Public/img/" + img + ".png");
    })
};


//Listen for signUp button. On click add class, form moves from right to left.

MagicUnicorn("#signUp").on("click",(e)=>{
    e.preventDefault();
    MagicUnicorn("#login-form").addClass("login-form-left");
    MagicUnicorn("#register-form").addClass("register-form-left");
});


//Listen for login button. On click remove class.  Register field move from left to right.

MagicUnicorn("#login").on("click",(e)=>{
    e.preventDefault();
    MagicUnicorn("#login-form").removeClass("login-form-left");
    MagicUnicorn("#register-form").removeClass("register-form-left");
});


//Listen for click event and Submit form.

MagicUnicorn("#submit_login").click(()=>{
    MagicUnicorn("#login_form").submit();
});


//Listen for click  and register.
MagicUnicorn("#submit_register").click(()=>{
    register();
});


//register form


function register() {

    var client = new XMLHttpRequest();
    client.open("POST", "/register",false);
    client.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    client.send(MagicUnicorn("#register_form").grabFormValues());

    //check if succes. If response success = true then animate login button.

    if(JSON.parse(client.response).success){

        //Add class. Set animation for login button

        MagicUnicorn("#login").addClass("login-button-animation");

    }else{

        checkIfRegisterFieldsHaveValuesAndAlertErrorMsg();

    }
}

function checkIfRegisterFieldsHaveValuesAndAlertErrorMsg(){

   let name =  MagicUnicorn("#reg_name").getValue();
   let password = MagicUnicorn("#reg_password").getValue();
   let email =  MagicUnicorn("#reg_email").getValue();

    let errMsg = [];

    !name ? errMsg.push("name") : null;
    !password ? errMsg.push("password"): null;
    !email ? errMsg.push("email"): null;

    if(errMsg.length > 0){
        alert("Where is " + errMsg.toString() + " ??? ");
    }else{
        alert("somethign wrong, cant send msg");
    }
}