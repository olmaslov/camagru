<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 9/11/18
 * Time: 5:01 PM
 */

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class SavetodbController extends Controller {
    public function saveAction() {
        var_dump($_POST);
        if ($_POST['type'] == 'video') {
            $data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);

            $decodedData = base64_decode($data);
            file_put_contents('private/video/' . rand(1, 1000) . '.mp4', $decodedData);
        } elseif ($_POST['type'] == 'pic') {
            $data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);

            $decodedData = base64_decode($data);
            file_put_contents('private/photo/' . rand(1, 1000) . '.png', $decodedData);
        }
    }
}