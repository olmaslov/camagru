<!DOCTYPE html>
<html lang="en" dir="ltr">
<title><?php echo $title;?></title>
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="./public/img/camagru_logo2alt.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>login</title>
</head>
<body>

<!--bing background-->
<div class="background" style="background-image: url(
<?php
$random = rand(0, 7);
$bing_daily_image_xml = file_get_contents("http://bing.com/HPImageArchive.aspx?idx=" . $random . "&n=1");
preg_match("/<urlBase>(.+?)<\/urlBase>/is", $bing_daily_image_xml, $matches);
$bing_daily_img_url = "https://s.cn.bing.com" . $matches[1] . "_1920x1080.jpg";
echo "" . $bing_daily_img_url;
?>);"></div>
<!--header-->
<?php
if ($header == true){?>
<div class="header">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
        <a class="navbar-brand" href="./"><img src="./public/img/camagru_logo2alt.png" width="60" alt="logo"></a>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="./take_photo" class="nav-link">
                <i class="material-icons">
                    camera_alt
                </i>
            </a>
        </li>
        <li class="nav-item">
            <a href="./my" class="nav-link">
                <i class="material-icons">
                    person
                </i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="logOut()">
            <i class="material-icons" >
                exit_to_app
            </i>
            </a>
        </li>
        </ul>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
        </div>
    </nav>
</div>
<!--end header-->
<?php }
echo $content; ?>

<!--footer-->
<footer class="page-footer font-small blue col-lg-1">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://localhost:8443/camagru_mvc/"> Camagru</a>
    </div>
    <!-- Copyright -->

</footer>
<!--end footer-->

<link rel="stylesheet" href="/camagru_mvc/public/css/style.css">
<link rel="stylesheet" href="/camagru_mvc/public/css/animate.css">
<script src="/camagru_mvc/public/js/account.js"></script>
<script src="/camagru_mvc/public/js/filters.js"></script>
</body>
</html>