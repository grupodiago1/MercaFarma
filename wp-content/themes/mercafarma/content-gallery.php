<div class="blog-post">
	<?php 
	    $gallery = get_post_meta(get_the_ID(), '_kinetic_gallery', true);
	?>
	<?php if(count($gallery)>0 and $gallery!=''){ ?>
		<div class="post-slider">
			<ul class="bxslider-posts">
				<?php foreach($gallery as $img) {?>
				<li><img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive"/></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	<h2 class="heading2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<ul class="post-meta">
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_time(get_option( 'date_format' )); ?></a>
		</li>
		<?php if(has_category()){ ?>
			<li><?php the_category(', '); ?></li>
		<?php } ?>
		<li>
			<?php
             comments_popup_link( esc_html__('0 Comments','kinetic'), esc_html__('1 Comment','kinetic'), esc_html__('% Comments','kinetic'), '',  esc_html__('Comment off','kinetic'));
            ?>
		</li>
	</ul>
	<?php the_excerpt(); ?>
	
</div>