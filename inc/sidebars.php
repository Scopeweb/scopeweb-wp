<?php
/*	
*	---------------------------------------------------------------------
*	SCOPE Register sidebars
*	--------------------------------------------------------------------- 
*/

function scope_sidebars() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog/Post Sidebar', 'scope' ),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Appears on blog layout and posts', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Page Sidebar', 'scope' ),
		'id' => 'default-sidebar',
		'description' => esc_html__( 'Appears as default sidebar on pages', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Single Post Header Sidebar', 'scope' ),
		'id' => 'post-header-sidebar',
		'description' => esc_html__( 'Appears in single post header', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Top', 'scope' ),
		'id' => 'post-content-top-sidebar',
		'description' => esc_html__( 'Appears before single post content', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Single Post Content Sidebar Bottom', 'scope' ),
		'id' => 'post-content-bottom-sidebar',
		'description' => esc_html__( 'Appears after single post content', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'After Single Post Sidebar', 'scope' ),
		'id' => 'after-single-post-sidebar',
		'description' => esc_html__( 'Appears after single post', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Before Single Post Sidebar', 'scope' ),
		'id' => 'before-single-post-sidebar',
		'description' => esc_html__( 'Appears above single post content and sidebar with default header style', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="content-widget-title">',
		'after_title'   => '</h3>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Header Sidebar', 'scope' ),
		'id' => 'header-sidebar',
		'description' => esc_html__( 'Appears in top right of the header area', 'scope' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );	
	
	register_sidebar( array(
		'name' => esc_html__( 'Menu Sidebar', 'scope' ),
		'id' => 'menu-sidebar',
		'description' => esc_html__( 'Appears on the right side of the menu bar', 'scope' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Secondary Menu Sidebar', 'scope' ),
		'id' => 'secondary-menu-sidebar',
		'description' => esc_html__( 'Appears in secondary overlay menu', 'scope' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );		
	
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Left', 'scope' ),
		'id' => 'top-left-widget-area',
		'description' => esc_html__( 'Top bar widget area (align left)', 'scope' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
		
	register_sidebar( array(
		'name' => esc_html__( 'Top Bar Sidebar Right', 'scope' ),
		'id' => 'top-right-widget-area',
		'description' => esc_html__( 'Top bar widget area (align right)', 'scope' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 1', 'scope' ),
		'id' => 'footer-widget-area-1',
		'description' => esc_html__( 'Appears in the footer section', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 2', 'scope' ),
		'id' => 'footer-widget-area-2',
		'description' => esc_html__( 'Appears in the footer section', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 3', 'scope' ),
		'id' => 'footer-widget-area-3',
		'description' => esc_html__( 'Appears in the footer section', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Footer Sidebar 4', 'scope' ),
		'id' => 'footer-widget-area-4',
		'description' => esc_html__( 'Appears in the footer section', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Copyright Area', 'scope' ),
		'id' => 'copyright-widget-area',
		'description' => esc_html__( 'Appears in the footer section', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'WooCommerce Page Sidebar', 'scope' ),
		'id' => 'shop-widget-area',
		'description' => esc_html__( 'Product page widget area', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Mobile Menu Sidebar', 'scope' ),
		'id' => 'mobile-menu-widget-area',
		'description' => esc_html__( 'Mobile menu widget area', 'scope' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

}

add_action( 'widgets_init', 'scope_sidebars' );