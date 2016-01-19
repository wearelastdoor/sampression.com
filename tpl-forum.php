<?php
/*
	=================================================
	Sampression - Forum Page Template
	Template Name: Forum
	=================================================
*/
get_header(); ?>
	<div class="content" role="main">
    	<div class="container clearfix">
	
			<div id="bbpress-forums">

<?php if (bbp_allow_search()) : ?>

    		<div class="bbp-search-form">

    <?php bbp_get_template_part('form', 'search'); ?>

    		</div>

<?php endif; ?>
<?php bbp_breadcrumb(); ?>
<?php do_action('bbp_template_before_forums_index'); ?>

<?php if (bbp_has_forums()) : ?>

    <?php do_action('bbp_template_before_forums_loop'); ?>

    <ul id="forums-list-<?php bbp_forum_id(); ?>" class="bbp-forums">

    	<li class="bbp-header">

    		<ul class="forum-titles">
    			<li class="bbp-forum-info"><?php _e('Forum', 'bbpress'); ?></li>
    			<li class="bbp-forum-topic-count"><?php _e('Topics', 'bbpress'); ?></li>
    			<li class="bbp-forum-reply-count"><?php bbp_show_lead_topic() ? _e('Replies', 'bbpress') : _e('Posts', 'bbpress'); ?></li>
    			<li class="bbp-forum-freshness"><?php _e('Freshness', 'bbpress'); ?></li>
    		</ul>

    	</li><!-- .bbp-header -->

    	<li class="bbp-body">

    <?php while (bbp_forums()) : bbp_the_forum(); ?>

        			<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

        	<li class="bbp-forum-info">
            	<!-- author Avatar -->
                <figure class="alignleft">
        <?php do_action('bbp_theme_before_topic_author'); ?>

        			<span class="bbp-topic-freshness-author"><?php bbp_author_link(array('post_id' => bbp_get_forum_author_display_name(''), 'type' => 'avatar', 'size' => 32)); ?></span>

        <?php do_action('bbp_theme_after_topic_author'); ?>
                </figure>
                <!-- author avatar ends -->
        <?php do_action('bbp_theme_before_forum_title'); ?>

        		<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>


        <?php do_action('bbp_theme_after_forum_title'); ?>

        <?php do_action('bbp_theme_before_forum_description'); ?>

        		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

        <?php do_action('bbp_theme_after_forum_description'); ?>

        <?php do_action('bbp_theme_before_forum_sub_forums'); ?>

        <?php bbp_list_forums(); ?>

        <?php do_action('bbp_theme_after_forum_sub_forums'); ?>
                	

        <?php bbp_forum_row_actions(); ?>
                
        		<!-- author name starts -->
        <?php do_action('bbp_theme_before_topic_author'); ?>

        			<span class="bbp-topic-freshness-author"><?php _e('Started by ', 'bbpress'); ?><?php bbp_author_link(array('post_id' => bbp_get_forum_author_display_name(''), 'type' => 'name')); ?></span>

        <?php do_action('bbp_theme_after_topic_author'); ?>
                    <!-- author name ends -->

        	</li>

        	<li class="bbp-forum-topic-count"><?php bbp_forum_topic_count(); ?></li>

        	<li class="bbp-forum-reply-count"><?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></li>

        	<li class="bbp-forum-freshness">   

        <?php do_action('bbp_theme_before_forum_freshness_link'); ?>

        <?php bbp_forum_freshness_link(); ?>

        <?php do_action('bbp_theme_after_forum_freshness_link'); ?>

        		<p class="bbp-topic-meta">

        <?php do_action('bbp_theme_before_topic_author'); ?>

        			<span class="bbp-topic-freshness-author"><?php bbp_author_link(array('post_id' => bbp_get_forum_last_active_id(), 'size' => 14)); ?></span>

        <?php do_action('bbp_theme_after_topic_author'); ?>

        		</p>
        	</li>
        </ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

    <?php endwhile; ?>

    	</li><!-- .bbp-body -->

    	<li class="bbp-footer">

    		<div class="tr">
    			<p class="td colspan4">&nbsp;</p>
    		</div><!-- .tr -->

    	</li><!-- .bbp-footer -->

    </ul><!-- .forums-directory -->

    <?php do_action('bbp_template_after_forums_loop'); ?>

<?php else : ?>

    <?php bbp_get_template_part('feedback', 'no-forums'); ?>

<?php endif; ?>

<?php do_action('bbp_template_after_forums_index'); ?>

</div>
        </div> <!-- container ends -->
		
	</div><!-- end content -->
	
<?php // get_sidebar();  ?>
	
<?php get_footer(); ?>