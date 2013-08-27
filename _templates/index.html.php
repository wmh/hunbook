<?php
if (!isset($articles)) die();
?>
<!DOCTYPE html>
<html>
<head>
<title>hunbook</title>
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<h1>hunbook</h1>
<?php foreach ($articles as $cate => $titles) : ?>
<h2><?php echo ucfirst($cate); ?></h2>
<?php   foreach ($titles as $title) : ?>
<p><a href="<?php echo $cate; ?>/<?php echo $title; ?>"><?php echo $title; ?></a></p>
<?php   endforeach; ?>
<?php endforeach; ?>
</div>
</body>
</html>
