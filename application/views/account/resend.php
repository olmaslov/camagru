

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
                        <div class="row justify-content-center texts">
                            <input type="button" name="" class="log-bnt inp-log col-sm-10" onClick="location.href='resend?res=true'"
                                   value="Resend e-mail">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>