<?php

if (!isset($_SESSION))session_start();
function autoload($class) {
    require_once(strtolower($class).".php");
}
spl_autoload_register('autoload');

//vk
/*
$app_id = '5883776';
$secure_key = 'LyQLATLlYVfYjfqkKgaW';
$url = 'http://localhost/GraduateWork';
if (isset($_GET['code'])) {

    $params = array(
        'client_id' => $app_id,
        'client_secret' => $secure_key,
        'redirect_uri' => $url,
        'code' => $_GET['code']
    );
    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,verified,first_name,last_name,city,country,home_town,education,schools,screen_name,sex,bdate,photo_50',
            'access_token' => $token['access_token']
        );

        $json_vk = file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params)));
        $userInfo = json_decode($json_vk, true);

        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
            $db = database::get_instance();
            $pg_con = $db->get_connection();
            $user_social_id = $userInfo['uid'].'';

            $result = pg_query($pg_con, "SELECT id_user FROM myschema.users WHERE social_id='$user_social_id'");
            $query = new query($pg_con);
            if (!pg_fetch_row($result)) {
                $query->add_user($userInfo['uid'], $userInfo['first_name'], $userInfo['last_name'], $json_vk);
            }
                $result = pg_query($pg_con, "SELECT id_user FROM myschema.users WHERE social_id='$user_social_id'");
                $query->add_record(pg_fetch_row($result)[0]);
        }
        if ($result) {
            $_SESSION['user'] = $userInfo;
            header('Location: content.php');
        }
    }
}



$client_id = '1249921792'; // Application ID
$public_key = 'CBAMEBILEBABABABA'; // Публичный ключ приложения
$client_secret = '73BFE05637B1C8A88659B3D7'; // Секретный ключ приложения
$redirect_uri = 'http://localhost/GraduateWork'; // Ссылка на приложение

if (isset($_GET['code'])) {

    $params = array(
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code',
        'client_id' => $client_id,
        'client_secret' => $client_secret
    );

    $url = 'http://api.odnoklassniki.ru/oauth/token.do';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url); // url, куда будет отправлен запрос
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params))); // передаём параметры
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    curl_close($curl);

    $tokenInfo = json_decode($result, true);
}

if (isset($tokenInfo['access_token']) && isset($public_key)) {
    $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$client_secret}"));

    $params = array(
        'method'          => 'users.getCurrentUser',
        'access_token'    => $tokenInfo['access_token'],
        'application_key' => $public_key,
        'format'          => 'json',
        'sig'             => $sign
    );
}
if (isset($tokenInfo['access_token']) && isset($public_key)) {
    $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$client_secret}"));

    $params = array(
        'method'          => 'users.getCurrentUser',
        'access_token'    => $tokenInfo['access_token'],
        'application_key' => $public_key,
        'format'          => 'json',
        'sig'             => $sign
    );
    $json_ok = file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params)));
    $userInfo = json_decode($json_ok, true);

    $db = database::get_instance();
    $pg_con = $db->get_connection();
    $user_social_id = $userInfo['uid'].'';


    $result = pg_query($pg_con, "SELECT id_user FROM myschema.users WHERE social_id='$user_social_id'");
    $query = new query($pg_con);
    if (!pg_fetch_row($result)) {
        $query->add_user($userInfo['uid'], $userInfo['first_name'], $userInfo['last_name'], $json_ok);
    }

    $result = pg_query($pg_con, "SELECT id_user FROM myschema.users WHERE social_id='$user_social_id'");
    $query->add_record(pg_fetch_row($result)[0]);

}
if (isset($tokenInfo['access_token']) && isset($public_key)) {
    $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$client_secret}"));

    $params = array(
        'method'          => 'users.getCurrentUser',
        'access_token'    => $tokenInfo['access_token'],
        'application_key' => $public_key,
        'format'          => 'json',
        'sig'             => $sign
    );
    $userJson = file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params)));
    $userInfo = json_decode($userJson, true);

    if (isset($userInfo['uid'])) {
        $result = true;
    }
    if ($result) {
        $_SESSION['user'] = $userInfo;
        header('Location: content.php');
    }

}
*/

//facebook

$client_id = '176216536202399'; // Client ID
$client_secret = 'b4df154120290969e3c23a2f3253f6e6'; // Client secret
$redirect_uri = 'http://localhost/GraduateWork'; // Redirect URIs

$url = 'https://www.facebook.com/v2.9/dialog/oauth';
if (isset($_GET['code'])) {
    echo $_GET['code'];
    $result = false;

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'client_secret' => $client_secret,
        'code'          => $_GET['code']
    );

    $url = 'https://graph.facebook.com/v2.9/oauth/access_token';

    $tokenInfo = null;
    $tokenInfo = json_decode(file_get_contents($url . '?' . http_build_query($params)), true);

    if (count($tokenInfo) > 0 && isset($tokenInfo['access_token'])) {
        $params = array(
            'fields' => 'id,name,first_name,last_name,email,birthday,devices,education', //https://developers.facebook.com/docs/graph-api/reference/v2.3/user
            'access_token' => $tokenInfo['access_token']
        );
        $url = 'https://graph.facebook.com/v2.9/me?';;

        $userInfo=json_decode(file_get_contents($url.urldecode(http_build_query($params))),true);
        $db = database::get_instance();
        $pg_con = $db->get_connection();
        $user_social_id = $userInfo['id'].'';


        $result = pg_query($pg_con, "SELECT id_user FROM myschema.users WHERE social_id='$user_social_id'");
        $query = new query($pg_con);
        if (!pg_fetch_row($result)) {
            $query->add_user($userInfo['id'], $userInfo['first_name'], $userInfo['last_name'], $json_ok);
        }

        $result = pg_query($pg_con, "SELECT id_user FROM myschema.users WHERE social_id='$user_social_id'");
        $query->add_record(pg_fetch_row($result)[0]);
        if (isset($userInfo['id'])) {
            $userInfo = $userInfo;
            $result = true;
        }
    }

    if ($result) {
        $_SESSION['user'] = $userInfo;
        header('Location: content.php');
    }
}


