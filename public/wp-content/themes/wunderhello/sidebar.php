<!-- Call sidebar that was defined in functions.php. Styling for it is also done inside functions.php
 under wh_widgets_init() -->
<?php if (is_active_sidebar('new_right_1') ) : ?>
    <?php dynamic_sidebar( 'new_right_1' ); ?>
<?php endif ?>