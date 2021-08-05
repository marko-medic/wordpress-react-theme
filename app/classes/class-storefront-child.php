<?php


/*======= FFL easy main class ===== */


class StoreFrontChild
{
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'setup'));
        add_action("wp_enqueue_scripts", [$this, "scripts"]);
        add_action("wp_print_styles", [$this, "disable_extra_styles"]);
        add_action("init", [$this, "add_rewrite_rules"]);
        $this->add_filters();
        $this->remove_actions();
    }

    public function setup()
    {
        // Theme setup

        add_image_size("blog-list-thumbnail", 700, 400, true);
        add_image_size("blog-post-thumbnail", 850, 500, true);
        add_image_size("paginate-post-thumbnail", 90, 50, true);
        register_sidebar(
            [
            'name'          => 'Blog right sidebar',
            'id'            => 'blog_right_1',
            'before_widget' => '<div class="widget-item">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="widget-item__title-box"><h5 class="widget-item__heading" >',
            'after_title'   => '</h5></div>',
            ]
        );
    }



    public function scripts()
    {
        // Load scripts
        wp_enqueue_style('open-sans-font', '//fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap');
        wp_enqueue_script('app-js', get_theme_file_uri('/assets/js/dist/app.js'), null, microtime(), true);
        ;
        wp_localize_script(
            "app-js", "php_data", [
            "root_url" => get_site_url(),
            "template_url" => get_stylesheet_directory_uri(),
            "nonce" => wp_create_nonce("wp_rest") // rest api auth
            ]
        );
    }

    public function disable_extra_styles()
    {
        wp_deregister_style('storefront-style');
    }

    public function add_filters()
    {
        add_filter('excerpt_more', [$this, 'alx_excerpt_more']);
        add_filter('excerpt_length', [$this, 'custom_excerpt_length']);
        add_filter('https_ssl_verify', '__return_false');
        add_filter('https_local_ssl_verify', '__return_false');
        add_filter('query_vars', [$this, "query_vars"]);
    }

    // other methods



    public function add_rewrite_rules()
    {
    }


    public function alx_excerpt_more($more)
    {
        return '&#46;&#46;&#46;';
    }

    public function custom_excerpt_length()
    {
        return 150;
    }

    public function query_vars($query_vars)
    {
        // $query_vars[] = "buyer_id";
        return $query_vars;
    }

    public function remove_actions()
    {
        remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
        remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer) link.
        remove_action('wp_head', 'wp_generator'); //removes meta name generator.
        remove_action('wp_head', 'wp_shortlink_wp_head'); //removes shortlink.
        remove_action('wp_head', 'feed_links', 2); //removes feed links.
        remove_action('wp_head', 'feed_links_extra', 3);  //removes comments feed.
    }
}

return new StoreFrontChild();
