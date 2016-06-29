<?php
session_start();
require_once "config.php";
require_once "core/Controller.php";
require_once "inc/Base.php";
require_once "inc/Page.php";
require_once "inc/Admin.php";
require_once "models/Mysql.php";
require_once "models/Content.php";
require_once "models/Menu.php";
require_once "models/Admin.php";
require_once 'models/Counter.php';
require_once 'models/page_navigation.php';


$info = explode('/', $_GET['q']);

$params = [];
foreach ($info as $value)
{
    if ($value !=  '')
         $params [] = $value;
}
$action = "action_";

if ($_GET['nav'] == '')
    $_GET['nav'] = 1;
if (isset($params[1]))
    $action .= trim(strip_tags($params[1]));
else
    $action .= 'index';
$c = 'page';
if ($params[0])
{
    $c = trim(strip_tags($params[0]));
}

switch ($c)
{
    case 'page': $controller = new Page();
        break;
    case 'admin':
        if ($_SESSION['login'] && $_SESSION['pass'])
        $controller = new Admin();
        else
        {
            $controller = new Page();
            $action = 'action_enter';
        }
    break;
}

$controller->request($action, $params);



