<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 23:06
 */

namespace application\controllers;


use application\core\Controller;
use application\core\View;
use application\lib\Db;

class PostController extends Controller {
    public function getAction () {
        if (isset($_POST['lastid']) && $this->funk->checkAcc($_COOKIE)){
            $res = $this->model->get_post();
            $flag = false;

            foreach ($res as $val) {
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
                        <i class=\"material-icons like\" id=\"like".$val['id']."\" onclick=\"likePost(".$val['id'].")\">favorite_border</i>
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
            }
        }
        else
            View::errorCode(403);
    }

    public function commentAction () {
        if (isset($_POST['comment'], $_POST['id'])){
            $code = json_decode($this->funk->checkAcc($_COOKIE));
            if ($code->code == 0) {
                if ($this->model->add_comment()) {
                    echo 1;
                } else
                    echo 0;
            }
            else
                echo 0;
        }
        else
            View::errorCode(403);
    }

    public function likeAction (){
        if (isset($_POST['like'], $_POST['id'])){
            $code = json_decode($this->funk->checkAcc($_COOKIE));
            if ($code->code == 0) {
                if ($this->model->add_like()) {
                    echo 1;
                } else
                    echo 0;
            }
            else
                echo 0;
        }
        else
            View::errorCode(403);
    }
}