<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 15.08.18
 * Time: 4:10
 */

namespace application\models;


use application\core\Model;

class Account extends Model
{
    public function intraLogin($token)
    {
        $info = json_decode(file_get_contents("https://api.intra.42.fr/v2/me?access_token={$token->access_token}"));

        $hash = generateCode();
        $jsonret = array();
        $res = $this->db->row("SELECT * from users WHERE email = '" . $info->email . "'");
        if (!$res) {
            $params = [
                'email' => $info->email,
                'first_name' => $info->first_name,
                'last_name' => $info->last_name,
                'id' => $info->id,
                'atoken' => $token->access_token,
                'rtoken' => $token->refresh_token,
                'img' => $info->image_url,
                'hash' => $hash
            ];
            $this->db->query("INSERT INTO `users` 
(`email`, `f_name`, `l_name`, `intra_id`, `token`, `rtoken`, `pic`, `role`, `hash`) 
VALUES (:email, :first_name, :last_name, :id, :atoken, :rtoken,  :img, '2', :hash)",
                $params);
            $query = $this->db->row("SELECT * from users WHERE email = '" . $info->email . "'");
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $query['id'];
            return (json_encode($jsonret));
        } else {
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $res['id'];
            $params = [
                'id' => $res['id']
            ];
            $this->db->query("UPDATE `users` SET `hash`= '" . $hash . "' WHERE `id` = :id", $params);
            return (json_encode($jsonret));
        }
    }

    public function googleLogin($id)
    {
        $info = json_decode(file_get_contents("https://www.googleapis.com/oauth2/v3/tokeninfo?id_token={$id}"));
        $finfo = json_decode(file_get_contents("https://people.googleapis.com/v1/people/{$info->sub}?personFields=names%2Cphotos&key=AIzaSyA6ffMzDx8Cf0Z6RKFZdugQPD5CB1tRvTc"));
        $names = $finfo->names;
        $photos = $finfo->photos;


        $hash = generateCode();
        $jsonret = array();
        $res = $this->db->row("SELECT * from users WHERE email = '" . $info->email . "'");
        if (!$res) {
            $params = [
                'email' => $info->email,
                'first_name' => $names[0]->givenName,
                'last_name' => $names[0]->familyName,
                'id' => $info->sub,
                'img' => $photos[0]->url,
                'hash' => $hash
            ];
            $this->db->query("INSERT INTO `users` 
(`email`, `f_name`, `l_name`, `google_id`, `pic`, `role`, `hash`) 
VALUES (:email, :first_name, :last_name, :id, :img, 2, :hash)",
                $params);
            $query = $this->db->row("SELECT * from users WHERE email = '" . $info->email . "'");
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $query['id'];
            return (json_encode($jsonret));
        } else {
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $res['id'];
            $params = [
                'id' => $res['id']
            ];
            $this->db->query("UPDATE `users` SET `hash`= '" . $hash . "' WHERE `id` = :id", $params);
            return (json_encode($jsonret));
        }
    }

    public function fbLogin($access_token)
    {
        $info = json_decode(file_get_contents("https://graph.facebook.com/debug_token?input_token={$access_token}&access_token=661075234258974|VKpTBgv38oel1Y0alZw1GCNY2j4"));
        $photo = json_decode(file_get_contents("https://graph.facebook.com/{$info->data->user_id}/picture?fields=url&height=500&redirect=0&access_token={$access_token}"));
        $fname = json_decode(file_get_contents("https://graph.facebook.com/{$info->data->user_id}?fields=first_name&access_token={$access_token}"));
        $lname = json_decode(file_get_contents("https://graph.facebook.com/{$info->data->user_id}?fields=last_name&access_token={$access_token}"));
        $email = json_decode(file_get_contents("https://graph.facebook.com/{$info->data->user_id}?fields=email&access_token={$access_token}"));

        $hash = generateCode();
        $jsonret = array();
        $res = $this->db->row("SELECT * from users WHERE email = '" . $email->email . "'");
        if (!$res) {
            $params = [
                'email' => $email->email,
                'first_name' => $fname->first_name,
                'last_name' => $lname->last_name,
                'id' => $info->data->user_id,
                'atoken' => $access_token,
                'img' => $photo->data->url,
                'hash' => $hash
            ];
            $this->db->query("INSERT INTO `users` 
(`email`, `f_name`, `l_name`, `fb_id`, `token`, `pic`, `role`, `hash`) 
VALUES (:email, :first_name, :last_name, :id, :atoken, :img, '2', :hash)", $params);
            $query = $this->db->row("SELECT * from users WHERE email = '" . $email->email . "'");
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $query['id'];
            return (json_encode($jsonret));
        } else {
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $res['id'];
            $params = [
                'id' => $res['id']
            ];
            $this->db->query("UPDATE `users` SET `hash`= '" . $hash . "' WHERE `id` = :id", $params);
            return (json_encode($jsonret));
        }
    }

    public function registerSimple($args)
    {
        $hash = generateCode();
        $jsonret = array();
        $res = $this->db->row("SELECT * from users WHERE email = '" . $args['email'] . "'");
        $res2 = $this->db->row("SELECT * from users WHERE login = '" . $args['login'] . "'");
        if (!$res && !$res2) {
            $params = [
                'email' => $args['email'],
                'first_name' => $args['fname'],
                'last_name' => $args['lname'],
                'pass' => hash('md5', $args['pass']),
                'login' => $args['login'],
                'hash' => $hash
            ];
            $this->db->query("INSERT INTO `users` 
(`email`, `f_name`, `l_name`, `password`, `login`, `role`, `hash`) 
VALUES (:email, :first_name, :last_name, :pass, :login, '2', :hash)", $params);
            $query = $this->db->row("SELECT * from users WHERE email = '" . $args['email'] . "'");
            $jsonret['hash'] = $hash;
            $jsonret['id'] = $query['id'];
            return (json_encode($jsonret));
        } else {
            $jsonret['error'] = 'user already exists';
            return (json_encode($jsonret));
        }
    }

    public function loginSimple($args)
    {
        $res = $this->db->row("SELECT * from users WHERE login = '" . $args['login'] . "'");
        $ret = array();
        if ($res) {
            if ($res['password'] == hash('md5', $args['pass'])) {
                $ret['hash'] = generateCode();
                $ret['id'] = $res['id'];
                $ret['code'] = 1;

                $this->db->query("UPDATE `users` SET `hash`= '" .$ret['hash']. "' WHERE `id`= '" .$ret['id']. "';");

                return json_encode($ret);
            } else {
                $ret['code'] = 2;
                return json_encode($ret);
            }
        } else {
            $ret['code'] = 0;
            return json_encode($ret);
        }
    }

    public function checkAcc($args){

    }
}