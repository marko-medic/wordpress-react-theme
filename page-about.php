<?php
get_header();
?>

<div id="about-page">
    <h1>About page</h1>
    <button class="btn custom-btn">Click</button>
    <?php TemplateFunctions::show_nav(); ?>
    <?= Constants::VERSION ?>
</div>


<?php
echo do_shortcode("[cp_hello]");

class User extends WP_User
{
}

// $res = add_option("my_option", "foobar");

global $post;

// print_r(get_posts());

$args = array(
    'public'   => true,
    '_builtin' => false,
);


$post_types = get_post_types($args, 'names');

print_r($post_types);
// die;
$o = get_option('my_option');
printf("Hey there option is %s, num is %d, float is %.2f", $o, 5, 3.21);




get_footer();
?>

<?php $loop = new WP_Query(array('post_type' => 'book', 'posts_per_page' => 10)); ?>

<?php while ($loop->have_posts()) : $loop->the_post(); ?>

    <?php the_title('<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>'); ?>

    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>