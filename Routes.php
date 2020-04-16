<?php

Route::set("/",function(){
    HomeController::index();
});

Route::set("",function(){
    HomeController::index();
});

Route::set("/home",function(){
    HomeController::welcome();
});

Route::set("/register",function(){
    UserController::store();
});

Route::set("/login",function(){
    UserController::logIn();
});

Route::set("/logout",function(){
    UserController::logOut();
});

Route::set("/update",function(){
    UserController::update();
});

Route::set("/delete",function(){
    UserController::delete();
});
