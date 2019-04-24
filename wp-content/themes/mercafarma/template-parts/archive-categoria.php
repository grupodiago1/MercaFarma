
<!-- page-pagination-section
    ================================================== -->
<section class="page-pagination-section">
    <div class="container">
        <?php
            $title = get_theme_mod( 'blog_title','Blog');
            $subtitle = get_theme_mod( 'sub_title');
        ?>
        <?php if(is_category()){ ?>
            <h1 class="heading1"><?php single_cat_title( '', true ); ?></h1>

        <?php }elseif(is_archive()){ ?>
            <h1 class="heading1"><?php the_archive_title(); ?></h1>
        <?php }elseif(is_404()){ ?>
            <h1 class="heading1"><?php esc_html_e('404 Error','kinetic'); ?></h1>
        <?php }elseif (is_tag()) { ?>
            <h1 class="heading1"><?php single_tag_title();?></h1>
        <?php }elseif (is_search()) { ?>
            <h1 class="heading1"><?php esc_html_e('Search results for','kinetic'); ?>: '<?php echo esc_attr( get_search_query() ); ?>'</h1>
        <?php }else{ ?>
            <h1 class="heading1"><?php echo esc_html($title);?></h1>
        <?php } ?>
        <?php if($subtitle!=''){ ?>
            <p><?php echo esc_html($subtitle); ?></p>
        <?php } ?>
    </div>
</section>
<!-- End page-pagination section -->


<!-- blog-page-section
    ================================================== -->
<section class="blog-page-section">
    <div class="container">

      <div  class="elementor-element elementor-element-1a18b35 elementor-widget">
      <div class="elementor-widget-container">
      <div class="news-box">
      <div class="row">


                    <?php
                        if(have_posts()) :
                        while(have_posts()) : the_post();
                    ?>


                      <div class="col-md-4">
                        <div class="news-post">
                          <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                        </a>
                        <h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          <ul class="post-tags">
                            <?php $casa = wp_get_post_terms(get_the_ID(), 'casa', array("fields" => "all"));?>
                            <li>Casa: <a href="<?php echo get_term_link($casa[0]);?>"><?php echo $casa[0]->name?></a></li>
                          </ul>
                        </div>
                      </div>
                    <div>

                     <?php endwhile; ?>

                    <?php else: ?>
                        <div class="blog-post not-found">
                                <h2 class="heading2"><?php esc_html_e('Nothing Found Here!','kinetic'); ?></h2>
                                <p ><?php esc_html_e('Search with other keyword:', 'kinetic') ?></p>

                                 <?php get_search_form(); ?>

                        </div>
                    <?php endif; ?>

                     <?php kinetic_pagination($prev = '<i class="la la-long-arrow-left"></i> ', $next = ' <i class="la la-long-arrow-right"></i>', $pages=''); ?>




    </div>
    </div>
    </div>
    </div>

    </div>

</section>


<!-- End news section -->
