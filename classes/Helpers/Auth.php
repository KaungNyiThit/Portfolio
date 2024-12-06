<?php


namespace Helpers;


class Auth {

    static function  check(){
        
        if (!session_id()) {
            session_start();
        }
        

        if(isset($_SESSION['user'])){
        
            return $_SESSION['user']  ;
        }else{
           return HTTP::redirect( '/e_s_r/signIn.php' , 'auth=fail');
        }
    }

    static function user() {
        if (!session_id()) {
            session_start();
        }
        return $_SESSION['user'] ?? null;
    }
}