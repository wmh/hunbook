<?php
if (!isset($articles)) die();
?>
# hunbook

<?php foreach ($articles as $cate => $titles) : ?>
## <?php echo ucfirst($cate); ?>


<?php   foreach ($titles as $title) : ?>
* [<?php echo $title; ?>](http://wmh.github.io/hunbook/<?php echo $cate; ?>/<?php echo $title; ?>)
<?php   endforeach; ?>

<?php endforeach; ?>