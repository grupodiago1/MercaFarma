<?php 
/*
*Template Name: Page Buider
*/
?>
<?php get_header(); ?>

<!-- page-pagination-section 
    ================================================== -->
<section class="page-pagination-section">
    <div class="container">
       
        <h1 class="heading1"><?php single_post_title();?></h1>
        <?php $subtitle = get_post_meta($wp_query->get_queried_object_id(), "_kinetic_banner_subtitle", true); ?>
		<?php if($subtitle!=''){ ?>
			<p><?php echo esc_html($subtitle); ?></p>
		<?php } ?>
    </div>
</section>
<!-- End page-pagination section -->

	<?php 
		while(have_posts()) : the_post(); 
			the_content(); 
		endwhile;
	?>
		
<?php get_footer(); ?>