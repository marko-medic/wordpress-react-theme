<?php
get_header()
?>

<div id="about-page">
    <h1>About page</h1>
    <?php TemplateFunctions::show_nav(); ?>
    <?= Constants::VERSION ?>
</div>


<?php

get_footer();
