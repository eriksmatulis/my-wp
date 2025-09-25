<?php
/*
 * Title: My Hero Section
 * Slug: my-first-block-theme/my-hero
 * Categories: featured
 */
?>

<!-- wp:myblocks/myheader /-->

<!-- wp:group {"backgroundColor":"black","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-black-background-color has-background"><!-- wp:heading {"textAlign":"center","level":1,"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-link-color">Welcome to my site!</h1>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Action A</a></div>
<!-- /wp:button -->

<!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Action B</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"500"}},"textColor":"white","fontSize":"medium"} -->
<p class="has-text-align-center has-white-color has-text-color has-link-color has-medium-font-size" style="font-style:normal;font-weight:500;text-transform:none">Welcome to my webpage! Take a look around...</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:myblocks/myfooter /-->