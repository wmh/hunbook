<?php
$templates = ['index.html', 'README.md'];
$articles = [];
$d = scandir(__DIR__);
foreach ($d as $cate) {
  if ($cate === '.' || $cate === '..' || $cate === '.git' || strpos($cate, '_') === 0)
  {
    continue;
  }
  $cate_path = __DIR__ .'/'. $cate;
  if (!is_dir($cate_path)) {
    continue;
  }
  $cate_d = scandir($cate_path);
  foreach ($cate_d as $title) {
    if ($title === '.' || $title === '..')
    {
      continue;
    }
    $articles[$cate][] = $title;
  }
}

foreach ($templates as $template) {
  ob_start();
  require __DIR__ .'/_templates/'. $template .'.php';
  file_put_contents($template, ob_get_contents());
  ob_end_clean();
}
?>