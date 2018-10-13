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
				<h2 class="h2-login">Renew password</h2>
				<div class="container">
					<div class="row justify-content-center texts">
						<input type="text" id="login" name="" class="inp-log col-sm-10" value="" placeholder="Login">
					</div>
					<div class="row justify-content-center texts">
						<input type="button" name="" class="log-bnt inp-log col-sm-10" onclick="renewPass()"
							   value="Send">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>