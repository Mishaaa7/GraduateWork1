<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.02.2017
 * Time: 21:05
 */


$client_id = '1249921792'; // Application ID
$public_key = 'CBAMEBILEBABABABA'; // Публичный ключ приложения
$client_secret = '73BFE05637B1C8A88659B3D7'; // Секретный ключ приложения
$redirect_uri = 'http://localhost/GraduateWork'; // Ссылка на приложение

$url = 'http://www.odnoklassniki.ru/oauth/authorize';
$params = array(
    'client_id'     => $client_id,
    'response_type' => 'code',
    'redirect_uri'  => $redirect_uri
);
echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Одноклассники</a></p>';
echo $link = '<p><a href="http://oauth.vk.com/authorize?client_id=5883776&redirect_uri=http://localhost/GraduateWork&response_type=code">Аутентификация через Вконтакте</a></p>';


$client_id = '176216536202399'; // Client ID
$client_secret = 'b4df154120290969e3c23a2f3253f6e6'; // Client secret
$redirect_uri = 'http://localhost/GraduateWork'; // Redirect URIs

$url = 'https://www.facebook.com/dialog/oauth';
$params = array(
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'scope'         => 'email,user_birthday'
);
echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Facebook</a></p>';
