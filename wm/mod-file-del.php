<?php if (!defined('WEBAPP')) die; ?>
<?php

if (!(isset($_SESSION[SECRET_KEY.'login']) && $_SESSION[SECRET_KEY.'login']==ROOT_LOGIN)) die;

$id = isset($_GET['id']) && is_numeric($_GET['id'])? $_GET['id'] : 0;

if ($id>0) file_del($id);

header('Location: index.php?cmd=files'); 

?>
