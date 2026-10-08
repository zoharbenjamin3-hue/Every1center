<?php
/**
 * Search form.
 *
 * @package Every1Center
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="search-field"><?php esc_html_e( 'Search for:', 'every1center' ); ?></label>
	<input type="search" id="search-field" class="search-field" placeholder="<?php esc_attr_e( 'Search the site…', 'every1center' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button type="submit" class="search-submit btn btn-primary"><?php esc_html_e( 'Search', 'every1center' ); ?></button>
</form>
