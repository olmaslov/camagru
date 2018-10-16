
<div class="container">
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
    unset($vars['header']);
    if ($vars){
    foreach ($vars as $key => $val) {
            if (isset($val['user']['login'])) {
                $name = $val['user']['login'];
            } else {
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
                <div class=\"popup-left-corner toanim post pright\" id='post" . $val['id'] . "'>
                    <p class='postUserName'>" . $name . "</p>
                    <p class='postDate'>" . $val['creation_date'] . "</p>
                    <div class=\"img-tmln\">
                        <img src=\"https://localhost:8443/camagru_mvc/private/photo/" . $val['id'] . ".png\" alt=\"test\">
                        <div class=\"img-text\">
                            <p>" . $val['descr'] . "</p>
                        </div>
                    </div>
                    <div class=\"social\">";
                if ($val['like'] == true)
                    echo "<i class=\"material-icons\" id=\"likePost" . $val['id'] . "\" >favorite</i>";
                else
                    echo "<i class=\"material-icons like\" id=\"likePost" . $val['id'] . "\" onclick=\"likePost(" . $val['id'] . ")\">favorite_border</i>";
                echo "
                    <p class='countlike'>" . $val['likecount']['total'] . "</p></div>
                    <div class=\"row\">
                        <div class=\"col-10 textcomm\">
                            <textarea name=\"name\" id='text" . $val['id'] . "'></textarea>
                        </div>
                        <div class=\"col-2 pcom\">
                            <i class=\"material-icons sendcomm\" id='send" . $val['id'] . "'>send</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
                if (isset($val['comment'])) {
                    foreach ($val['comment'] as $value) {
                        if (isset($val['user']['login'])) {
                            $cname = $value['user']['login'];
                        } else {
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
    				<p class='postUserName'>" . $cname . "</p>
                        <p class='postDate'>" . $value['creation_date'] . "</p>
    					<p>" . $value['text'] . "</p>
    				    </div>
    			    </div>
    		        </div>";
                    }
                }
            } else {
                $flag = false;
                echo "<div class=\"row justify-content-center \">
    			<div class=\"col-lg-5\">
    				<div class=\"popup-right-corner toanim post\" id='post" . $val['id'] . "'>
    					<p class='postUserName'>" . $name . "</p>
                        <p class='postDate'>" . $val['creation_date'] . "</p>
    					<div class=\"img-tmln\">
    						<img src=\"https://localhost:8443/camagru_mvc/private/photo/" . $val['id'] . ".png\" alt=\"test\">
    						<div class=\"img-text\">
    							<p>" . $val['descr'] . "</p>
    						</div>
    					</div>
    					<div class=\"social\">";
                if ($val['like'] == true)
                    echo "<i class=\"material-icons\" id=\"likePost" . $val['id'] . "\" >favorite</i>";
                else
                    echo "<i class=\"material-icons like\" id=\"likePost" . $val['id'] . "\" onclick=\"likePost(" . $val['id'] . ")\">favorite_border</i>";
                echo "
                <p class='countlike'>" . $val['likecount']['total'] . "</p></div>	
    					<div class=\"row\">
    						<div class=\"col-10 textcomm\">
    							<textarea name=\"name\" id='text" . $val['id'] . "'></textarea>
    						</div>
    						<div class=\"col-2 pcom\">
                                <i class=\"material-icons sendcomm\" id='send" . $val['id'] . "'>send</i>
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
                        if (isset($val['user']['login'])) {
                            $cname = $value['user']['login'];
                        } else {
                            $cname = $value['user']['f_name'];
                        }
                        echo "<div class=\"row justify-content-center \">
    				<div class=\"col-lg-5\">
    				<div class=\"comment-right toanim\" data-postid=\"10\">
    				<p class='postUserName'>" . $cname . "</p>
                        <p class='postDate'>" . $value['creation_date'] . "</p>
    					<p>" . $value['text'] . "</p>
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
