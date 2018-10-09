<div class="background" style="background-image: url(
<?php
$random = rand(0, 7);
$bing_daily_image_xml = file_get_contents("http://bing.com/HPImageArchive.aspx?idx=". $random ."&n=1");
preg_match("/<urlBase>(.+?)<\/urlBase>/is", $bing_daily_image_xml, $matches);
$bing_daily_img_url= "https://s.cn.bing.com" . $matches[1] . "_1920x1080.jpg";
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
		<div class="row justify-content-center ">
			<div class="col-lg-5">
			</div>
			<div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block central-timeline">
				<div class="circle"></div>
				<div class="vl"></div>
			</div>
			<div class="col-lg-5">
				<div class="popup-left-corner toanim post">
					<p>Lorem Ipsum is simply dummy text</p>
					<div class="img-tmln">
						<img src="https://www.w3schools.com/w3images/fjords.jpg" alt="test">
						<div class="img-text">
							<p>test text</p>
						</div>
					</div>
					<div class="social">
						<i class="fas fa-share" id="share0" onclick="share('share0')"></i>
						<i class="far fa-heart" id="like0" onclick="like('like0')"></i>
					</div>
					<div class="row">
						<div class="col-10 textcomm">
							<textarea name="name"></textarea>
						</div>
						<div class="col-2 pcom">
                            <i class="material-icons sendcomm">send</i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center ">
			<div class="col-lg-5">
				<div class="popup-right-corner toanim post">
					<p>Lorem ipsum...</p>
					<div class="img-tmln">
						<img src="https://www.w3schools.com/w3images/nature.jpg" alt="test2">
						<div class="img-text">
							<p>test text</p>
						</div>
					</div>
					<div class="social">
						<i class="fas fa-share"></i>
						<i class="far fa-heart"></i>
					</div>
					<div class="row">
						<div class="col-10 textcomm">
							<textarea name="name"></textarea>
						</div>
						<div class="col-2 pcom">
                            <i class="material-icons sendcomm">send</i>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block central-timeline">
				<div class="circle"></div>
				<div class="vl"></div>
			</div>
			<div class="col-lg-5">
			</div>
		</div>
		<div class="row justify-content-center " id="test1">
			<div class="col-lg-5">
			</div>
			<div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block  central-timeline">
				<div class="circle"></div>
				<div class="vl"></div>
			</div>
			<div class="col-lg-5">
				<div class="popup-left-corner toanim post" data-postid="10">
					<p>Sed ut perspiciatis...</p>
					<div class="img-tmln">
						<img src="https://www.w3schools.com/w3images/lights.jpg" alt="test3">
						<div class="img-text">
							<p>test text</p>
						</div>
					</div>
					<div class="social">
						<i class="fas fa-share" title="share"></i>
						<i class="far fa-heart" title="like"></i>
					</div>
					<div class="row">
						<div class="col-10 textcomm">
							<textarea name="name"></textarea>
						</div>
						<div class="col-2 pcom">
                            <i class="material-icons sendcomm">send</i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row justify-content-center ">
			<div class="col-lg-5">
			</div>
			<div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block  central-timeline">
<!--				<div class="circle"></div>-->
				<div class="vl"></div>
<!--				<div class="end"></div>-->
			</div>
			<div class="col-lg-5">
				<div class="comment-right toanim" data-postid="10">
					<p>Test comment...</p>
				</div>
			</div>
		</div>
		<div class="row justify-content-center ">
			<div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block last-el central-timeline">
<!--				<div class="circle"></div>-->
<!--				<div class="vl"></div>-->
<!--				<div class="end" id="end"></div>-->
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
<?php //foreach ($news as $val):
//    var_dump($val)?>
<!--	<h3>--><?//= $val['title']; ?><!--</h3>-->
<!--	<p>--><?//= $val['description']; ?><!--</p>-->
<?php //endforeach; ?>
