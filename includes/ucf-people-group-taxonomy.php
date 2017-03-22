<?php
/**
 * Handles the registeration of the People Group custom taxonomy.
 * @author Jim Barnes
 * @since 1.0.0
 **/
if ( ! class_exists( 'UCF_People_Group_Taxonomy' ) ) {
	class UCF_People_Group_Taxonomy {
		/**
		 * Registers the People Group custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 **/
		public static function register() {
			$labels = apply_filters( 
						'ucf_people_group_labels',
						array( 
							'singular' => 'People Group',
							'plural'   => 'People Groups',
							'slug'     => 'people-groups',
						) );

			register_taxonomy( 'people_group', array( 'person' ), self::args( $labels ) );
		}

		/**
		 * Returns an array of labels for the custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $singular string | The singular form for the CPT labels.
		 * @param $plural string | The plural form for the CPT labels.
		 * @return Array
		 **/
		public static function labels( $singular, $plural ) {
			return array(
				'name'                       => _x( $plural, 'Taxonomy General Name', 'ucf_people' ),
				'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'ucf_people' ),
				'menu_name'                  => __( $plural, 'ucf_people' ),
				'all_items'                  => __( 'All ' . $plural, 'ucf_people' ),
				'parent_item'                => __( 'Parent ' . $singular, 'ucf_people' ),
				'parent_item_colon'          => __( 'Parent :' . $singular, 'ucf_people' ),
				'new_item_name'              => __( 'New ' . $singular . ' Name', 'ucf_people' ),
				'add_new_item'               => __( 'Add New ' . $singular, 'ucf_people' ),
				'edit_item'                  => __( 'Edit ' . $singular, 'ucf_people' ),
				'update_item'                => __( 'Update ' . $singular, 'ucf_people' ),
				'view_item'                  => __( 'View ' . $singular, 'ucf_people' ),
				'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'ucf_people' ),
				'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'ucf_people' ),
				'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_people' ),
				'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'ucf_people' ),
				'search_items'               => __( 'Search ' . $plural, 'ucf_people' ),
				'not_found'                  => __( 'Not Found', 'ucf_people' ),
				'no_terms'                   => __( 'No items', 'ucf_people' ),
				'items_list'                 => __( $plural . ' list', 'ucf_people' ),
				'items_list_navigation'      => __( $plural . ' list navigation', 'ucf_people' ),
			);
		}

		/**
		 * Returns an array of args used to register the custom taxonomy.
		 * @author Jim Barnes
		 * @since 1.0.0
		 * @param $labels Array | An array of labels.
		 * @return Array
		 **/
		public static function args( $labels ) {
			$singular = $labels['singular'];
			$plural = $labels['plural'];
			$slug = $labels['slug'];

			$args = array(
				'labels'                     => self::labels( $singular, $plural ),
				'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,
				'rewrite'                    => array(
					'slug'         => $slug,
					'hierarchical' => true,
					'ep_mask'      => EP_PERMALINK | EP_PAGES
				)
			);

			$args = apply_filters( 'ucf_people_group_args', $args );

			return $args;
		}
	}
}
