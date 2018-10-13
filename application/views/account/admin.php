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
					<div class="col-sm-12 justify-content-center right-admin">
						<div class="user-adm row">
							<div class="col-sm-2">
								<p>User-id</p>
							</div>
							<div class="col-sm-2">
								<p>User login</p>
							</div>
							<div class="col-sm-2">
								<p>User name</p>
							</div>
							<div class="col-sm-2">
								<p>User last name</p>
							</div>
							<div class="col-sm-2">
								<p>Delete</p>
							</div>
							<div class="col-sm-2">
								<p>Get adm role</p>
							</div>
						</div>
						<?php
						foreach ($vars as $val) {
							echo "<div class=\"user-adm row\">
							<div class=\"col-sm-2\">
								<p>{$val['id']}</p>
							</div>
							<div class=\"col-sm-2\">
								<p>{$val['login']}</p>
							</div>
							<div class=\"col-sm-2\">
								<p>{$val['f_name']}</p>
							</div>
							<div class=\"col-sm-2\">
								<p>{$val['l_name']}</p>
							</div>
							<div class=\"col-sm-2\">
								<input type=\"button\" name=\"\" class=\"adm-bnt inp-log col-sm-10\" onclick=\"delUsr({$val['id']})\"
									   value=\"Delete\">
							</div>";
							if ($val['role'] != '1')
								echo "<div class=\"col-sm-2\">
								<input type=\"button\" name=\"\" class=\"adm-bnt inp-log col-sm-10\" onclick=\"admUsr({$val['id']})\"
									   value=\"Get\">
							</div>
						</div>";
						}
//						var_dump($vars[0]['id']);
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/camagru_mvc/public/js/admin.js"></script>