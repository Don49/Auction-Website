<?php

$view = new stdClass();
require_once('Models/Login.php');
$view->pageTitle = 'logout';
session_start();



session_unset();

require_once('Views/index.phtml');