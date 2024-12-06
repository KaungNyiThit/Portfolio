<?php


namespace Helpers;
class HTTP {
    static $base = "http://localhost/Portfolio";

    static function redirect($path, $query=""){
        $url = static::$base . $path;
        if($query === "login=success" || $query === "add=success") {
            setcookie("query_data", "success", time() + 5, "/");
        }

        if ($query) {
            $url .= "?$query";
        }

        header("location: $url");
        exit();
    }

}