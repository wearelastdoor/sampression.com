<?php
/*
  =================================================
  Sampression - Default Sidebar Template
  =================================================
 */
?>
<div id="sidebar" class="four columns offset-by-one">
    <?php
    if (is_active_sidebar('primary-widget-area')) :
        dynamic_sidebar('primary-widget-area');
    endif;
    ?>
</div>
<!--/sidebar--> 