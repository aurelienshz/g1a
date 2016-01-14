<?php
require VUES.'/backoffice/shared.php';
echo $header;
?>

<h1><span>EventEase</span> - Modifier les <?php echo $text['fullname']; ?></h1>

<?php
if(!empty($message)) {
    echo '<div id="message"><p>'.$message.'</p></div>';
}
?>

<form method="post" action="<?php echo getLink(['backoffice','editBoringTexts',$text['name']])?>">
    <textarea name="value"><?php echo $text['value']; ?></textarea>
    <div class="submit-row"><input type="submit" /></div>
</form>


<?php
echo $footer;
?>
