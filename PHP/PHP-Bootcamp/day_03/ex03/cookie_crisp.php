<?php
/*
    setcookie() defines a cookie to be sent along with the rest of the HTTP headers. 

    $_COOKIE : Array of variables passed via HTTP cokies; use to retrive value of cookie.
*/
    if ($_GET["action"] === "set")
        setcookie($_GET["name"], $_GET["value"], time() + (86400 * 7));
    if ($_GET["action"] === "get")
    {
        if ($_GET["name"])
            echo $_COOKIE($_GET["name"]."\n");
    }
    if ($_GET["action"] === "del")
        setcookie($_GET["name"], time() - (86400 * 7));
?>