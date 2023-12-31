( function($) {

	'use strict';

	jQuery(window).on('elementor/frontend/init', function() {

		elementorFrontend.hooks.addAction( 'frontend/element_ready/wp-widget-text.default', pgafu_elementor_init );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/shortcode.default', pgafu_elementor_init );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/text-editor.default', pgafu_elementor_init );

		/* Tabs Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/tabs.default', function( $scope ) {

			/* Tweak for filter */
			setTimeout(function() {
				pgafu_post_filter_init();
			}, 350);
		});

		/* Accordion Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/accordion.default', function( $scope ) {

			/* Tweak for filter */
			setTimeout(function() {
				pgafu_post_filter_init();
			}, 350);
		});

		/* Toggle Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/toggle.default', function( $scope ) {

			/* Tweak for filter */
			setTimeout(function() {
				pgafu_post_filter_init();
			}, 350);
		});

		/* Post Grid Filter Shortcode Element */
		elementorFrontend.hooks.addAction( 'frontend/element_ready/wp-widget-pgafu-pgf-shrt.default', function() {
			pgafu_post_filter_init();
		});
	});

	/**
	 * Initialize Plugin Functionality
	 */
	function pgafu_elementor_init() {
		pgafu_post_filter_init();
	}
})(jQuery);