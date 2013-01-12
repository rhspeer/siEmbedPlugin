<?php use_helper('a') ?>

<?php include_partial('a/simpleEditWithVariants', array('pageid' => $pageid, 'name' => $name, 'permid' => $permid, 'slot' => $slot)) ?>
<?php if (isset($values['URL'])): ?>
<iframe
        width="<?php echo $width; ?>"
        height="<?php echo $height; ?>"
        frameborder="0"
        scrolling="no"
        marginheight="0"
        marginwidth="0"
        src="<?php echo $values['URL'] ?>">
    Whoops! your browser is so old it does not support frames please upgrade your browser
</iframe>
<?php endif ?>