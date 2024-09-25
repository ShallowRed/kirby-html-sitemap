<!-- https://www.sitemaps.org/protocol.html#informing -->
<?php $depth ??= 0;?>
<?php $attrs ??= ['class' => 'sitemap']; ?>
<ul <?php echo attr($attrs);?>>
    <?php foreach ($sitemapPages ??= $site->pages()->inSitemap() as $page) : ?>
      <li data-depth="<?php echo $depth;?>">
        <p>
        <?php echo Html::a(
            $page->url(),
            $page->title()
        )?>
        </p>
        <?php if ($page->hasChildren()) : ?>
            <?php snippet(
                'blocks/sitemap',
                [
                'sitemapPages' => $page->children()->inSitemap(),
                'depth' => $depth + 1
                ]
            ) ?>
        <?php endif;?>
    </li>
    <?php endforeach;?>
</ul>
