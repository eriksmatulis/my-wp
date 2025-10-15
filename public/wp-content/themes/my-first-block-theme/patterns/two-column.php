<?php
/*
 * Title: My Two-Column Section
 * Slug: myblocks/my-two-column
 * Categories: columns
 */
?>

<div id="api-posts"></div>
<script src="<?php echo get_template_directory_uri(); ?>/js/api-posts.js"></script>


<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading -->
<h2 class="wp-block-heading">Create your taste explosion!</h2>
<!-- /wp:heading -->

<!-- wp:details -->
<details class="wp-block-details"><summary>Your greatest fruits...</summary><!-- wp:preformatted -->
<pre class="wp-block-preformatted"> Mangoes<br>           Cherries<br>                       and more.....</pre>
<!-- /wp:preformatted --></details>
<!-- /wp:details --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"width":"219px","height":"auto","sizeSlug":"large","className":"is-style-default","style":{"color":{"duotone":"var:preset|duotone|purple-yellow"}}} -->
<figure class="wp-block-image size-large is-resized is-style-default"><img src="https://tastefullygrace.com/wp-content/uploads/2025/05/Fruit-Salad-Recipe-1-scaled.jpg" alt="" style="width:219px;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->