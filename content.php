<?php ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php shell_post_thumbnail(); ?>
<div class="post-container">
<header class='post-header'>
  <?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
  <?php if ( 'post' == get_post_type() ) : ?>
  	
  	<div class="post-meta">
  		<?php shell_posted_on(); ?>
  	</div>
  
  <?php endif; ?>
</header>
<?php if ( is_search() ) : // Only display Excerpts for Search ?>

	<div class="post-summary">
		<?php the_excerpt(); ?>
	</div>

<?php else : ?>

	<div class="post-content">
	
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'shell' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'shell' ),
				'after'  => '</div>',
			) );
		?>

	</div>
	<?php endif; ?>
<footer class='post-footer'>
  <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
  	<?php
  		/* translators: used between list items, there is a space after the comma */
  		$categories_list = get_the_category_list( __( ', ', 'shell' ) );
  		if ( $categories_list && shell_categorized_blog() ) :
  	?>
  
  	<span class="cat-links">
  		<?php printf( __( 'Posted in %1$s', 'shell' ), $categories_list ); ?>
  	</span>
  	<?php endif; // End if categories ?>
  
  
  
  	<?php
  		/* translators: used between list items, there is a space after the comma */
  		$tags_list = get_the_tag_list( '', __( ', ', 'shell' ) );
  		if ( $tags_list ) :
  	?>
  
  
  	<span class="tags-links">
  		<?php printf( __( 'Tagged %1$s', 'shell' ), $tags_list ); ?>
  	</span>
  
  
  	<?php endif; // End if $tags_list ?>
  <?php endif; // End if 'post' == get_post_type() ?>
  
  
  
  <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
  <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'shell' ), __( '1 Comment', 'shell' ), __( '% Comments', 'shell' ) ); ?></span>
  <?php endif; ?>
  
  <?php edit_post_link( __( 'Edit', 'shell' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
</div>
</article>
