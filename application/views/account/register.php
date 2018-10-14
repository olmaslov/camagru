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
                <h2 class="h2-login">Sign up</h2>
                <div class="container">
                    <div class="row justify-content-center texts">
                        <input type="text" id="loginReg" name="" class="inp-log col-sm-10" value="" placeholder="Login">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="emailReg" name="" class="inp-log col-sm-10" value=""
                               placeholder="E-mail">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="fnameReg" name="" class="inp-log col-sm-10" value=""
                               placeholder="First name">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="lnameReg" name="" class="inp-log col-sm-10" value=""
                               placeholder="Last name">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="password" id="passReg" name="" class="inp-log col-sm-10" value=""
                               placeholder="Password">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="password" id="confReg" name="" class="inp-log col-sm-10" value=""
                               placeholder="Confirm password">
                    </div>
                    <div class="row justify-content-center texts">
                        <button onclick="registerSimple()" class="log-bnt inp-log col-sm-10" value="Register">Register
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>