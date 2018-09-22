<?php
/*	
*	---------------------------------------------------------------------
*	SCOPE Custom meta boxes
*	--------------------------------------------------------------------- 
*/


add_action( 'admin_init', 'scope_custom_meta_boxes' );

function scope_custom_meta_boxes() {
	
	$scope_meta_page = array(
		'id'          => 'scope_page_options',
		'title'       => esc_html__( 'Page Options', 'scope' ),
		'desc'        => '',
		'pages'       => array( 'page'),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			 array(
				'id'          => 'custom_header',
				'label'       => esc_html__( 'Custom header', 'scope' ),
				'desc'        => esc_html__( 'Leave blank for default header.', 'scope' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'custom_headers',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'scope' ),
				'id'          => 'custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
			),
			array(
				'id'          => 'custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'scope' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s 2. Full width layout %1$s 3. Boxed layout', '%1$s stands for line break' ,'scope' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
			),
			array(
				'id'          => 'body_background',
				'label'       => esc_html__( 'Body background', 'scope' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'scope' ),
				'std'         => '',
				'type'        => 'background',
				'section'     => 'general',
				'condition'   => 'custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'content_width',
				'label'       => esc_html__( 'Content width', 'scope' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website.', 'scope' ),
				'std'         => '',
				'type'        => 'radio',
				'section'     => 'general',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Default', 'scope' ),
					'src'         => ''
				  ),				  
				  array(
					'value'       => '980',
					'label'       => '980px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1100',
					'label'       => '1100px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1200',
					'label'       => '1200px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1400',
					'label'       => '1400px',
					'src'         => ''
				  )
				)
			),				 
			array(
				'label'       => esc_html__( 'Page title', 'scope' ),
				'id'          => 'page_title',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Display or hide page title.', 'scope' ),
				'std'         => 'on'
			),      
			array(
				'label'       => esc_html__( 'Pre-content area', 'scope' ),
				'id'          => 'pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'scope' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => esc_html__( 'Height (optional)', 'scope' ),
				'id'          => 'pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>250px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'scope' ),
				'id'          => 'pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'scope' ),
				'condition'   => 'pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'scope' ),
				'id'          => 'pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>1200px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'pre_content_bg',
				'label'       => esc_html__( 'Background', 'scope' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'scope' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'scope' ),
				'id'          => 'pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'scope' ),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	);
	
	$scope_meta_post = array(
		'id'          => 'scope_post_options',
		'title'       => esc_html__( 'Post Options', 'scope' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(
			array(
				'id'          => 'post_lead_text',
				'label'       => esc_html__( 'Lead paragraph', 'scope' ),
				'desc'        => esc_html__( 'Optional opening text displayed below the title', 'scope' ),
				'std'         => '',
				'type'        => 'textarea',
				'rows'        => '4'
			),
		    array(
				'id'          => 'custom_header',
				'label'       => esc_html__( 'Custom header', 'scope' ),
				'desc'        => esc_html__( 'Leave blank for default header.', 'scope' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'custom_headers',
			),
			array(
				'id'          => 'top_post_advertisement',
				'label'       => esc_html__( 'Advertisement before content', 'scope' ),
				'desc'        => esc_html__( 'Leave blank for no advertisement.', 'scope' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'ads',
			),
			array(
				'id'          => 'bottom_post_advertisement',
				'label'       => esc_html__( 'Advertisement after content', 'scope' ),
				'desc'        => esc_html__( 'Leave blank for no advertisement.', 'scope' ),
				'std'         => '',
				'type'        => 'custom-post-type-select',
				'post_type'   => 'ads',
			),
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'scope' ),
				'id'          => 'custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
			),
			array(
				'id'          => 'custom_layout_style',
				'label'       => esc_html__( 'Layout style', 'scope' ),
				'desc'        => sprintf (esc_html_x( '1. Default layout %1$s 2. Full width layout %1$s3. Boxed layout', '%1$s stands for line break' ,'scope' ), '<br/>'),
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
			),
			array(
				'id'          => 'body_background',
				'label'       => esc_html__( 'Body background', 'scope' ),
				'desc'        => esc_html__( 'Choose body background for boxed layout.', 'scope' ), 
				'std'         => '',
				'type'        => 'background',
				'section'     => 'general',
				'condition'   => 'custom_layout_style:is(boxed)',
			),			 
			array(
				'id'          => 'content_width',
				'label'       => esc_html__( 'Content width', 'scope' ),
				'desc'        => esc_html__( 'This setting will apply selected layout width to your website.', 'scope' ), 
				'std'         => '',
				'type'        => 'radio',
				'section'     => 'general',
				'choices'     => array( 
				  array(
					'value'       => '',
					'label'       => esc_html__( 'Default', 'scope' ),
					'src'         => ''
				  ),				  
				  array(
					'value'       => '980',
					'label'       => '980px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1100',
					'label'       => '1100px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1200',
					'label'       => '1200px',
					'src'         => ''
				  ),
				  array(
					'value'       => '1400',
					'label'       => '1400px',
					'src'         => ''
				  )
				)
			),			 
			array(
				'label'       => esc_html__( 'Post header/title', 'scope' ),
				'id'          => 'single_post_header',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enable default header/title area for this post.', 'scope' ),
				'std'         => 'on'
			), 
			array(
				'label'       => esc_html__( 'Featured image after title', 'scope' ),
				'id'          => 'content_featured_img',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Do you want to display featured image after title in content?', 'scope' ),
				'std'         => 'on'
			), 
			array(
				'id'          => 'post_template',
				'label'       => esc_html__( 'Template', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'radio-image',
				'desc'        => sprintf (esc_html_x( '1. Default template %1$s Selected in Appearance / Theme Options / Single Post %1$s%1$s 2. Full width %1$s 3. Right sidebar %1$s 4. Left sidebar', '%1$s stands for line break' ,'scope' ), '<br/>')
			),
			array(
				'id'          => 'post_header_style',
				'label'       => esc_html__( 'Header style', 'scope' ),
				'desc'        => sprintf (esc_html_x( '1. Default template %1$s Selected in Appearance / Theme Options / Single Post %1$s%1$s 2. Default style %1$s 3. Default style + featured image in pre-content area by default %1$s 4. Content and sidebar slide up + featured image in pre-content area by default %1$s 5. Content slide up (sidebar remains static) + featured image in pre-content area by default %1$s%1$s TO CUSTOMIZE ACTIVATE PRE-CONTENT AREA', '%1$s stands for line break' ,'scope' ), '<br/>'),
				'std'         => 'opt_default',
				'type'        => 'radio-image'
			),			
			array(
				'label'       => esc_html__( 'Pre-content area', 'scope' ),
				'id'          => 'pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content.', 'scope' ),
				'std'         => 'off'
			),
			array(
				'label'       => esc_html__( 'Height (optional)', 'scope' ),
				'id'          => 'pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>250px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'scope' ),
				'id'          => 'pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'scope' ),
				'condition'   => 'pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'scope' ),
				'id'          => 'pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>1200px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'pre_content_bg',
				'label'       => esc_html__( 'Background', 'scope' ),
				'desc'        => esc_html__( 'Set custom background color or image.', 'scope' ),
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'scope' ),
				'id'          => 'pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed.', 'scope' ),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			),			
			array(
				'label'       => esc_html__( 'Set different width for paragraphs', 'scope' ),
				'id'          => 'post_width',
				'type'        => 'text',
				'std'         => '',
				'desc'        => esc_html__( 'Specify maximum width for text paragraphs without affecting other content , e.g., images.', 'scope' ),
			),
			array(
				'label'       => esc_html__( 'Post labels', 'scope' ),
				'id'          => 'post_labels',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Add some labels to the post, e.g., "Sponsored Content"', 'scope' ),
				'settings'    => array( 
				array(
					'id'          => 'post_label_text',
					'label'       => esc_html__( 'Label text', 'scope' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'text',
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'post_label_color',
					'label'       => esc_html__( 'Choose label color', 'scope' ),
					'desc'        => '',
					'std'         => '',
					'type'        => 'colorpicker',
					'operator'    => 'and'
				  )
				)

			)
		)
	
	);
	
	$scope_meta_post_views = array(
		'id'          => 'scope_post_views',
		'title'       => esc_html__( 'Edit Post Views', 'scope' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'scope_post_views_count',
				'type'        => 'text',
				'std'         => '',
				'desc'        => '',
			)
		)
	);
	
	$scope_meta_featured_image_caption = array(
		'id'          => 'scope_featured_image_caption',
		'title'       => esc_html__( 'Featured image caption', 'scope' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'side',
		'priority'    => 'core',
		'fields'      => array(			
			array(
				'label'       => '',
				'id'          => 'scope_featured_image_caption_text',
				'type'        => 'text',
				'std'         => '',
				'desc'        => 'Optional caption text for the featured image. Simple HTML allowed.',
			)
		)
	);
	
	$scope_meta_post_reviews = array(
		'id'          => 'scope_post_reviews',
		'title'       => esc_html__( 'Product Review', 'scope' ),
		'desc'        => '',
		'pages'       => array( 'post' ),
		'context'     => 'normal',
		'priority'    => 'core',
		'fields'      => array(		
			array(
			'label'       => esc_html__( 'Enable Reviews', 'scope' ),
			'id'          => 'enable_review',
			'type'        => 'on-off',
			'desc'        => esc_html__( 'Add review functionality to this post.', 'scope' ),
			'std'         => 'off'	
			),
			array(
				'label'       => esc_html__( 'Review position', 'scope'),
				'id'          => 'review_position',
				'type'        => 'select',
				'choices'     => array( 
					array(
						'value'       => 'top',
						'label'       => esc_html__( 'Top of the post', 'scope' ),
						'src'         => ''
					),
					array(
						'value'       => 'bottom',
						'label'       => esc_html__( 'Bottom of the post', 'scope' ),
						'src'         => ''
					)
				),	
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Choose where review will appear', 'scope' )
			),
			array(
				'label'       => esc_html__( 'Review title', 'scope'),
				'id'          => 'review_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Name this review', 'scope' )
			),
			array(
				'label'       => esc_html__( 'Overall rating', 'scope'),
				'id'          => 'review_overall_rating',
				'type'        => 'numeric-slider',
				'std'         => '5',
				'min_max_step'=> '0,10,0.1',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Give overall rating from 0 to 10 to this product.', 'scope' )
			),
			array(
				'label'       => esc_html__( 'Use review breakdown', 'scope' ),
				'id'          => 'review_breakdown',
				'type'        => 'on-off',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'If this option is active, overall review rating will be calculated from the ratings in the list.', 'scope' ),
				'std'         => 'off'
			), 	
			array(
				'label'       => esc_html__( 'Review ratings breakdown', 'scope' ),
				'id'          => 'review_ratings',
				'type'        => 'list_item',
				'std'         => '',
				'desc'        => esc_html__( 'Rate product from various aspects, e.g., "Design, Features, Performance"', 'scope' ),
				'condition'   => 'enable_review:is(on),review_breakdown:is(on)',
				'class'       => 'child-options child-first child-last',	
				'settings'    => array( 
				array(
					'id'          => 'review_aspect_name',
					'label'       => esc_html__( 'Name', 'scope' ),
					'std'         => '',
					'type'        => 'text',
					'desc'        => esc_html__( 'Name this review aspect,  e.g., "Design"', 'scope' ),
					'operator'    => 'and'
				  ),
				array(
					'id'          => 'review_aspect_rating',
					'label'       => esc_html__( 'Rating', 'scope' ),
					'desc'        => '',
					'type'        => 'numeric-slider',
					'std'         => '5',
					'min_max_step'=> '0,10,0.1',
					'operator'    => 'and'
				  )
				)
			),
			array(
				'label'       => esc_html__( 'Good things', 'scope' ),
				'id'          => 'review_good_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing good things in this product, e.g, "The Good"', 'scope' )
			),
			array(
				'label'       => '',
				'id'          => 'review_good',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was good in this product', 'scope' )
			),
			array(
				'label'       => esc_html__( 'Bad things', 'scope' ),
				'id'          => 'review_bad_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing bad things in this product, e.g, "The Bad"', 'scope' )
			),
			array(
				'label'       => '',
				'id'          => 'review_bad',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Describe what was bad in this product', 'scope' )
			),
			array(
				'label'       => esc_html__( 'Bottom line', 'scope' ),
				'id'          => 'review_bottomline_title',
				'type'        => 'text',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add title for describing the bottom line of this product, e.g, "The Bottom Line"', 'scope' )
			),
			array(
				'label'       => '',
				'id'          => 'review_bottomline',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'So what is the bottom line for this product?', 'scope' )
			),
			array(
				'label'       => esc_html__( 'Custom content', 'scope' ),
				'id'          => 'review_custom_field',
				'type'        => 'textarea',
				'std'         => '',
				'condition'   => 'enable_review:is(on)',
				'desc'        => esc_html__( 'Add any custom content here, shortcodes are allowed', 'scope' )
			)
		)
	);
	
	$scope_meta_ads = array(
		'id'          => 'scope_ads_options',
		'title'       => esc_html__( 'Ad Options', 'scope' ),
		'desc'        => '',
		'pages'       => array( 'ads' ),
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(			
			array(
				'label'       => esc_html__( 'URL', 'scope' ),
				'id'          => 'ad_url',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Include %1$s %2$s or %3$s', '%1$s, %2$s, %3$s stand for protocol types.' ,'scope' ), '<code>http://</code>', '<code>https://</code>', '<code>//</code>')
			),
			array(
				'id'          => 'ad_url_target',
				'label'       => esc_html__( 'Target', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => esc_html__( 'The target attribute specifies how to open the link.', 'scope' ),
				'choices'     => array( 
					array(
						'value'       => '_blank',
						'label'       => esc_html__( '_blank (opens in new window or tab)', 'scope' ),
						'src'         => ''
					),
					array(
						'value'       => '_self',
						'label'       => esc_html__( '_self (opens in the same frame as it was clicked)', 'scope' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'ad_url:not()'
			),			
			array(
				'id'          => 'ad_url_rel',
				'label'       => esc_html__( 'Use rel="nofollow"', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'select',
				'desc'        => sprintf( wp_kses_post( _x( 'Specifies the relationship between the current document and the linked document. %1$s <a href="%2$s">Should I use it?</a>', '%1$s stands for line break, %2$s stands for linked page.','scope' ) ), '<br/>', esc_url( 'https://support.google.com/webmasters/answer/96569?hl=en' ) ),
				'choices'     => array( 
					array(
						'value'       => '',
						'label'       => esc_html__( 'No', 'scope' ),
						'src'         => ''
					),
					array(
						'value'       => 'rel=nofollow',
						'label'       => esc_html__( 'Yes', 'scope' ),
						'src'         => ''
					)
				),	
				'operator'    => 'and',
				'condition'   => 'ad_url:not()'
			),
			array(
				'label'       => esc_html__( 'Alternative text', 'scope' ),
				'id'          => 'ad_alt_text',
				'type'        => 'text',
				'desc'        => esc_html__( 'Add text for alt attribute.', 'scope' )
			),	
			array(
				'label'       => esc_html__( 'Advertisement block width', 'scope' ),
				'id'          => 'ad_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block width, e.g. %s', '%s stands for example value, do not delete it.' ,'scope' ), '<code>140px</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement block height (optional)', 'scope' ),
				'id'          => 'ad_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify maximum ad block height, e.g. %1$s %2$s Will cut off ad block, if value smaller than actual ad size used.', '%1$s stands for example value, %2$s stands for line break.' ,'scope' ), '<code>440px</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block position (optional)', 'scope' ),
				'id'          => 'ad_position',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block position using css margin: property. %1$s For example %2$s will center the ad inside.', '%1$s stands for line break, %2$s stands for example value.' ,'scope' ), '<br/>', '<code>0 auto</code>')
			),
			array(
				'label'       => esc_html__( 'Advertisement block float (optional)', 'scope' ),
				'id'          => 'ad_float',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify ad block float using css float: property. %1$s For example %2$s will float ad to the left side.', '%1$s stands for line break, %2$s stands for example value.' ,'scope' ), '<br/>', '<code>left</code>')
			),
			array(
				'id'          => 'ad_image',
				'label'       => esc_html__( 'Advertisement Image', 'scope' ),
				'desc'        => esc_html__( 'Choose advertisement image.', 'scope' ),
				'std'         => '',
				'type'        => 'upload'
			),
			array(
				'label'       => esc_html__( 'Advertisement image width', 'scope' ),
				'id'          => 'ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value, do not delete it.' ,'scope' ), '<code>140</code>')
			),			
			array(
				'label'       => esc_html__( 'Advertisement image height', 'scope' ),
				'id'          => 'ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'scope' ), '<code>400</code>', '<br/>')
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image', 'scope' ),
				'id'          => 'responsive_ad',
				'type'        => 'on-off',
				'desc'        => esc_html__('Use different image for smaller screens', 'scope' ),
				'std'         => 'off'
			), 
			array(
				'id'          => 'responsive_ad_image',
				'label'       => esc_html__( 'Advertisement Image', 'scope' ),
				'desc'        => esc_html__( 'Choose advertisement image for screens below 979px (Tablet portrait) and below 1024px (Tablet landscape), if placed in header widget area.', 'scope' ),
				'std'         => '',
				'type'        => 'upload',
				'condition'   => 'responsive_ad:is(on)',
				'class'       => 'child-options child-first'				
			),
			array(
				'label'       => esc_html__( 'Responsive advertisement image width', 'scope' ),
				'id'          => 'responsive_ad_image_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify width of ad image for the "width" html attribute, e.g. %s', '%s stands for example value. Do not delete it.', 'scope' ), '<code>140</code>'),
				'condition'   => 'responsive_ad:is(on)',
				'class'       => 'child-options'				
			),			
			array(
				'label'       => esc_html__( 'Responsive advertisement image height', 'scope' ),
				'id'          => 'responsive_ad_image_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Specify height of ad image for the "height" html attribute, e.g. %1$s %2$s It will not affect actual image display height.', '%1$s stands for example value, %2$s stands for line break.', 'scope' ), '<code>400</code>', '<br/>'),
				'condition'   => 'responsive_ad:is(on)',
				'class'       => 'child-options child-last'				
			),
			array(
				'label'       => esc_html__( 'Hide ad on mobiles', 'scope' ),
				'id'          => 'hide_responsive_ad',
				'type'        => 'on-off',
				'desc'        =>  esc_html__( 'Hide advertisement on screens smaller than 767px (Mobile phones).', 'scope' ),
				'std'         => 'off'
			), 
			array(
				'label'       => esc_html__( 'Label', 'scope' ),
				'id'          => 'ad_note',
				'type'        => 'text',
				'desc'        => esc_html__( 'Optional label under advertisement, e.g. "Sponsored" or "Advertisement".', 'scope' )
			),	
			array(
				'label'       => '',
				'id'          => 'ads_textblock',
				'type'        => 'textblock',
				'desc'        => '<div class="section-title">'. esc_html__( 'If you use Custom HTML, you can leave fields above empty.', 'scope' ) .'</div>'
			),			
			array(
				'label'       => esc_html__( 'Custom HTML', 'scope' ),
				'id'          => 'ad_html',
				'type'        => 'textarea',
				'rows'        => '14',
				'desc'        => esc_html__( 'Insert any custom code.', 'scope' )
			)
		)
	);
	
	$scope_meta_product = array(
		'id'          => 'scope_product_options',
		'title'       => esc_html__( 'Page Options', 'scope' ),
		'desc'        => '',
		'pages'       => 'product',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'label'       => esc_html__( 'Custom theme accent color', 'scope' ),
				'id'          => 'custom_accent_color',
				'desc'        => esc_html__( 'Set different accent color for this page. Leave blank for default color', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
			 ),
			array(
				'label'       => esc_html__( 'Pre-content area', 'scope' ),
				'id'          => 'pre_content_activation',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Activates additional area before page title and main content', 'scope' ),
				'std'         => 'off'
			 ),
			array(
				'label'       => '',
				'id'          => 'bct_textblock',
				'type'        => 'textblock',
				'desc'        => '<div class="section-title">'. esc_html__( 'Pre-content area options', 'scope' ) .'</div>',
				'condition'   => 'pre_content_activation:is(on)'
			),
			array(
				'label'       => esc_html__( 'Height (optional)', 'scope' ),
				'id'          => 'pre_content_height',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area height. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>250px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-first'
			),
			array(
				'label'       => esc_html__( 'Responsive height (optional)', 'scope' ),
				'id'          => 'pre_content_responsive_height',
				'type'        => 'on-off',
				'desc'        => esc_html__( 'Enables auto height in responsive mode.', 'scope' ),
				'condition'   => 'pre_content_activation:is(on)',
				'std'         => 'off',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Max width (optional)', 'scope' ),
				'id'          => 'pre_content_width',
				'type'        => 'text',
				'desc'        => sprintf (esc_html_x( 'Pre-content area max width. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>1200px</code>'),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'id'          => 'pre_content_bg',
				'label'       => esc_html__( 'Background', 'scope' ),
				'desc'        => 'Set custom background color or image',
				'type'        => 'background',
				'rows'        => '',
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options'
			),
			array(
				'label'       => esc_html__( 'Custom HTML', 'scope' ),
				'id'          => 'pre_content_html',
				'type'        => 'textarea',
				'rows'        => '4',
				'desc'        => esc_html__( 'Insert any custom code you wish. Shortcodes are allowed', 'scope' ),
				'condition'   => 'pre_content_activation:is(on)',
				'class'       => 'child-options child-last'
			)
		)
	);	
	
	
	$scope_meta_headers = array(
		'id'          => 'scope_headers_options',
		'title'       => esc_html__( 'Header Options', 'scope' ),
		'desc'        => '',
		'pages'       => 'custom_headers',
		'context'     => 'normal',
		'priority'    => 'high',
		'fields'      => array(
			array(
				'id'          => 'default_header_tab',
				'label'       => esc_html__( 'General', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'sticky_header',
				'label'       => esc_html__( 'Sticky header', 'scope' ),
				'desc'        => esc_html__( 'Do you want a header to stick to top while you scroll?', 'scope' ),
				'std'         => 'sticky_header_smart',
				'type'        => 'radio',
				'condition'   => '',
				'choices'     => array( 
				array(
					'value'       => 'sticky_header_smart',
					'label'       => esc_html__( 'Smart header (sticky only when scrolling up)', 'scope' ),
					'src'         => ''
				  ),
				array(
					'value'       => 'sticky_header',
					'label'       => esc_html__( 'Always sticky header', 'scope' ),
					'src'         => ''
				  ),
				array(
					'value'       => 'no_sticky',
					'label'       => esc_html__( 'Disable sticky header', 'scope' ),
					'src'         => ''
				  )
				)
			  ),
			array(
				'id'          => 'header_style',
				'label'       => esc_html__( 'Header layout', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Header layouts have following structure: %1$s%1$s %2$sDefault%3$s - Top bar/logo and header widget area/menu bar with widget area. %1$s%1$s %2$sMenu bar%3$s - Top bar/menu bar with logo and widget area. %1$s%1$s %2$sInverse default%3$s - Top bar/menu bar with widget area/logo and header widget area. %1$s%1$s %2$sCentred header%3$s - Top bar/centred logo and header widget area/menu bar with widget area. %1$s%1$s %2$sCentred header and menu%3$s - Top bar/centred logo and header widget area/centered menu bar with. %1$s%1$s %2$sFull width menu bar%3$s - Full width top bar/full width menu bar with logo and widget area. %1$s%1$s', '%1$s stands for line break. %2$s and %3$s stand for <strong> opening and closing tags' ,'scope' ), '<br/>', '<strong>', '</strong>'),
				'std'         => '',
				'type'        => 'select',
				'condition'   => '',
				'choices'     => array( 
				  array(
					'value'       => '1',
					'label'       => esc_html__( 'Default', 'scope' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '2',
					'label'       => esc_html__( 'Menu bar', 'scope' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '3',
					'label'       => esc_html__( 'Inverse default', 'scope' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '4',
					'label'       => esc_html__( 'Centred header', 'scope' ),
					'src'         => '4'
				  ),
				  array(
					'value'       => '5',
					'label'       => esc_html__( 'Centred header and menu', 'scope' ),
					'src'         => ''
				  ),
				  array(
					'value'       => '6',
					'label'       => esc_html__( 'Full width menu bar', 'scope' ),
					'src'         => ''
				  )
				)
			  ),
			array(
				'id'          => 'header_bg',
				'label'       => esc_html__( 'Header background color', 'scope' ),
				'desc'        => esc_html__( 'Choose your site header color.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'header_style:not(2),header_style:not(6)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'header_padding_top',
				'label'       => esc_html__( 'Header padding top', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Set top padding for your header. Please add size units, e.g., %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>20px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => 'header_style:not(2),header_style:not(6)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'header_padding_bottom',
				'label'       => esc_html__( 'Header padding bottom', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Set bottom padding for your header. Please add size units, e.g., %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>20px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => 'header_style:not(2),header_style:not(6)',
				'operator'    => 'and'
			  ),
			 array(
				'id'          => 'header_custom_css',
				'label'       => esc_html__( 'Custom CSS', 'scope' ),
				'desc'        => esc_html__( 'Add custom CSS for this header.', 'scope' ),
				'std'         => '',
				'type'        => 'textarea_simple',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'menu_tab',
				'label'       => esc_html__( 'Menu', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'menu_height',
				'label'       => esc_html__( 'Menu height', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Set menu bar height. Example: %s', '%s stands for example value. Do not delete it.' ,'scope' ), '<code>60px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'menu_color',
				'label'       => esc_html__( 'Menu background color', 'scope' ),
				'desc'        => esc_html__( 'Background color for the menu bar. Leave blank to use theme accent color.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'search_button',
				'label'       => esc_html__( 'Search button in menu', 'scope' ),
				'desc'        => esc_html__( 'Enables or disables search from menu.', 'scope' ),
				'std'         => 'on',
				'type'        => 'on-off',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'cart_button',
				'label'       => esc_html__( 'WooCommerce cart button in menu', 'scope' ),
				'desc'        => esc_html__( 'Do you want a smart WooCommerce cart icon in main menu?', 'scope' ),
				'std'         => 'on',
				'type'        => 'on-off',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'default_menu_link',
				'label'       => esc_html__( 'Menu link color', 'scope' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'default_menu_link_h',
				'label'       => esc_html__( 'Menu link hover color', 'scope' ),
				'desc'        => esc_html__( 'Leave empty to use "Theme accent color".', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'show_submenu_styles',
				'label'       => esc_html__( 'Show submenu options?', 'scope' ),
				'desc'        => esc_html__( 'Enable submenu styling.', 'scope' ),
				'std'         => 'off',
				'type'        => 'on-off',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_section_info',
				'label'       => esc_html__( 'Submenu section info', 'scope' ),
				'desc'        => '<div class="section-title">'. esc_html__( 'Submenu options', 'scope' ) .'</div>',
				'std'         => '',
				'type'        => 'textblock',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_background',
				'label'       => esc_html__( 'Submenu background color', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Background color for the submenu section. %1$s Leave empty for default color.', '%1$s stands for line break' ,'scope' ), '<br/>'),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_link_color',
				'label'       => esc_html__( 'Submenu link color', 'scope' ),
				'desc'        => esc_html__( 'Color for links in submenu.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'submenu_hover_bg',
				'label'       => esc_html__( 'Submenu item background hover color', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Background color for hovered menu item. %1$s Leave empty for default color.', '%1$s stands for line break' ,'scope' ), '<br/>'),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_section_info',
				'label'       => esc_html__( 'Megamenu section info', 'scope' ),
				'desc'        => '<div class="section-title">'. esc_html__( 'Mega-menu options', 'scope' ) .'</div>',
				'std'         => '',
				'type'        => 'textblock',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_title_color',
				'label'       => esc_html__( 'Megamenu title color', 'scope' ),
				'desc'        => esc_html__( 'Color for column title inside megamenu.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_active_item_color',
				'label'       => esc_html__( 'Megamenu hover &amp; active item color', 'scope' ),
				'desc'        => esc_html__( 'Leave empty to use "Theme accent color".', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'megamenu_separator_color',
				'label'       => esc_html__( 'Megamenu column separator color', 'scope' ),
				'desc'        => esc_html__( 'Leave empty for default color.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'show_submenu_styles:is(on)',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_tab',
				'label'       => esc_html__( 'Logo', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo',
				'label'       => esc_html__( 'Logo', 'scope' ),
				'desc'        => esc_html__( 'Please choose an image file for your logo.', 'scope' ),
				'std'         => '',
				'type'        => 'upload',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_retina',
				'label'       => esc_html__( 'Logo (Retina version @2x)', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Retina logo should be %s the size of default logo keeping the aspect ratio!', '%s stands for the value. Do not delete it.' ,'scope' ), '<code>2x</code>'),
				'std'         => '',
				'type'        => 'upload',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'retina_logo_width',
				'label'       => esc_html__( 'Standard logo width (for retina logo)', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Please enter the STANDARD (1x) logo width. %1$s Remember to add %2$s value in the end. Example: %3$s', '%1$s stands for line break, %2$s and %3$s stand for example value.' ,'scope' ), '<br/>', '<code>px</code>', '<code>100px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'retina_logo_height',
				'label'       => esc_html__( 'Standard logo height (for retina logo)', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Please enter the STANDARD (1x) logo height. %1$s Remember to add %2$s value in the end. Example: %3$s', '%1$s stands for line break, %2$s and %3$s stand for example value.' ,'scope' ), '<br/>', '<code>px</code>', '<code>100px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_top',
				'label'       => esc_html__( 'Margin top', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Move your logo vertically with this option. Remember to add %1$s value after the number. For example: %2$s', '%1$s and %2$s stand for example value. Do not delete it.' ,'scope' ), '<code>px</code>', '<code>25px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'logo_left',
				'label'       => esc_html__( 'Margin left', 'scope' ),
				'desc'        => sprintf (esc_html_x( 'Move your logo horizontally with this option. Remember to add %1$s value after the number. For example: %2$s', '%1$s and %2$s stand for example value. Do not delete it.' ,'scope' ), '<code>px</code>', '<code>25px</code>'),
				'std'         => '',
				'type'        => 'text',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'id'          => 'top_bar_tab',
				'label'       => esc_html__( 'Top bar', 'scope' ),
				'desc'        => '',
				'std'         => '',
				'type'        => 'tab',
				'condition'   => '',
				'operator'    => 'and'
			  ),
			array(
				'label'       => esc_html__( 'Top bar', 'scope' ),
				'id'          => 'top_bar',
				'type'        => 'on-off',
				'desc'        => 'Enable or disable top bar above the header.',
				'std'         => 'off'
			),   			  
			array(
				'id'          => 'top_bar_bg',
				'label'       => esc_html__( 'Background color', 'scope' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'top_bar:is(on)'
			  ),
			array(
				'id'          => 'top_bar_text_color',
				'label'       => esc_html__( 'Text and link color', 'scope' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'top_bar:is(on)'
			  ),
			array(
				'id'          => 'top_bar_link_hover',
				'label'       => esc_html__( 'Link hover color', 'scope' ),
				'desc'        => esc_html__( 'Click input field for color picker or enter your custom value.', 'scope' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'condition'   => 'top_bar:is(on)'
			  ),
		)
	);

  
	if ( function_exists( 'ot_register_meta_box' ) ) {
		ot_register_meta_box( $scope_meta_page );
		ot_register_meta_box( $scope_meta_post );
		ot_register_meta_box( $scope_meta_product );
		ot_register_meta_box( $scope_meta_headers );
		ot_register_meta_box( $scope_meta_ads );
		ot_register_meta_box( $scope_meta_post_views );
		ot_register_meta_box( $scope_meta_featured_image_caption );
		ot_register_meta_box( $scope_meta_post_reviews );
	}
}