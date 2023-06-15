<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";

if(isGetMethod()) {
    if (isPath("/dev-web-api-2023/API/")) {
        require_once __DIR__ . "/routes/home/get.php";
        die();
    }elseif(isPath("/dev-web-api-2023/API/users")) {
        require_once __DIR__ . "/routes/users/get.php";
        die();
    }
}elseif(isPostMethod()) {
    if (isPath("/dev-web-api-2023/API/users")) {
        require_once __DIR__ . "/routes/users/post.php";
        die();
    }elseif(isPath("/dev-web-api-2023/API/login")) {
        require_once __DIR__ . "/routes/login/post.php";
        die();
    }
}elseif(isPatchMethod()) {
    if (isPath("/dev-web-api-2023/API/users/:user")) {
        require_once __DIR__ . "/routes/users/patch.php";
        die();
    }
}elseif(isDeleteMethod()) {
    if (isPath("/dev-web-api-2023/API/users/:user")) {
        require_once __DIR__ . "/routes/users/delete.php";
        die();
    }
}else {
    require_once __DIR__ . "/routes/notFound.php";
    die();
}