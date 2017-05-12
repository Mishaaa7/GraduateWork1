<?php

if (!isset($_SESSION))session_start();
if (isset($_GET['do']) && $_GET['do']=='logout') {
    unset($_SESSION['user']);
    session_destroy();
}
if (!$_SESSION['user']) {
    header("Location: reg.php");
    exit();
}
arr_view($_SESSION['user']);

echo "<a href='content.php?do=logout'>Выход</a>";
function arr_view($arr) {
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            arr_view($value);
        }else {
            echo $key.' -> '.$value.'<br>';
        }
    }
}

