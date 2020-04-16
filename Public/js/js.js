


//Listen for signUp button. On click add class, form moves from right to left.
//
MagicUnicorn("#sign-up").on("click",(e)=>{
    e.preventDefault();

    MagicUnicorn(".register-card-white").addClass("active-register");
    MagicUnicorn(".login-card-white").addClass("active-login");

});

MagicUnicorn("#login").on("click",(e)=>{
    e.preventDefault();

    MagicUnicorn(".register-card-white").removeClass("active-register");
    MagicUnicorn(".login-card-white").removeClass("active-login");

});


//Listen for click event and Submit form.

MagicUnicorn("#submit-login").click(()=>{
    MagicUnicorn("#login-form").submit();
});


//Listen for click  and register.
MagicUnicorn("#submit-register").click(()=>{

    //check if empty values

    if(formHasAllValues()){
        register();
    }

});


//register form

function register() {

    var client = new XMLHttpRequest();
    client.open("POST", "/register",false);
    client.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    client.send(MagicUnicorn("#register-form").grabFormValues());

}


//if any value will be empty then alert for empty value.

function formHasAllValues(){

   let name =  MagicUnicorn("#reg-name").getValue();
   let email =  MagicUnicorn("#reg-email").getValue();
    let password = MagicUnicorn("#reg-password").getValue();

    let errMsg = [];

    !name ? errMsg.push("name") : null;
    !email ? errMsg.push("email"): null;
    !password ? errMsg.push("password"): null;

    if(errMsg.length > 0){
        alert("Where is " + errMsg.toString() + " ??? ");
        return false;
    }

    return true;
}