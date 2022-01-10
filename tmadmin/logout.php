<?php
/**
 * Developed by tenthfeet.com
 */
ob_start();
session_start();
require_once 'config.php';
$user_obj = new Class_Admin();
$data = $user_obj->logout();