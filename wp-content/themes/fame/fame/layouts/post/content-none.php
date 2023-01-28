<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package VT_Framework
 */

?>
<div class="col-md-12">
	<div class="not-found">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'fame' ); ?></h1>
		<?php
		if ( is_search() ) : ?>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fame' ); ?></p>
			<div class="widget_search">
				<?php
					get_search_form();
				?> 
			</div><?php
		else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fame' ); ?></p>
			<div class="widget_search">
				<?php
					get_search_form();
				?> 
			</div><?php
		endif; ?>
	</div><!-- .page-content -->
</div><!-- .no-results -->
<?php
