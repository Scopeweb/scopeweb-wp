<?php
/*	
*	---------------------------------------------------------------------
*	SCOPE Edit option panel
*	--------------------------------------------------------------------- 
*/


function filter_list_item_title_desc( $label, $id ) {
	$label = esc_html__( 'Add a title only you will see. This makes it easier to drag & drop.', 'scope' );
	return $label;
}
add_filter( 'ot_list_item_title_desc', 'filter_list_item_title_desc', 10, 2 );


function scope_ot_header_logo() {
	return '<div class="dashicons dashicons-admin-settings" style="font-size:22px; padding:4px 8px 5px 8px"></div>';
}
add_filter( 'ot_header_logo_link', 'scope_ot_header_logo', 10, 2 );

function scope_ot_header_version() {
	return 'scope - v'. wp_get_theme()->get( 'Version' );
}
add_filter( 'ot_header_version_text', 'scope_ot_header_version', 10, 2 );

function scope_ot_upload_text() {
	return 'Add to Panel';
}
add_filter( 'ot_upload_text', 'scope_ot_upload_text', 10, 2 );


/*	
*	---------------------------------------------------------------------
*	SCOPE Edit option
*	--------------------------------------------------------------------- 
*/

function scope_radio_images( $array, $field_id ) {
	if ( $field_id == 'layout_style' ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/full-width-layout.png'
			),
			array(
				'value'   => 'boxed',
				'label'   => esc_html__( 'Boxed layout', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/boxed-layout.png'
			)
		);
	} 
	
	if ( $field_id == 'custom_layout_style' ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Default', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/default-layout.png'
			),			
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/full-width-layout.png'
			),
			array(
				'value'   => 'boxed',
				'label'   => esc_html__( 'Boxed layout', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/boxed-layout.png'
			)
		);
	} 
	
	if ( $field_id == 'catalog_layout'  || $field_id == 'product_layout' || $field_id == 'blog_layout' ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/no-sidebar.png'
			),			
			array(
				'value'   => 'right-sidebar',
				'label'   => esc_html__( 'Right sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'left-sidebar',
				'label'   => esc_html__( 'Left sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}
	
	if ( $field_id == 'post_layout' ) {
		$array = array(
			array(
				'value'   => 'single.php',
				'label'   => esc_html__( 'Full width', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/no-sidebar.png'
			),			
			array(
				'value'   => 'single-right-sidebar.php',
				'label'   => esc_html__( 'Right sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'single-left-sidebar.php',
				'label'   => esc_html__( 'Left sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}	
	if ( $field_id == 'post_template' ) {
		$array = array(
			array(
				'value'   => '',
				'label'   => esc_html__( 'Default (Selected in theme options panel)', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/default-template.png'
			),				
			array(
				'value'   => 'single.php',
				'label'   => esc_html__( 'Full width', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/no-sidebar.png'
			),			
			array(
				'value'   => 'single-right-sidebar.php',
				'label'   => esc_html__( 'Right sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'single-left-sidebar.php',
				'label'   => esc_html__( 'Left sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}
	
	if ( $field_id == 'post_header_style' ) {
		$array = array(
			array(
				'value'   => 'opt_default',
				'label'   => esc_html__( 'Default', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-default-opt.png'
			),				
			array(
				'value'   => 'style_deafault',
				'label'   => esc_html__( 'Default', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-default.png'
			),				
			array(
				'value'   => 'style_1',
				'label'   => esc_html__( 'Custom Style', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-1.png'
			),
			array(
				'value'   => 'style_3',
				'label'   => esc_html__( 'Custom Style', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-3.png'
			),
			array(
				'value'   => 'style_2',
				'label'   => esc_html__( 'Custom Style', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-2.png'
			)
		);
	}		
	
	if ( $field_id == 'post_header_style_opt' ) {
		$array = array(
			array(
				'value'   => 'style_deafault',
				'label'   => esc_html__( 'Default', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-default.png'
			),				
			array(
				'value'   => 'style_1',
				'label'   => esc_html__( 'Custom Style', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-1.png'
			),
			array(
				'value'   => 'style_3',
				'label'   => esc_html__( 'Custom Style', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-3.png'
			),
			array(
				'value'   => 'style_2',
				'label'   => esc_html__( 'Custom Style', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/header-style-2.png'
			)
		);
	}	
	
	if ( $field_id == 'archive_post_layout' ) {
		$array = array(
			array(
				'value'   => 'layout-one-column',
				'label'   => esc_html__( 'One column', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/layout-1.png'
			),			
			array(
				'value'   => 'layout-main',
				'label'   => esc_html__( 'Main + two column', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/layout-2.png'
			),
			array(
				'value'   => 'layout-two-column',
				'label'   => esc_html__( 'Two column', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/layout-3.png'
			)
		);
	}
	
	
	if ( preg_match( '/^category_styles_cat_post_layout_/', $field_id ) ) {
		$array = array(
			array(
				'value'   => 'layout-one-column',
				'label'   => esc_html__( 'One column', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/layout-1.png'
			),			
			array(
				'value'   => 'layout-main',
				'label'   => esc_html__( 'Main + two column', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/layout-2.png'
			),
			array(
				'value'   => 'layout-two-column',
				'label'   => esc_html__( 'Two column', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/layout-3.png'
			)
		);
	}


	if ( preg_match( '/^category_styles_cat_layout_/', $field_id ) ) {
		$array = array(
			array(
				'value'   => 'full-width',
				'label'   => esc_html__( 'Full width', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/no-sidebar.png'
			),			
			array(
				'value'   => 'right-sidebar',
				'label'   => esc_html__( 'Right sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-right.png'
			),
			array(
				'value'   => 'left-sidebar',
				'label'   => esc_html__( 'Left sidebar', 'scope' ),
				'src'	 => SCOPE_URI . '/inc/theme-options-extend/assets/sidebar-left.png'
			)
		);
	}	
		
	
	
	return $array;
}
add_filter( 'ot_radio_images', 'scope_radio_images', 10, 2 );