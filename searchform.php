<?php if (is_front_page()) : ?>

<form method="get" action="<?php echo home_url();?>">
    <input type="search" class="search-field search-field--home" placeholder="<?php the_title( ); ?>" name="s" />
    <input class="search-submit search-submit--home" type="submit" value="Search" />
</form>

<?php else : ?>

    <form method="get" action="<?php echo home_url();?>">
        <input type="search" class="search-field" placeholder="Search for..." name="s" />
        <label>Search Pages</label>
        <input type="radio" name="post_type" value="page" />
        <label>Search Posts</label>
        <input type="radio" name="post_type" value="post" />
        <input class="search-submit" type="submit" value="Search" />
    </form>

<?php endif; ?>