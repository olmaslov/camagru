<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 23:06
 */

namespace application\controllers;


use application\core\Controller;
use application\lib\Db;

class PostController extends Controller {
    public function getAction () {
        $res  = $this->model->get_post(1, 4, 0);
        foreach ($res as $var) { ?>
            <div class="row justify-content-center " id="test1">
                <div class="col-lg-5">
                </div>
                <div class="col-lg-1 d-sm-none d-md-none d-none d-lg-block  central-timeline">
                    <div class="circle"></div>
                    <div class="vl"></div>
                </div>
                <div class="col-lg-5">
                    <div class="popup-left-corner toanim post" data-postid="<?php echo $var['id'];?>">
                        <div class="img-tmln">
                            <img
                                src="<?php if ($var['type'] == 0) echo 'private/photo/' . $var['id'] . '.png'; ?>"
                                alt="test3">
                            <div class="img-text">
                                <p><?php echo $var['descr']; ?></p>
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
            <?php
        }
    }
}