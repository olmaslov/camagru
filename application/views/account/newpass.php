<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 03.10.18
 * Time: 20:43
 */ ?>
<div class="test_abs">
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
				<h2 class="h2-login">Please enter new password below</h2>
				<div class="container">
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