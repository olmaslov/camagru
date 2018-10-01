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
        if ($_POST['type'] == 'video') {
            $data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);


            $params = [
                'uid' => 1,
                'descr' => $_POST['descr'],
                'type' => 1
            ];
            $name = $this->model->save_post($params);
            $decodedData = base64_decode($data);
            file_put_contents('private/video/' . $name . '.mp4', $decodedData);
        } elseif ($_POST['type'] == 'pic') {
            $data = substr($_POST['data'], strpos($_POST['data'], ",") + 1);

            $params = [
                'uid' => 1,
                'descr' => $_POST['descr'],
                'type' => 0
            ];
            $name = $this->model->save_post($params);
            $decodedData = base64_decode($data);
            file_put_contents('private/photo/' . $name . '.png', $decodedData);
        }
        print_r($name);
    }
}