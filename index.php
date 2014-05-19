<?php get_header(); ?>
<body>
  <div class='page-wrapper'>
    <?php include('partials/page-header.php'); ?>
    <?php get_sidebar(); ?>
    <section class='fluid-main'>
      <?php if ( have_posts() ) : ?>
      
      	<?php ?>
      	<?php while ( have_posts() ) : the_post(); ?>
      
      		<?php get_template_part( 'content', get_post_format() ); ?>
      
      	<?php endwhile; ?>
      
      	<?php shell_paging_nav(); ?>
      
      <?php else : ?>
      	<?php get_template_part( 'content', 'none' ); ?>
      <?php endif; ?>
    </section>
  </div>
  <?php get_footer(); ?>
</body>
