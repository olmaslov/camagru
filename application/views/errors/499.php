

<!DOCTYPE html>
<html lang="en" dir="ltr">
<title>Email confirmation</title>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="/camagru_mvc/public/css/style.css">
    <link rel="stylesheet" href="/camagru_mvc/public/css/animate.css">
<!--    <script src="/camagru_mvc/public/js/login.js"></script>-->
    <script src="/camagru_mvc/public/js/error.js"></script>
    <link rel="stylesheet" href="https://cssgram-cssgram.netdna-ssl.com/cssgram.min.css">
    <title>login</title>
</head>

<body>
<div class="test_abs">
    <div class="background" style="background-image: url(
    <?php
    $random = rand(0, 7);
    $bing_daily_image_xml = file_get_contents("http://bing.com/HPImageArchive.aspx?idx=" . $random . "&n=1");
    preg_match("/<urlBase>(.+?)<\/urlBase>/is", $bing_daily_image_xml, $matches);
    $bing_daily_img_url = "https://s.cn.bing.com" . $matches[1] . "_1920x1080.jpg";
    echo "" . $bing_daily_img_url;
    ?>);"></div>
    <div id="modal-content">
        <div class="modal-1 login">
            <div class="back"></div>
            <div class="wrlog">
                <div class="wusr">
                    <div class="log-usr">
                        <i class="far fa-user"></i>
                    </div>
                </div>
                <div class="close"><i class="fas fa-times"></i></div>
                <h2 class="h2-login">Please confirm your email address</h2>
                <form action="" method="post">
                    <div class="container">
                    <!--                    <div class="row justify-content-center texts login-social">-->
                    <!--                        <p class="col-sm-4 social-login" onclick="fbLoginAJAX()"><i class="fab fa-facebook-square"></i>-->
                    <!--                        </p>-->
                    <!--                        <p class="col-sm-4 social-login" onclick="glLoginAJAX()"><i-->
                    <!--                                class="fab fa-google-plus-square"></i></p>-->
                    <!--                        <p class="col-sm-4 social-login" onclick="intraLoginAJAX()"><img class="icon_42"-->
                    <!--                                                                                         src="/camagru_mvc/public/img/42_icon.png">-->
                    <!--                        </p>-->
                    <!--                    </div>-->
                    <!--                    <div class="row justify-content-center texts">-->
                    <!--                        <input type="text" id="logLogin" name="" class="inp-log col-sm-10" value="" placeholder="Login">-->
                    <!--                    </div>-->
                    <!--                    <div class="row justify-content-center texts">-->
                    <!--                        <input type="password" id="logPass" name="" class="inp-log col-sm-10" value="" placeholder="Password">-->
                    <!--                    </div>-->
                    <div class="row justify-content-center texts">
                        <input type="button" name="" class="log-bnt inp-log col-sm-10" onClick="location.href='resend'"
                               value="Resend e-mail">
                    </div>
                </form>
                    <!--                    <div class="row justify-content-center texts checks">-->
                    <!--                        <div class="custom-control custom-checkbox mr-sm-2 col-sm-4">-->
                    <!--                            <input type="checkbox" class="custom-control-input" checked id="customControlAutosizing">-->
                    <!--                            <label class="custom-control-label" for="customControlAutosizing">Remember me</label>-->
                    <!--                        </div>-->
                    <!--                        <a href="#" class="col-sm-4">Forgot password?</a>-->
                    <!--                    </div>-->
                    <div class="row justify-content-center texts checks">
                        <a href="./register" class="col-sm-12">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>