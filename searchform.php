<?php
/**
 * Template for displaying search forms
 *
 * @package WordPress
 * @subpackage mnmlwp
 * @since mnmlwp 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="assistive-text"><?php esc_html_e( 'Search', 'mnmlwp' ); ?></label>
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_html_e( 'Search', 'mnmlwp' ); ?>&hellip;" />
	<input type="submit" class="submit mnmlwp-btn mnmlwp-btn-small" id="searchsubmit" value="<?php esc_html_e( 'Submit', 'mnmlwp' ); ?>" />
</form>
