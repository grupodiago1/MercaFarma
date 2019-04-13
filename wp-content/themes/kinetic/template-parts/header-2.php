
<?php 
	$slider = get_post_meta($wp_query->get_queried_object_id(), "_kinetic_page_banner", true);
?>
<?php if($slider!=''){ ?>
	<!-- home-section 
		================================================== -->
	<section id="home-section" class="slider1">
		<?php echo do_shortcode($slider); ?>
	</section>
<?php } ?>

<!-- Header
    ================================================== -->
<header class="clearfix fullwidth white-header">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only"><?php esc_html_e('Toggle navigation', 'kinetic'); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php $custom_logo = get_post_meta($wp_query->get_queried_object_id(), '_kinetic_custom_logo', true) ?>
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
				?>
				<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">

					<?php if($custom_logo!=''){ ?>
					<img src="<?php echo esc_url($custom_logo); ?>" alt="<?php bloginfo('name'); ?>">
					<?php }elseif($custom_logo_id!=''){ ?>
	                  <?php $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
	                	<img src="<?php echo esc_url($image[0]); ?>" alt="<?php bloginfo('name'); ?>" />
	                <?php }else{  ?>
	                  <?php bloginfo('name'); ?>
	                <?php } ?>
				</a>
			
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<?php 
					$btn_link = get_theme_mod('btn_link');
					$btn_text = get_theme_mod('btn_text');
				?>
				<?php if($btn_link!=''){ ?>
					<a class="button-two target-link" href="<?php echo esc_url($btn_link); ?>"><?php echo esc_html($btn_text); ?></a>
				<?php } ?>

				<?php 
					$onepage = get_post_meta($wp_query->get_queried_object_id(), "_kinetic_onepage", true);
					if($onepage=='on'){
						$menu_location = 'onepage';
					}else{
						$menu_location = 'primary';
					}
					if(is_page(122)){
						$defaults2= array(
							'theme_location'  => '',
							'menu'            => 13,
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav navbar-nav navbar-right navigate-section',
							'menu_id'         => '',
							'echo'            => true,
							 'fallback_cb'       => 'kinetic_bootstrap_navwalker::fallback',
							 'walker'            => new kinetic_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						);
					}else{
						$defaults2= array(
							'theme_location'  => $menu_location,
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'nav navbar-nav navbar-right navigate-section',
							'menu_id'         => '',
							'echo'            => true,
							 'fallback_cb'       => 'kinetic_bootstrap_navwalker::fallback',
							 'walker'            => new kinetic_bootstrap_navwalker(),
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
						);
					}
					
					if ( has_nav_menu( $menu_location ) ) {
						wp_nav_menu( $defaults2 );
					}
				
				?>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
</header>
<!-- End Header -->

