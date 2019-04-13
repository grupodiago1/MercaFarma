<?php
get_header();
?>
  
	

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

<?php while ( have_posts() ) : the_post(); ?>

<!-- blog-page-section 
  ================================================== -->
<section class="blog-page-section">
  <div class="container">
    <div class="blog-page-box">
      <div class="row">
        <?php if(is_active_sidebar('sidebar-1')){ ?>
        <div class="col-md-8">
        <?php }else{ ?>
          <div class="col-md-12">
        <?php } ?>
          <div class="news-box single-post">
            <div class="news-post">
              
              <?php the_post_thumbnail(); ?>
              <div class="single-content">          
              <?php the_content(); ?>
                  <?php
                    $defaults = array(
                      'before'           => '<div id="page-links"><strong>'.esc_html__('Page','kinetic').': </strong>',
                      'after'            => '</div>',
                      'link_before'      => '<span>',
                      'link_after'       => '</span>',
                      'next_or_number'   => 'number',
                      'separator'        => ' ',
                      'nextpagelink'     => esc_html__( 'Next page','kinetic' ),
                      'previouspagelink' => esc_html__( 'Previous page','kinetic' ),
                      'pagelink'         => '%',
                      'echo'             => 1
                    );
                   ?>
                  
              </div>
              <?php wp_link_pages($defaults); ?>
                   
              

              <?php if ( comments_open() || get_comments_number() ) {  ?>
                        <?php comments_template(); ?>   
                    <?php } ?>  
              

            </div>
          </div>
        </div>

        <div class="col-md-4">
                  <?php get_sidebar(); ?>
              </div>
              
      </div>
    </div>
  </div>
</section>
<!-- End news section -->



<?php endwhile; ?>

<?php get_footer();
