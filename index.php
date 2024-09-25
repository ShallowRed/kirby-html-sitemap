<?php

Kirby::plugin('shallowred/html-sitemap', [

  'blueprints' => [
    'blocks/html-sitemap' => __DIR__ . '/blueprints/html-sitemap.yml',
  ],

  'snippets' => [
    'blocks/html-sitemap' => __DIR__ . '/snippets/blocks/html-sitemap.php',
  ],

  'pagesMethods' => [
    'inSitemap' => function () {
      $ignore = option('shallowred.html-sitemap.ignore', []);
      if (empty($ignore)) {
        return $this->listed();
      }
      $expression = '/' . A::join(A::map($ignore, function ($item) {
        return '(' . $item . ')';
      }), '|') . '/';
      return $this->filterBy('url', '!*', $expression);
    },
  ],
]);
