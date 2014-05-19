<?php ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class='post-container'>
  <header class='post-header'>
    <?php the_title( '<h1>', '</h1>' ); ?>
    <div class='post-meta'>
      <?php shell_posted_on(); ?>
    </div>
  </header>
  <div class='post-content'>
    <?php the_content(); ?>
    <?php
    	wp_link_pages( array(
    		'before' => '<div class="page-links">' . __( 'Pages:', 'shell' ),
    		'after'  => '</div>',
    	) );
    ?>
  </div>
  <footer class='post-footer'>
    <?php edit_post_link( __( 'Edit', 'shell' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
</div>
</article>
