<?php ?>
<aside class='fixed-sidebar'>
  <section>
    <div class='container'>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      <p>
        <em><?php bloginfo( 'description' ); ?></em>
      </p>
      <div class='widget-area'>
        <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        
        
        
        	<aside id="search" class="widget widget_search">
        		<?php get_search_form(); ?>
        	</aside>
        
        
        	<aside id="archives" class="widget">
        		<h6 class="widget-title"><?php _e( 'Archives', 'shell' ); ?></h6>
        		<ul>
        			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
        		</ul>
        	</aside>
        
        
        	<aside id="meta" class="widget">
        		<h6 class="widget-title"><?php _e( 'Meta', 'shell' ); ?></h6>
        		<ul>
        			<?php wp_register(); ?>
        			<li><?php wp_loginout(); ?></li>
        			<?php wp_meta(); ?>
        		</ul>
        	</aside>
        
        
        
        <?php endif; // end sidebar widget area ?>
      </div>
    </div>
  </section>
</aside>
