<div class="test_abs">
    <div id="modal-content">
        <div class="modal-1 login">
            <div class="back"></div>
            <div class="wrlog">
                <div class="wusr">
                    <div class="log-usr">
                        <i class="far fa-user"></i>
                    </div>
                </div>
                <?php if ($log == '0'){?>
                <h2 class="h2-login">Sign In</h2>
                <div class="container">
                    <div class="row justify-content-center texts login-social">
                        <p class="col-sm-4 social-login" onclick="fbLoginAJAX()"><i class="fab fa-facebook-square"></i>
                        </p>
                        <p class="col-sm-4 social-login" onclick="glLoginAJAX()"><i
                                    class="fab fa-google-plus-square"></i></p>
                        <p class="col-sm-4 social-login" onclick="intraLoginAJAX()"><img class="icon_42"
                                                                                         src="/camagru_mvc/public/img/42_icon.png">
                        </p>
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="logLogin" name="" class="inp-log col-sm-10" value="" placeholder="Login">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="password" id="logPass" name="" class="inp-log col-sm-10" value="" placeholder="Password">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="button" name="" class="log-bnt inp-log col-sm-10" onclick="simpleLogin()"
                               value="Login">
                    </div>
                    <div class="row justify-content-center texts checks">
                        <div class="custom-control custom-checkbox mr-sm-2 col-sm-4">
                            <input type="checkbox" class="custom-control-input" checked id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                        </div>
                        <a href="./forgot" class="col-sm-4">Forgot password?</a>
                    </div>
                    <div class="row justify-content-center texts checks">
                        <a href="./register" class="col-sm-12">Register</a>
                    </div>
                </div>
                <?php } else {?>
                    <h2 class="h2-login">You already logged in</h2>
                    <div class="container">
                        <div class="row justify-content-center texts">
                            <input type="button" name="" class="log-bnt inp-log col-sm-10" onclick="logOut()"
                                   value="Logout">
                        </div>
                        <div class="row justify-content-center texts">
                            <input type="button" name="" class="log-bnt inp-log col-sm-10" onClick="location.href='./'"
                                   value="Go to gallery">
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>