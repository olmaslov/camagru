<div class="test_abs">
    <div id="modal-content">
        <div class="modal-1 login">
            <div class="back"></div>
            <div class="wrlog">
                <div class="wusr">

                </div>
                <h2 class="h2-login">Installation</h2>
                <div class="container">
                    <div class="row justify-content-center texts">
                        <input type="text" id="loginAdm" name="" class="inp-log col-sm-10" value="" placeholder="Admin login">
                    </div>
					<div class="row justify-content-center texts">
                        <input type="password" id="passAdm" name="" class="inp-log col-sm-10" value="" placeholder="Admin password">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="emailAdm" name="" class="inp-log col-sm-10" value=""
                               placeholder="E-mail">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="dbPath" name="" class="inp-log col-sm-10" value=""
                               placeholder="Database address(default localhost)">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="dbName" name="" class="inp-log col-sm-10" value=""
                               placeholder="Database name(default camagru)">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="text" id="dbUser" name="" class="inp-log col-sm-10" value=""
                               placeholder="Database user(default root)">
                    </div>
                    <div class="row justify-content-center texts">
                        <input type="password" id="dbPass" name="" class="inp-log col-sm-10" value=""
                               placeholder="Database password">
                    </div>
                    <div class="row justify-content-center texts">
                        <button onclick="installCamagru()" class="log-bnt inp-log col-sm-10" value="Start">Install
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/camagru_mvc/public/js/install.js"></script>