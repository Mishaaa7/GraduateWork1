<?php
function autoload($class) {
    require_once(strtolower($class).".php");
}
spl_autoload_register('autoload');

$db = database::get_instance();
$pg_con = $db->get_connection();
$query = new query($pg_con);
$query->add_user(45454, 'kim', 'fhrudg', '{"paper": "A4", "count": 5}');
$query->add_record(2);
