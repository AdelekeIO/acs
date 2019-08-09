<?php
// define("URL", "http://127.0.0.1:3000/");
define("URL", "http://127.0.0.1:3000/");
// test push kile
// $url = isset($_GET['url']) ? $_GET['url'] : null;
$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
$url = rtrim($url, "/");
$url = explode("/", $url);
//define("UPLOAD_DIR", "./fjfhjmtdhgbcnghjtg/");
include "./depen/Session.php";
require_once "./depen/dataprocessing.php";

$page = isset($url[1])?rtrim($url[1], ""):null ;

Session::init();
// session_destroy();
            
// $_SESSION["MapProjectAccessGranted"] = TRUE;
// $_SESSION["User_type"] = "admin";
// $_SESSION["user_id"] = "2gVJ63fOgvCVJCd";
// $_SESSION["email"] = 'shegzy.dguy@gmail.com';
// $_SESSION["username"] = 'shegzy.dguy';

if (Session::get("MapProjectAccessGranted") == FALSE) {

    if (isset($url[2]) && $url[2] == "request") {
        if ($url[2] === "register" || $url[2] === "login") {
            require_once "./depen/dataprocessing.php";
            $con = new dataprocessing();
            $con->$url[1]();

        }
    }
    else {
        if (empty($url[1])) {

            $data = 'score';
            $mypage = './pages/index.php';
            include_once './pages/header.php';
            include_once $mypage;
            include_once './pages/footer.php';
            return false;
        } else {
            if (isset($url[1])) {

                $mypage = './pages/' . $page . '.php';
           // echo $mypage;
           // die();
                if (file_exists($mypage)) {
                    include_once './pages/header.php';
                    include_once $mypage;
                    include_once './pages/footer.php';
                } else {
                    include_once './pages/header.php';
                    $mypage = './pages/index.php';
                    include_once $mypage;
                    include_once './pages/footer.php';
                    return false;
                }
            }
        }
        return;
    }
}

if (empty($url[1])) {

    $type = Session::get("User_type");
   // echo 'type'.$type;
   // die();
    include_once './pages/' . strtolower ($type) . '/incs/dheader.php';
    $mypage = './pages/' . strtolower ($type) . '/index.php';
    $data = 'score';

//      include_once './frags/footer.php';
    include_once './pages/' . strtolower ($type) . '/incs/nav.php';
    include_once $mypage;
    include_once './pages/' . strtolower ($type) . '/incs/dfooter.php';
    return false;
}

if (isset($url[3]) && $url[3] == "request") {
//      echo 'yo man';
    require_once "./depen/dataprocessing.php";
//      require_once './c/dashboard.php';
    $con = new dataprocessing();

    $con->$url[2]();
}
else if (isset($url[2])) {
     // echo 'url 1'.$url[1];
     // die();
    $type = Session::get("User_type");
    $mypage = './pages/' . strtolower ($type) . "/" . $page . '.php';

    if (file_exists($mypage)) {
//   include_once './frags/header.php';
        include_once './pages/' . strtolower ($type) . '/incs/dheader.php';
        
//      include_once './pages/'.$type ."/".$page . '.php';
        $data = $url[2];

        include_once './pages/' . strtolower ($type) . '/incs/nav.php';
        
        include_once $mypage;
        include_once './pages/' . strtolower ($type) . '/incs/dfooter.php';
        
//    include_once './frags/footer.php';
    }
} else {
    $type = Session::get("User_type");
    $mypage = './pages/' . strtolower ($type) . "/" . $page . '.php';

    if (file_exists($mypage)) {
    include_once './pages/' . strtolower ($type) . '/incs/dheader.php';
    include_once './pages/' . strtolower ($type) . '/incs/nav.php';
        include_once $mypage;
    include_once './pages/' . strtolower ($type) . '/incs/dfooter.php';
    } else {
        echo 'page not exist';
    }
}
