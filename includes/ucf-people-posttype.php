<?php
/**
 * Handles the registration of the people custom post type.
 * @author Jim Barnes
 * @since 1.0.0
 **/
if ( ! class_exists( 'UCF_People_PostType' ) ) {
	class UCF_People_PostType {
		/**
		 * Registers the People custom post type.
		 * @author Jim Barnes
		 * @since 1.0.0
		 **/
		public static function register() {
			$singular = apply_filters( 'ucf_people_singular_label', 'Person' );
			$plural = apply_filters( 'ucf_people_plural_label', 'People' );
			register_post_type( 'person', self::args( $singular, $plural ) );
		}

		/**
		 * Returns an array of labels for the custom post type.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $singular string | The singular form for the CPT labels.
		 * @param $plural string | The plural form for the CPT labels.
		 * @return Array
		 **/
		public static function labels( $singular, $plural ) {
			return array(
				'name'                  => _x( $plural, 'Post Type General Name', 'ucf_people' ),
				'singular_name'         => _x( $singular, 'Post Type Singular Name', 'ucf_people' ),
				'menu_name'             => __( $plural, 'ucf_people' ),
				'name_admin_bar'        => __( $singular, 'ucf_people' ),
				'archives'              => __( $plural . ' Archives', 'ucf_people' ),
				'parent_item_colon'     => __( 'Parent ' . $singular . ':', 'ucf_people' ),
				'all_items'             => __( 'All ' . $plural, 'ucf_people' ),
				'add_new_item'          => __( 'Add New ' . $singular, 'ucf_people' ),
				'add_new'               => __( 'Add New', 'ucf_people' ),
				'new_item'              => __( 'New ' . $singular, 'ucf_people' ),
				'edit_item'             => __( 'Edit ' . $singular, 'ucf_people' ),
				'update_item'           => __( 'Update ' . $singular, 'ucf_people' ),
				'view_item'             => __( 'View ' . $singular, 'ucf_people' ),
				'search_items'          => __( 'Search ' . $plural, 'ucf_people' ),
				'not_found'             => __( 'Not found', 'ucf_people' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'ucf_people' ),
				'featured_image'        => __( 'Featured Image', 'ucf_people' ),
				'set_featured_image'    => __( 'Set featured image', 'ucf_people' ),
				'remove_featured_image' => __( 'Remove featured image', 'ucf_people' ),
				'use_featured_image'    => __( 'Use as featured image', 'ucf_people' ),
				'insert_into_item'      => __( 'Insert into ' . $singular, 'ucf_people' ),
				'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, 'ucf_people' ),
				'items_list'            => __( $plural . ' list', 'ucf_people' ),
				'items_list_navigation' => __( $plural . ' list navigation', 'ucf_people' ),
				'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'ucf_people' ),
			);
		}

		/**
		 * Returns the arguments for registering the custom post type.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $singular string | The singular form for the CPT labels.
		 * @param $plural string | The plural form for the CPT labels.
		 * @return Array
		 **/
		public static function args( $singular, $plural ) {
			$args = array(
				'label'                 => __( $plural, 'ucf_people' ),
				'description'           => __( $plural, 'ucf_people' ),
				'labels'                => self::labels( $singular, $plural ),
				'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
				'taxonomies'            => self::taxonomies(),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-admin-users',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,		
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'post',
			);

			$args = apply_filters( 'ucf_people_post_type_args', $args );

			return $args;
		}

		/**
		 * Returns a list of taxonomies to add during post type registration.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @return Array<string> 
		 **/
		public static function taxonomies() {
			$taxonomies = array(
				'post_tag'
			);

			$taxonomies = apply_filters( 'ucf_people_taxonomies', $taxonomies );

			foreach( $taxonomies as $taxonomy ) {
				if ( ! taxonomy_exists( $taxonomy ) ) {
					unset( $taxonomies[$taxonomy] );
				}
			}

			return $taxonomies;
		}
	}
}
