<?php if (!defined('WEBAPP')) die; ?>
<?php ob_start(); ?>

<script type="text/javascript">
$(document).ready(function(){
    $('#submit').click(function(){
		return ($('input[name=to]:checked').attr('disabled')!='disabled');
    });
});
</script>

    <form action="index.php?cmd=text-move" method="post">
        <input type="hidden" name="id" value="<?php echo isset($id)?$id:0; ?>" />
        <?php
            echo tree_list(0,0,0,false);
        ?>
        <input id="submit" type="submit" value=" Move to " />
    </form>
    
<?php $r = ob_get_contents(); ob_end_clean(); ?>
<?php

echo view('page.php', array(
    'menu' => view('menu-right.php'),
    'header' => 'Move Text',
    'content' => $r
));

?>
