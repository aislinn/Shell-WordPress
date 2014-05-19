<?php get_header(); ?>
<body>
  <div class='page-wrapper'>
    <?php include('partials/page-header.php'); ?>
    <?php get_sidebar(); ?>
    <section class='fluid-main'>
      <?php while ( have_posts() ) : the_post(); ?>
      
      	<?php get_template_part( 'content', 'single' ); ?>
      	<?php shell_post_nav(); ?>
      	<?php
      		if ( comments_open() || '0' != get_comments_number() ) :
      			comments_template();
      		endif;
      	?>
      
      <?php endwhile; ?>
    </section>
    <?php get_footer(); ?>
  </div>
</body>
