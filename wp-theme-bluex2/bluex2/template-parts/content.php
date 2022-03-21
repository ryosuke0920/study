<article>
    <h1><?php the_title(); ?></h1>
    <div><?php the_excerpt(); ?></div>
    <div><a href="<?= esc_attr(the_permalink()) ?>">続きを読む</a></div>
</article>