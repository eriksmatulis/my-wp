<header class="sticky top-0 z-40">
    <nav class="bg-white shadow-md">
    <?php
        // Insert custom menu in header and give it tailwind classes
        wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => '
        flex mx-auto px-4 justify-center items-center inline-block
        ' ) );
    ?>
    </nav>
</header>