
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
        <div class="blog-page-box">
        <div class="row">
            <?php if(is_active_sidebar('sidebar-1')){ ?>
            <div class="col-md-8">
            <?php }else{ ?>
              <div class="col-md-12">
            <?php } ?>
                <div class="news-box list-style-box">
                    <?php 
                        if(have_posts()) :
                                        while(have_posts()) : the_post(); 
                    ?>

                    <div <?php post_class('news-post'); ?>>

                        <?php the_post_thumbnail(); ?>

                        <h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php if(is_sticky()){ ?><i class="fa fa-flash"></i> <?php } ?> <?php the_title(); ?></a></h2>
                        <ul class="post-tags">
                            <li><?php esc_html_e('by', 'kinetic'); ?> <?php the_author_posts_link(); ?></li>
                            <li><?php
                     comments_popup_link( esc_html__('0 Comments','kinetic'), esc_html__('1 Comment','kinetic'), esc_html__('% Comments','kinetic'), '',  esc_html__('Comment off','kinetic'));
                    ?></li>
                            <li><?php the_time(get_option( 'date_format' )); ?></li>
                        </ul>
                        
                        <?php the_excerpt(); ?>

                        <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Read More', 'kinetic'); ?> <i class="la la-arrow-right"></i></a>
                        

                    </div>

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

            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>

        </div>
    </div>
    </div>
</section>
<!-- End news section -->
