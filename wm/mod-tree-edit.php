<?php if (!defined('WEBAPP')) die; ?>
<?php

if (!App::mod()->registered()) die;

$test_post = isset($_POST['id']) && isset($_POST['topic']) && isset($_POST['seq']) && 
        is_numeric($_POST['id']) && is_string($_POST['topic']) && is_numeric($_POST['seq']);

if ($test_post) {
    $id = (int)$_POST['id'];
    App::mod()->set('topic_id',$id);
    $topic = substr($_POST['topic'],0,100);
    $seq = substr($_POST['seq'],0,20);
    if ($topic!='') {
        tree_edit($id, array('topic'=>$topic, 'seq'=>$seq));
        header('Location: index.php?cmd=node&id='.$id.'&r=1');
        exit;
    }
    echo view('tree-edit.php', array('id'=>$id, 'topic'=>$topic));
}
else {
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : 0;
    App::mod()->set('topic_id',$id);
    $row = tree_row($id);
    echo view('tree-edit.php', array('id'=>$row['topic_id'], 'topic'=>$row['topic_name'], 'seq'=>$row['topic_seq']));
}

?>
