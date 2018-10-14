<?php //debug($vars);?>
<div class="background" style="background-image: url(
<?php
$random = rand(0, 7);
$bing_daily_image_xml = file_get_contents("http://bing.com/HPImageArchive.aspx?idx=" . $random . "&n=1");
preg_match("/<urlBase>(.+?)<\/urlBase>/is", $bing_daily_image_xml, $matches);
$bing_daily_img_url = "https://s.cn.bing.com" . $matches[1] . "_1920x1080.jpg";
echo "" . $bing_daily_img_url;
?>);"></div>
<div class="container">
    <!--    <div class="bg-image">-->
    <!---->
    <!--    </div>-->
    <!---->
    <!--    <div class="filter-bg-image">-->
    <!---->
    <!--    </div>-->
    <!--	<div class="test_abs">-->
    <!--		<div id="modal-content2">-->
    <!--			<div class="modal-2 login">-->
    <!--				<div class="back"></div>-->
    <!--				<div>-->
    <!--					<div class="close"><i class="fas fa-times" onclick="closemodal2()"></i></div>-->
    <?php
    //include_once './application/views/camera/enable.php';
    ?>
    <!--				</div>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <!--	<div id="modal-content">-->
    <!--			<div class="modal-2 register">-->
    <!--				<div class="back"></div>-->
    <!--				<div class="wrlog">-->
    <!--					<div class="wusr">-->
    <!--						<div class="log-usr">-->
    <!--							<i class="far fa-user"></i>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--					<div class="close"><i class="fas fa-times" onclick="closemodal()"></i></div>-->
    <!--					<h2 class="h2-login">Sign In</h2>-->
    <!--					<div class="container">-->
    <!--						<div class="row justify-content-center texts login-social">-->
    <!--							<p class="col-sm-4 social-login" onclick="fbLoginAJAX()"><i class="fab fa-facebook-square"></i></p>-->
    <!--							<p class="col-sm-4 social-login" onclick="glLoginAJAX()"><i class="fab fa-google-plus-square"></i></p>-->
    <!--							<p class="col-sm-4 social-login" onclick="intraLoginAJAX()"><img class="icon_42" src="/camagru_mvc/public/img/42_icon.png"></p>-->
    <!--						</div-->
    <!--						<form method="post" action="#">-->
    <!--							<div class="row justify-content-center texts">-->
    <!--								<input type="text" name="" class="inp-log col-sm-10" value="" placeholder="Login">-->
    <!--							</div>-->
    <!--							<div class="row justify-content-center texts">-->
    <!--								<input type="text" name="" class="inp-log col-sm-10" value="" placeholder="Password">-->
    <!--							</div>-->
    <!--							<div class="row justify-content-center texts">-->
    <!--								<input type="submit" name="" class="log-bnt inp-log col-sm-10" value="Login">-->
    <!--							</div>-->
    <!--						</form>-->
    <!--						<div class="row justify-content-center texts checks">-->
    <!--							<div class="custom-control custom-checkbox mr-sm-2 col-sm-4">-->
    <!--								<input type="checkbox" class="custom-control-input" checked id="customControlAutosizing">-->
    <!--								<label class="custom-control-label" for="customControlAutosizing">Remember me</label>-->
    <!--							</div>-->
    <!--							<a href="#" class="col-sm-4">Forgot password?</a>-->
    <!--						</div>-->
    <!--					</div>-->
    <!--				</div>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--	</div>-->
    <div class="row justify-content-center">
        <div class="col-lg-4 text-center">
            <h2>Timeline</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-5">
        </div>
        <div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block central-timeline">
            <div class="circle-empty"></div>
            <div class="vl"></div>
        </div>
        <div class="col-lg-5">
        </div>
    </div>

    <?php
    $flag = false;
    $name;
    $cname;

    foreach ($vars as $val) {
        if(isset($val['user']['login'])){
            $name = $val['user']['login'];
        }
        else {
            $name = $val['user']['f_name'];
        }
        if ($flag == false) {
            $flag = true;
            echo "<div class=\"row justify-content-center \">
            <div class=\"col-lg-5\">
            </div>
            <div class=\"col-lg-1 d-sm-none d-md-none d-none d-lg-block central-timeline\">
                <div class=\"circle\"></div>
                <div class=\"vl\"></div>
            </div>
            <div class=\"col-lg-5\">
                <div class=\"popup-left-corner toanim post pright\" id='post".$val['id']."'>
                    <p class='postUserName'>".$name."</p>
                    <p class='postDate'>".$val['creation_date']."</p>
                    <div class=\"img-tmln\">
                        <img src=\"https://localhost:8443/camagru_mvc/private/photo/" . $val['id'] . ".png\" alt=\"test\">
                        <div class=\"img-text\">
                            <p>".$val['descr']."</p>
                        </div>
                    </div>
                    <div class=\"social\">
                        <i class=\"material-icons like\" id=\"like".$val['id']."\" onclick=\"like(".$val['id'].")\">favorite_border</i>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-10 textcomm\">
                            <textarea name=\"name\" id='text".$val['id']."'></textarea>
                        </div>
                        <div class=\"col-2 pcom\">
                            <i class=\"material-icons sendcomm\" id='send".$val['id']."'>send</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
            if (isset($val['comment'])) {
                foreach ($val['comment'] as $value) {
                    if(isset($val['user']['login'])){
                        $cname = $value['user']['login'];
                    }
                    else {
                        $cname = $value['user']['f_name'];
                    }
                    echo "<div class=\"row justify-content-center \">
    			<div class=\"col-lg-5\">
    			</div>
    			<div class=\"col-lg-1 d-sm-none d-md-none d-none d-lg-block  central-timeline\">
    				<div class=\"vl\"></div>
    			</div>
    			<div class=\"col-lg-5\">
    				<div class=\"comment-right toanim\" data-postid=\"10\">
    				<p class='postUserName'>".$cname."</p>
                        <p class='postDate'>".$value['creation_date']."</p>
    					<p>".$value['text']."</p>
    				    </div>
    			    </div>
    		        </div>";
                }
            }
        }
        else {
            $flag = false;
            echo "<div class=\"row justify-content-center \">
    			<div class=\"col-lg-5\">
    				<div class=\"popup-right-corner toanim post\" id='post".$val['id']."'>
    					<p class='postUserName'>".$name."</p>
                        <p class='postDate'>".$val['creation_date']."</p>
    					<div class=\"img-tmln\">
    						<img src=\"https://localhost:8443/camagru_mvc/private/photo/" . $val['id'] . ".png\" alt=\"test\">
    						<div class=\"img-text\">
    							<p>".$val['descr']."</p>
    						</div>
    					</div>
    					<div class=\"social\">
    						<i class=\"material-icons like\" id=\"like".$val['id']."\" onclick=\"like(".$val['id'].")\">favorite_border</i>
    					</div>
    					<div class=\"row\">
    						<div class=\"col-10 textcomm\">
    							<textarea name=\"name\" id='text".$val['id']."'></textarea>
    						</div>
    						<div class=\"col-2 pcom\">
                                <i class=\"material-icons sendcomm\" id='send".$val['id']."'>send</i>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class=\"col-lg-1 d-sm-none d-md-none d-none d-lg-block central-timeline\">
    				<div class=\"circle\"></div>
    				<div class=\"vl\"></div>
    			</div>
    			<div class=\"col-lg-5\">
    			</div>
    		</div>";
            if (isset($val['comment'])) {
                foreach ($val['comment'] as $value) {
                    if(isset($val['user']['login'])){
                        $cname = $value['user']['login'];
                    }
                    else {
                        $cname = $value['user']['f_name'];
                    }
                    echo "<div class=\"row justify-content-center \">
    				<div class=\"col-lg-5\">
    				<div class=\"comment-right toanim\" data-postid=\"10\">
    				<p class='postUserName'>".$cname."</p>
                        <p class='postDate'>".$value['creation_date']."</p>
    					<p>".$value['text']."</p>
    				    </div>
    			    </div>
    			    <div class=\"col-lg-1 d-sm-none d-md-none d-none d-lg-block  central-timeline\">
    				<div class=\"vl\"></div>
    			    </div>
    			    <div class=\"col-lg-5\">
    			    </div>
    		        </div>";
                }
            }
        }

    } ?>
    <div class="row justify-content-center ">
        <div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block last-el central-timeline">
            <div class="end cssload-container" id="end">
                <ul class="cssload-flex-container">
                    <li>
                        <span class="cssload-loading"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="/camagru_mvc/public/js/isvisible.js"></script>
<script src="/camagru_mvc/public/js/addAndAnimate.js"></script>
<script src="/camagru_mvc/public/js/ajaxLoad.js"></script>
