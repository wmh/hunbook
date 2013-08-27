<?php
$templates = ['index.html', 'README.md'];
$articles = [];
$d = dir(__DIR__);
while (false !== ($cate = $d->read())) {
  if ($cate === '.' || $cate === '..' || $cate === '.git' || strpos($cate, '_') === 0)
  {
    continue;
  }
  $cate_path = __DIR__ .'/'. $cate;
  if (!is_dir($cate_path)) {
    continue;
  }
  $cate_d = dir($cate_path);
  while (false !== ($title = $cate_d->read())) {
    if ($title === '.' || $title === '..')
    {
      continue;
    }
    $articles[$cate][] = $title;
  }
  $cate_d->close();
}
$d->close();

foreach ($templates as $template) {
  ob_start();
  require __DIR__ .'/_templates/'. $template .'.php';
  file_put_contents($template, ob_get_contents());
  ob_end_clean();
}
?>