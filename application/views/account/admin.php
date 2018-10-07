<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 03.10.18
 * Time: 20:42
 */ ?>
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
		<div class="modal-admin">
			<div class="back"></div>
			<!--				<div class="close"><i class="fas fa-times"></i></div>-->
			<div class="container admin-inner">
				<div class="row justify-content-center admin-inner">
					<div class="col-sm-3 left-admin">
						<div class="row justify-content-center">
							<button class="log-bnt inp-log col-sm-10">Users</button>
						</div>
						<div class="row justify-content-center">
							<button class="log-bnt inp-log col-sm-10">Posts</button>
						</div>
						<!--												<button>Users</button>-->
					</div>
					<div class="col-sm-9 right-admin"></div>
				</div>
			</div>
		</div>
	</div>
</div>
