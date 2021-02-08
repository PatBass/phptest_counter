<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 5/25/14
 * Time: 12:16 PM
 */
session_start();


require_once 'libs/autoload.inc.php';
require_once 'models/autoload.inc.php';
$db = DBFactory::getMysqlConnectionWithPDO();
$manager_log = new ConnectionManager_PDO($db);
$upload_manager = new UploadManager($db);

function connected()
{
return !empty($_SESSION['id']);
}

ob_start();



if(!empty($_GET['module']))
{
    $module = dirname(__FILE__).'/modules/'.$_GET['module'].'/';
    $action = (!empty($_GET['action'])) ? $_GET['action'].'.php' : 'index.php';

    if(is_file($module.$action))
    {
        include $module.$action;
    }
    else
    {
        include 'global/home.php';
    }

}
else
{
    include 'global/home.php';
}

$content = ob_get_clean();

include 'global/head.php';

echo $content;

include 'global/footer.php';


