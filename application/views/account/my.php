<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 03.10.18
 * Time: 20:43
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
		<div class="modal-my login">
			<div class="back"></div>
			<div class="wrlog">
				<div class="wusr">
					<div class="log-usr">
						<?php if (!$pic) {
							echo "<i class=\"material-icons\">add_a_photo</i>";
						} else {
							echo "<img src=\"" . $pic . "\">";
						} ?>
					</div>
				</div>
				<h2 class="h2-login">Your account</h2>
				<div class="container">
					<div class="row justify-content-center texts">
						<input type="text" id="login" name="" class="inp-log col-sm-10"
							   value="<?php if ($login) echo $login; ?>"
							   placeholder="<?php if ($login) echo $login; else echo "Your login"; ?>">
					</div>
					<div class="row justify-content-center texts">
						<input type="text" id="firstName" name="" class="inp-log col-sm-10"
							   value="<?php if ($f_name) echo $f_name; ?>"
							   placeholder="<?php if ($f_name) echo $f_name; else echo "Your name"; ?>">
					</div>
					<div class="row justify-content-center texts">
						<input type="text" id="lastName" name="" class="inp-log col-sm-10"
							   value="<?php if ($l_name) echo $l_name; ?>"
							   placeholder="<?php if ($l_name) echo $l_name; else echo "Your last name"; ?>">
					</div>
					<div class="row justify-content-center texts">
						<input type="text" id="email" name="" class="inp-log col-sm-10" value="" disabled
							   placeholder="<?php if ($email) echo $email; else echo "Your email"; ?>">
					</div>
					<div class="row justify-content-center texts">
						<div class="custom-control custom-checkbox mr-sm-2 col-sm-10">
							<input type="checkbox" class="custom-control-input" <?php if ($receive == 1) echo "checked"?> id="receiveViaEmail">
							<label class="custom-control-label" for="receiveViaEmail">Receive comments via e-mail</label>
						</div>
					</div>
					<div class="row justify-content-center texts">
						<input type="button" name="" class="log-bnt inp-log col-sm-10" onclick="changeAccount()"
							   value="Apply">
					</div>
					<div class="row justify-content-center texts">
						<input type="password" id="pass" name="" class="inp-log col-sm-10" value=""
							   placeholder="Your new password">
					</div>
					<div class="row justify-content-center texts">
						<input type="password" id="passConirm" name="" class="inp-log col-sm-10" value=""
							   placeholder="Confirm your password">
					</div>
					<div class="row justify-content-center texts">
						<input type="button" name="" class="log-bnt inp-log col-sm-10" onclick="changePass()"
							   value="Change password">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>