

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
							<h1 class="heading1"><?php the_title(); ?></h1>
							<div class="row">
								<div class="col-sm-8">
									<ul class="post-tags">
										<li><?php esc_html_e('in', 'kinetic'); ?> <?php the_category(', '); ?></li>
										<li><?php echo kinetic_time_ago(); ?></li>
										<li><?php esc_html_e('by', 'kinetic'); ?> <?php the_author_posts_link(); ?></li>
									</ul>
								</div>
							</div>
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
			              <?php if(has_tag()){ ?>

								<div class="tags-box">
									<?php the_tags('<ul class="tag-list"><li><span>'.esc_html__('Tags: ','kinetic').'</span>','</li> <li>','</li></ul>'); ?>

								</div>
							<?php } ?>
			              <?php
				              $prev_post = get_adjacent_post(false, '', true);
				              $next_post = get_adjacent_post(false, '', false);

				            ?>

							<div class="prev-next-box">
								<div class="row">
									<div class="col-sm-6">
										<?php if($prev_post!=null){ ?>
											<?php
												$title = $prev_post->post_title;
												$n_title  = strlen ($title );
												if($n_title>50){
													$sub_title = substr($title, 0, 50).'...';
												}else{
													$sub_title = $title;
												}
											?>
											<a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="prev-post">
												<i class="la la-angle-left"></i>
												<p>
													<span><?php esc_html_e('Previous Post', 'kinetic'); ?></span>
													<?php echo esc_attr($sub_title); ?>
												</p>
											</a>
										<?php } ?>
									</div>
									<div class="col-sm-6">
										<?php if($next_post!=null){ ?>
											<?php
												$title = $next_post->post_title;
												$n_title  = strlen ($title );
												if($n_title>50){
													$sub_title = substr($title, 0, 50).'...';
												}else{
													$sub_title = $title;
												}
											?>
											<a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="next-post">
												<i class="la la-angle-right"></i>
												<p>
													<span><?php esc_html_e('Next Post', 'kinetic'); ?></span>
													<?php echo esc_attr($sub_title); ?>
												</p>
											</a>
										<?php } ?>
									</div>
								</div>
							</div>

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
