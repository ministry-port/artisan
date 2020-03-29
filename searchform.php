<?php
/**
 * Template for displaying search forms in artisan
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search archives', 'artisan' ); ?></span>
		<span class="search-icon">
		<a class="search-toggle"><span class="screen-reader-text"><?php _e( 'Search', 'artisan' ); ?></span></a>
		</span>
		<input type="search" class="search-field" placeholder="Search..." value="" name="s" title="<?php esc_attr_e( 'Search for:', 'artisan' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'artisan' ); ?>" />
</form>




