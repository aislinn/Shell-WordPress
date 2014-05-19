<?php get_header(); ?>
<body>
  <div class='page-wrapper'>
    <?php include('partials/page-header.php'); ?>
    <?php get_sidebar(); ?>
    <section class='fluid-main'>
      <article class='post-entry'>
        <h1>
          <?php _e( 'Oopsy! That page can&rsquo;t be found.', 'shell' ); ?>
        </h1>
        <p>
          <?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'shell' ); ?>
        </p>
        <?php get_search_form(); ?>
        <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
        <?php if ( shell_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
        <div class="widget widget_categories">
        	<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'shell' ); ?></h2>
        	<ul>
        	<?php
        		wp_list_categories( array(
        			'orderby'    => 'count',
        			'order'      => 'DESC',
        			'show_count' => 1,
        			'title_li'   => '',
        			'number'     => 10,
        		) );
        	?>
        	</ul>
        </div><!-- .widget -->
        <?php endif; ?>
        
        <?php
        	/* translators: %1$s: smiley */
        	$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'shell' ), convert_smilies( ':)' ) ) . '</p>';
        	the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
        ?>
        
        <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
      </article>
    </section>
    <?php get_footer(); ?>
  </div>
</body>
