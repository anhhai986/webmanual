<?php
define('WEBAPP',true);

session_start();

require_once('inc.config.php');
require_once('inc.fun.php');

function error_handler($errno, $errstr, $errfile, $errline) {
    throw new Exception($errstr);
}
set_error_handler('error_handler');

$cmd = isset($_REQUEST['cmd']) && is_string($_REQUEST['cmd'])?
   substr($_REQUEST['cmd'],0,10) : 'frame';

$start = "index.php?cmd=welcome";
if (App::mod()->registered())
    $start = "index.php?cmd=node&id=0";
else if (isset($_GET['id']) && is_numeric($_GET['id']) && !isset($_GET['cmd'])) {
    auto_open($_GET['id']);
    $start = "index.php?cmd=text&id=".$_GET['id'];
}

switch($cmd) {
    case 'frame': echo view('frame.php',array('start'=>$start)); break;
    case 'welcome': echo view('welcome.php'); break;
    case 'topic': echo view('topic.php'); break;
    case 'idxlist': echo view('idxlist.php'); break;
    case 'search': echo view('search.php'); break;
    case 'files': echo view('files.php'); break;
    case 'text': echo view('text.php'); break;
    case 'node': echo view('node.php'); break;
    case 'login': include('mod-login.php'); break;
    case 'logout': include('mod-logout.php'); break;
    case 'switch': include('switch.php'); break;
    case 'text-del': include('mod-text-del.php'); break;
    case 'text-add': include('mod-text-add.php'); break;
    case 'text-edit': include('mod-text-edit.php'); break;
    case 'text-move': include('mod-text-move.php'); break;
    case 'tree-del': include('mod-tree-del.php'); break;
    case 'tree-add': include('mod-tree-add.php'); break;
    case 'tree-edit': include('mod-tree-edit.php'); break;
    case 'tree-move': include('mod-tree-move.php'); break;
    case 'file-del': include('mod-file-del.php'); break;
    case 'file-add': include('mod-file-add.php'); break;
    case 'file-get': include('file-get.php'); break;
}

restore_error_handler();

?>
