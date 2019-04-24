<?php
/**
 * Search Form Template
 *
 */
?>
<div class="search-widget">
    <form class="search-form" action="<?php echo esc_url( home_url('/') ); ?>" method="get">
		<input type="search" name="s"  placeholder="<?php esc_attr_e( 'Search', 'kinetic' ); ?>..." value="<?php echo esc_attr( get_search_query() ); ?>"/>
		<button type="submit">
			<i class="fa fa-search"></i>
		</button>
	</form>
</div>