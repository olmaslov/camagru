<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 22:49
 */

namespace application\controllers;

use application\core\Controller;

use application\core\View;
use PDO;

class AccountController extends Controller {
	public function loginAction() {
		if (isset($_POST['intra'])) {
			$token = json_decode($_POST['intra']);
			exit ($this->model->intraLogin($token));
		}

		if (isset($_POST['secret'])) {
			$secret = json_decode(file_get_contents("application/config/client_id.json"));
			exit($secret->secret);
		}


		if (isset($_POST['google'])) {
			exit ($this->model->googleLogin($_POST['google']));
		}


		if (isset($_POST['fb'])) {
			exit ($this->model->fbLogin($_POST['access_token']));
		}

		if (isset($_POST['simple'])) {
			exit ($this->model->loginSimple($_POST));
		}

		$params['log'] = 0;
		if (isset($_COOKIE['hash'], $_COOKIE['id'])){
            $code = json_decode($this->funk->checkAcc($_COOKIE));
            if ($code->code == 2)
                header("Location: resend");
            else
                $params['log'] = 1;
        }
        $header = false;
		$this->view->render("login", $params, $header);

	}

	public function registerAction() {
		if (isset($_POST['register']) && !isset($_COOKIE['hash'], $_COOKIE['id'])) {
			exit($this->model->registerSimple($_POST));
		}
		elseif (isset($_COOKIE['hash'], $_COOKIE['id']) && !isset($_GET)){
		    header("Location: ./my");
        }

		if (isset($_GET['hash'])) {
			if ($this->model->verifyEmail($_GET) == 1) {
				header('Location: login#');
			}
		}

        $header = false;
		$this->view->render("register", $params, $header);
	}

	public function responseAction() {
		echo "<div id='test'></div>";
	}

	public function myAction() {
		$res = json_decode($this->funk->checkAcc($_COOKIE));
		if ($res->code == 0) {
			$params = $this->model->getUserInfo($_COOKIE);
			$header = true;
			$this->view->render("My account", $params, $header);
		} elseif ($res->code == 2) {
		    header('Location: resend');
		} else {
			header('Location: login#my');
		}
	}

	public function adminAction() {
		$res = json_decode($this->funk->checkAcc($_COOKIE));
		if ($res->code == 0) {
			if ($res->role == 1) {
				$params = $this->model->get_users();
                $header = true;
				$this->view->render("Admin page", $params, $header);
			} else {
				View::errorCode(403);
			}
		} else {
			header('Location: login#admin');
		}
	}

	public function resendAction() {
		if (isset($_COOKIE['hash'], $_COOKIE['id']))
		{
		    $code = json_decode($this->funk->checkAcc($_COOKIE));
		    if ($code->code == 2) {
                if (isset($_GET['res'])){
                    if ($_GET['res'] == 'true') {
                        if ($this->model->resendEmail($_COOKIE))
                            header('Location: login#');
                    }
                }
                else {
                    $header = false;
                    $this->view->render("resend email", NULL, $header);
                }
            }
            else {
                header('Location: login#');
            }
		}
	}

	public function changeAction() {
		if (isset($_COOKIE['hash'], $_COOKIE['id'], $_POST['nlogin'], $_POST['nname'], $_POST['nlname'], $_POST['receive'])) {
			$args = array_merge($_COOKIE, $_POST);
			$res = $this->model->editAcc($args);
			if ($res == 1)
				echo 1;
			elseif ($res == 2)
				echo 2;
			else
				echo 0;
		} elseif (isset($_COOKIE['hash'], $_COOKIE['id'], $_POST['npass'])) {
			$args = array_merge($_COOKIE, $_POST);
			$res = $this->model->editPass($args);
			if ($res == 1) {
                echo 1;
            }
			else
				echo 0;
		}
		elseif (isset($_POST['hash'], $_POST['id'], $_POST['npass'])) {
            $args = array_merge($_GET, $_POST);
            $res = $this->model->editPass($args);
            if ($res == 1) {
                echo 1;
            }
            else
                echo 0;
        }

		else {
			View::errorCode(403);
			echo 0;
		}
	}

	public function admAction() {
		if (isset($_COOKIE['hash'], $_COOKIE['id'], $_POST['id'])) {
			if ($this->model->get_adm_role())
				echo 1;
			else
				echo 0;
		} else
			View::errorCode(403);
	}

	public function delAction() {
		if (isset($_COOKIE['hash'], $_COOKIE['id'], $_POST['id'])) {
			if ($this->model->del_usr())
				echo 1;
			else
				echo 0;
		} else
			View::errorCode(403);
	}

	public function forgotAction() {
		if (isset($_POST['login'])){
			if ($this->model->sendpass()){
				exit("1");
			}
			else
				exit("0");
		}
		$header = false;
    	$this->view->render('Renew password', NULL, $header);
	}

	public function newpassAction(){
		if (isset($_GET['hash'], $_GET['id'])){
            $code = json_decode($this->funk->checkAcc($_GET));
            if ($code->code == 0) {
                $header = false;
                $this->view->render("Set new password", NULL, $header);
            }
            else
                header("Location: login");
		}
		else
			View::errorCode(403);
	}
}