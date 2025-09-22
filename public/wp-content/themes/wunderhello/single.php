<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <?php wp_head(); ?>
    <title><?php bloginfo('name'); ?></title>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
<?php get_header(); ?>
<main class="container mx-auto px-4 py-8">
    <article class="bg-white rounded-lg shadow-lg p-6 md:p-10 lg:p-12">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
            <?php the_title(); ?>
        </h1>

<!--        <figure class="mb-8">-->
<!--            --><?php //get_the_post_thumbnail() ;?>
<!--            <img src="https://via.placeholder.com/1200x600" alt="Placeholder image for blog post" class="w-full h-auto rounded-lg shadow-md">-->
<!--            <figcaption class="text-center text-sm text-gray-500 mt-2">-->
<!--                A visual representation of the blog post topic.-->
<!--            </figcaption>-->
<!--        </figure>-->

        <div class="prose max-w-none text-lg leading-relaxed text-gray-700">
            <?php the_content(); ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>
<?php wp_footer(); ?>
<?php get_sidebar(); ?>
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</body>
</html>