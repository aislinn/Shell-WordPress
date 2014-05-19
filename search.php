<?php get_header(); ?>
<body>
  <div class='page-wrapper'>
    <?php include('partials/page-header.php'); ?>
    <?php get_sidebar(); ?>
    <section class='fluid-main'>
      <article class='post-entry'>
        <?php if ( have_posts() ) : ?>
        
        	<h1>
        		<?php printf( __( 'Search Results for: %s', 'shell' ), '<span>' . get_search_query() . '</span>' ); ?>
        	</h1>
        	
        	<?php ?>
        	
        	<?php while ( have_posts() ) : the_post(); ?>
        		<?php get_template_part( 'content', 'search' ); ?>
        	<?php endwhile; ?>
        
        	<?php shell_paging_nav(); ?>
        
        <?php else : ?>
        
        	<?php get_template_part( 'content', 'none' ); ?>
        
        <?php endif; ?>
      </article>
    </section>
    <?php get_footer(); ?>
  </div>
</body>
