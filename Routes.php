<?php

Route::set("/",function(){
    WelcomeController::index();
});

Route::set("",function(){
    WelcomeController::index();
});

Route::set("/home",function(){
    HomeController::index();
});

Route::set("/register",function(){
    RegisterController::storeUser();
});

Route::set("/login",function(){
    LoginController::logIn();
});

Route::set("/logout",function(){
    LogoutController::logOut();
});

Route::set("/update",function(){
    UpdateTablesController::update();
});

Route::set("/delete",function(){
    DeleteController::delete();
});
