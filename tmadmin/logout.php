<<<<<<< HEAD
<?php
/**
 * Developed by tenthfeet.com
 */
ob_start();
session_start();
require_once 'config.php';
$user_obj = new Class_Admin();
=======
<?php
/**
 * Developed by tenthfeet.com
 */
ob_start();
session_start();
require_once 'config.php';
$user_obj = new Class_Admin();
>>>>>>> 80ad18a9e8edf8966f3abec631dd834096f06899
$data = $user_obj->logout();