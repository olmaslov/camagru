<div class="test_abs">
    <div class="background" style="background-image: url(
    <?php
    $random = rand(0, 7);
    $bing_daily_image_xml = file_get_contents("http://bing.com/HPImageArchive.aspx?idx=". $random ."&n=1");
    preg_match("/<urlBase>(.+?)<\/urlBase>/is", $bing_daily_image_xml, $matches);
    $bing_daily_img_url= "https://s.cn.bing.com" . $matches[1] . "_1920x1080.jpg";
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
                <h2 class="h2-login">Sign up</h2>
                <div class="container">
<!--                    <div class="row justify-content-center texts login-social">-->
<!--                        <p class="col-sm-4 social-login" onclick="fbLoginAJAX()"><i class="fab fa-facebook-square"></i></p>-->
<!--                        <p class="col-sm-4 social-login" onclick="glLoginAJAX()"><i class="fab fa-google-plus-square"></i></p>-->
<!--                        <p class="col-sm-4 social-login" onclick="intraLoginAJAX()"><img class="icon_42" src="/camagru_mvc/public/img/42_icon.png"></p>-->
<!--                    </div>-->
                        <div class="row justify-content-center texts">
                            <input type="text" id="loginReg" name="" class="inp-log col-sm-10" value="" placeholder="Login">
                        </div>
                        <div class="row justify-content-center texts">
                            <input type="text" id="emailReg" name="" class="inp-log col-sm-10" value="" placeholder="E-mail">
                        </div>
                        <div class="row justify-content-center texts">
                            <input type="text" id="fnameReg" name="" class="inp-log col-sm-10" value="" placeholder="E-mail">
                        </div>
                        <div class="row justify-content-center texts">
                            <input type="text" id="lnameReg" name="" class="inp-log col-sm-10" value="" placeholder="E-mail">
                        </div>
                        <div class="row justify-content-center texts">
                            <input type="text" id="passReg" name="" class="inp-log col-sm-10" value="" placeholder="Password">
                        </div>
                        <div class="row justify-content-center texts">
                            <input type="text" id="confReg" name="" class="inp-log col-sm-10" value="" placeholder="Confirm password">
                        </div>
                        <div class="row justify-content-center texts">
                            <button onclick="registerSimple()" class="log-bnt inp-log col-sm-10" value="Register">Register</button>
                        </div>
<!--                    <div class="row justify-content-center texts checks">-->
<!--                        <div class="custom-control custom-checkbox mr-sm-2 col-sm-4">-->
<!--                            <input type="checkbox" class="custom-control-input" checked id="customControlAutosizing">-->
<!--                            <label class="custom-control-label" for="customControlAutosizing">Remember me</label>-->
<!--                        </div>-->
<!--                        <a href="#" class="col-sm-4">Forgot password?</a>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>