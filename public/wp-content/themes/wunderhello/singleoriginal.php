<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        <?php wp_head(); ?>
        <title><?php bloginfo('name'); ?></title>
    </head>
    <body class="bg-indigo-200">
    <?php get_header(); ?>
    <div class="m-auto h-90vh w-9/10 bg-purple-200 pb-10 pt-5 text-center border-1 border-b-indigo-500">
        <h2 class="text-orange-950 text-3xl pb-6">
            <?php the_title(); ?>
        </h2>
        <?php the_content(); ?>
    </div>
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
    <?php get_sidebar(); ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>