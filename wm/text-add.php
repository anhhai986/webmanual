<?php if (!defined('WEBAPP')) die; ?>
<?php ob_start(); ?>

<script type="text/javascript">
$(document).ready(function(){
    $('#title').focus();
});
</script>

    <form action="index.php?cmd=text-add" method="post">
        <input type="hidden" name="pid" value="<?php echo isset($pid)?$pid:0; ?>" />
        <table class="input-form">
        <tbody>
        <tr>
            <td>Title:</td>
            <td><input type="text" id="title" name="title" value="<?php echo isset($title)?htmlspecialchars($title):''; ?>" size="70" maxlength="100" /></td>
        </tr>
        <tr>
            <td>Text:</td>
            <td><textarea name="text" cols="70" rows="15"><?php echo isset($text)?htmlspecialchars($text):''; ?></textarea></td>
        </tr>
        <tr>
            <td>Format:</td>
            <td><input type="radio" name="format" value="plain" <?php echo (isset($format) && $format=='plain'? 'checked="yes"' : ''); ?>/>plain  
                <input type="radio" name="format" value="html" <?php echo (isset($format) && $format=='html'? 'checked="yes"' : ''); ?>/>html</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value=" Submit " /></td>
        </tr>
        </tbody>
        </table>
    </form>
    
<?php $r = ob_get_contents(); ob_end_clean(); ?>
<?php

echo view('page.php', array(
    'menu' => view('menu-right.php'),
    'header' => 'New Text',
    'content' => $r
));

?>
