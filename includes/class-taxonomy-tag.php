<?php

namespace Reseller_Store;

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

final class Taxonomy_Tag {

	/**
	 * Taxonomy slug.
	 *
	 * @since NEXT
	 *
	 * @var string
	 */
	const SLUG = 'reseller_product_tag';

	/**
	 * Class constructor.
	 *
	 * @since NEXT
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'register' ] );

	}

	/**
	 * Register the taxonomy.
	 *
	 * @action init
	 * @since  NEXT
	 */
	public function register() {

		$labels = [
			'name'              => esc_html_x( 'Tags', 'taxonomy general name', 'reseller-store' ),
			'singular_name'     => esc_html_x( 'Tag', 'taxonomy singular name', 'reseller-store' ),
			'search_items'      => esc_html__( 'Search Tags', 'reseller-store' ),
			'all_items'         => esc_html__( 'All Tags', 'reseller-store' ),
			'parent_item'       => esc_html__( 'Parent Tag', 'reseller-store' ),
			'parent_item_colon' => esc_html__( 'Parent Tag:', 'reseller-store' ),
			'edit_item'         => esc_html__( 'Edit Tag', 'reseller-store' ),
			'update_item'       => esc_html__( 'Update Tag', 'reseller-store' ),
			'add_new_item'      => esc_html__( 'Add New Tag', 'reseller-store' ),
			'new_item_name'     => esc_html__( 'New Tag Name', 'reseller-store' ),
			'menu_name'         => esc_html__( 'Tags', 'reseller-store' ),
		];

		$args = [
			'label'             => esc_html__( 'Tags', 'reseller-store' ),
			'labels'            => $labels,
			'show_admin_column' => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'hierarchical'      => false,
			'rewrite'           => [
				'slug'         => self::SLUG,
				'with_front'   => false,
				'hierarchical' => false,
			],
		];

		/**
		 * Filter the tag taxonomy args.
		 *
		 * @since NEXT
		 *
		 * @var array
		 */
		$args = (array) apply_filters( 'rstore_tag_args', $args );

		register_taxonomy( self::SLUG, Post_Type::SLUG, $args );

	}

}