

<!-- page-pagination-section
    ================================================== -->
<section class="page-pagination-section">
    <div class="container">
        <?php
            $title = get_theme_mod( 'blog_title', get_the_title());
            $subtitle = get_theme_mod( 'sub_title');

                $casa = wp_get_post_terms(get_the_ID(), 'casa', array("fields" => "all"));
                $categoria = wp_get_post_terms(get_the_ID(), 'categoria', array("fields" => "all"));

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
            <h3 class="heading3"><?php echo $categoria[0]->name;?> / <?php echo $casa[0]->name;?> </h3>
        <?php } ?>
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
		     <div class="col-md-7">
					<div class="news-box single-post">
						<div class="news-post">
							<?php the_post_thumbnail(); ?>
						</div>
					</div>
				</div>
        <div class="col-md-5">
          <div class="sidebar">
          <div class="row">
            <div class="col-sm-12">
              <ul class="post-tags">
                <li>Categoría: <a href="<?php echo get_term_link($categoria[0]);?>"><?php echo $categoria[0]->name?></a></li>
                <li>Casa: <a href="<?php echo get_term_link($casa[0]);?>"><?php echo $casa[0]->name?></a></li>
              </ul>
              <hr>
            </div>
          </div>
          <div class="single-content">
          <?php the_content(); ?>
          </div>
        </div>
        </div>
			</div>
		</div>
	</div>
</section>
<!-- End news section -->


<?php endwhile; ?>
