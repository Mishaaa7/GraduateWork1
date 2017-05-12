<?php

$host = 'localhost';
$port = '5432';
$user = 'postgres';
$password = 'admin';
$db = 'test';

$link = pg_connect("host=$host port=$port dbname=$db user=$user password=$password");
if(!$link) echo "Connect Error";

