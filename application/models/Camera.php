<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 27.08.18
 * Time: 20:38
 */

namespace application\models;


use application\core\Model;
use application\core\View;

use PDO;

class Camera extends Model {
  	public function add_mask($args) {
        $data = substr($args['data'], strpos($args['data'], ",") + 1);
        $decodedData = base64_decode($data);

        $wm=imagecreatefrompng('./public/img/masks/'.$args['mask'].'.png');

        $wmW=imagesx($wm);

        $wmH=imagesy($wm);

        $image=imagecreatetruecolor($wmW, $wmH);
        $image=imagecreatefromstring($decodedData);

        $imW = imagesx($image);
        $imH = imagesy($image);

        $cx=$imW-$wmW-10;
        $cy=$imH-$wmH-10;

        imagecopyresampled($image, $wm, $cx, $cy, 0, 0, $wmW, $wmH, $wmW, $wmH);

        header('Content-Type: image/png');

        ob_start();

        imagepng($image, NULL);

        $imagedata = ob_get_contents();
        ob_end_clean();

        print "data:image/png;base64,".base64_encode($imagedata);

        imagedestroy($image);

        imagedestroy($wm);
    }

    public function get_user_photos($args) {
  	    if ($this->funk->validateUser($args)){
  	        $res = $this->db->all("SELECT id from posts WHERE uid = '" . $args['id'] . "' ORDER BY id DESC");
            return $res;
        }
        else
            View::errorCode(403);
    }
}