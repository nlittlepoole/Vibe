<?php
$config['menu'] = array(
	'admin' => array(
		array(
			'label' => 'Layout',
			'icon' => 'icon-tv',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Fluid Layout',
					'icon' => 'fa fa-circle-o',
					'href' => '?' . http_build_query(array_merge($_GET, array('layout_fixed' => 'false'))),
					'link_class' => 'no-ajaxify'
				),
				array(
					'label' => 'Fixed Layout',
					'icon' => 'fa fa-square-o',
					'href' => '?' . http_build_query(array_merge($_GET, array('layout_fixed' => 'true'))),
					'link_class' => 'no-ajaxify'
				),
			)
		),
		array(
			'label' => 'Timelines',
			'icon' => 'icon-ship-wheel',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Timeline #1',
					'icon' => 'fa fa-clock-o',
					'page' => 'index'
				),
				array(
					'label' => 'Timeline #2',
					'icon' => 'fa fa-clock-o',
					'page' => 'timeline_2'
				),
				array(
					'label' => 'Timeline #3',
					'icon' => 'fa fa-clock-o',
					'page' => 'timeline_3'
				)
			)
		),
		array(
			'label' => 'Photos',
			'icon' => 'icon-flip-camera-fill',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Photos #1',
					'icon' => 'fa fa-camera',
					'page' => 'media_1'
				),
				array(
					'label' => 'Photos #2',
					'icon' => 'fa fa-camera',
					'page' => 'media_2'
				),
				array(
					'label' => 'Photos #3',
					'icon' => 'fa fa-camera',
					'page' => 'media_3'
				)
			)
		),
		array(
			'label' => 'Friends',
			'icon' => 'icon-group',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Friends #1',
					'icon' => 'fa fa-group',
					'page' => 'contacts_1'
				),
				array(
					'label' => 'Friends #2',
					'icon' => 'fa fa-group',
					'page' => 'contacts_2'
				),
				array(
					'label' => 'Friends #3',
					'icon' => 'fa fa-group',
					'page' => 'contacts_3'
				)
			)
		),
		array(
			'label' => 'About',
			'icon' => 'icon-user-1',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'About #1',
					'icon' => 'fa fa-user',
					'page' => 'about_1'
				),
				array(
					'label' => 'About #2',
					'icon' => 'fa fa-user',
					'page' => 'about_2'
				),
				array(
					'label' => 'About #3',
					'icon' => 'fa fa-user',
					'page' => 'about_3'
				)
			)
		),
		array(
			'label' => 'Messages',
			'icon' => 'icon-comment-typing',
			'page' => 'messages'
		),
		array(
			'label' => 'Skins',
			'class' => 'category border-top'
		),
		array(
			'label' => 'Skins Custom HTML',
			'class' => 'reset',
			'file' => 'skins.php'
		),
		array(
			'label' => 'Components',
			'icon' => 'fa fa-th-large',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'UI Elements',
					'icon' => 'fa fa-circle-o',
					'page' => 'ui'
				),
				array(
					'label' => 'Icons',
					'icon' => 'fa fa-circle-o',
					'page' => 'icons'
				),
				array(
					'label' => 'Typography',
					'icon' => 'fa fa-circle-o',
					'page' => 'typography'
				),
				array(
					'label' => 'Calendar',
					'icon' => 'fa fa-circle-o',
					'page' => 'calendar'
				),
				array(
					'label' => 'Tabs',
					'icon' => 'fa fa-circle-o',
					'page' => 'tabs'
				),
				array(
					'label' => 'Tables',
					'icon' => 'fa fa-circle-o',
					'type' => 'collapse',
					'badge' => [
						'class' => 'badge-primary',
						'label' => '3'
					],
					'page' => array(
						array(
							'label' => 'Tables',
							'page' => 'tables'
						),
						array(
							'label' => 'Responsive Tables',
							'page' => 'tables_responsive'
						),
						array(
							'label' => 'Pricing Tables',
							'page' => 'tables_pricing'
						),
					)
				),
				array(
					'label' => 'Forms',
					'icon' => 'fa fa-circle-o',
					'type' => 'collapse',
					'badge' => [
						'class' => 'badge-primary',
						'label' => '4'
					],
					'page' => array(
						array(
							'label' => 'Form Wizards',
							'page' => 'form_wizards'
						),
						array(
							'label' => 'Form Elements',
							'page' => 'form_elements'
						),
						array(
							'label' => 'Form Validator',
							'page' => 'form_validator'
						),
						array(
							'label' => 'File Managers',
							'page' => 'file_managers'
						),
					)
				),
				array(
					'label' => 'Sliders',
					'icon' => 'fa fa-circle-o',
					'page' => 'sliders'
				),
				array(
					'label' => 'Charts',
					'icon' => 'fa fa-circle-o',
					'page' => 'charts'
				),
				array(
					'label' => 'Grid',
					'icon' => 'fa fa-circle-o',
					'page' => 'grid'
				),
				array(
					'label' => 'Notifications',
					'icon' => 'fa fa-circle-o',
					'page' => 'notifications'
				),
				array(
					'label' => 'Modals',
					'icon' => 'fa fa-circle-o',
					'page' => 'modals'
				),
				array(
					'label' => 'Thumbnails',
					'icon' => 'fa fa-circle-o',
					'page' => 'thumbnails'
				),
				array(
					'label' => 'Carousels',
					'icon' => 'fa fa-circle-o',
					'page' => 'carousels'
				),
				array(
					'label' => 'Image Cropping',
					'icon' => 'fa fa-circle-o',
					'page' => 'image_crop'
				),
				array(
					'label' => 'Twitter API',
					'icon' => 'fa fa-circle-o',
					'page' => 'twitter'
				),
				array(
					'label' => 'Infinite Scroll',
					'icon' => 'fa fa-circle-o',
					'page' => 'infinite_scroll'
				),
			)
		),
		array(
			'label' => 'Extra',
			'icon' => 'fa fa-gift',
			'type' => 'collapse',
			'page' => array(
				array(
					'label' => 'Dashboard',
					'icon' => 'fa fa-dashboard',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Analytics',
							'icon' => 'fa fa-bar-chart-o',
							'page' => 'dashboard_analytics'
						),
						array(
							'label' => 'Users',
							'icon' => 'fa fa-user',
							'page' => 'dashboard_users'
						),
						array(
							'label' => 'Overview',
							'icon' => 'fa fa-dashboard',
							'page' => 'dashboard_overview'
						),
					)
				),
				array(
					'label' => 'Email',
					'icon' => 'fa fa-envelope',
					'type' => 'collapse',
					'badge' => [
						'label' => '30',
						'class' => 'badge-primary'
					],
					'page' => array(
						array(
							'label' => 'Inbox',
							'icon' => 'fa fa-inbox',
							'page' => 'email'
						),
						array(
							'label' => 'Compose',
							'icon' => 'fa fa-pencil',
							'page' => 'email_compose'
						),
					)
				),
				array(
					'label' => 'Events',
					'icon' => 'fa fa-map-marker',
					'badge' => [
						'label' => '5',
						'class' => 'badge-primary'
					],
					'page' => 'events'
				),
				array(
					'label' => 'Maps',
					'icon' => 'fa fa-map-marker',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Vector Maps',
							'icon' => 'fa fa-map-marker',
							'page' => 'maps_vector'
						),
						array(
							'label' => 'Google Maps',
							'icon' => 'fa fa-map-marker',
							'page' => 'maps_google'
						),
					)
				),
				array(
					'label' => 'Employees',
					'icon' => 'fa fa-user',
					'page' => 'employees'
				),
				array(
					'label' => 'Medical',
					'icon' => 'fa fa-plus-circle',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Overview',
							'icon' => 'fa fa-medkit',
							'page' => 'medical_overview'
						),
						array(
							'label' => 'Patients',
							'icon' => 'fa fa-user-md',
							'page' => 'medical_patients',
							'badge' => array(
								'class' => 'badge-primary',
								'label' => '2'
							)
						),
						array(
							'label' => 'Appointments',
							'icon' => 'fa fa-stethoscope',
							'page' => 'medical_appointments'
						),
						array(
							'label' => 'Memos',
							'icon' => 'fa fa-file-text-o',
							'page' => 'medical_memos'
						),
						array(
							'label' => 'Metrics',
							'icon' => 'fa fa-bar-chart-o',
							'page' => 'medical_metrics'
						),
					)
				),
				array(
					'label' => 'Courses',
					'icon' => 'fa fa-graduation-cap',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Courses Home',
							'icon' => 'fa fa-graduation-cap',
							'page' => 'courses_2'
						),
						array(
							'label' => 'Courses Listing',
							'icon' => 'fa fa-graduation-cap',
							'page' => 'courses_listing'
						),
						array(
							'label' => 'Course page',
							'icon' => 'fa fa-graduation-cap',
							'page' => 'course'
						),
					)
				),
				array(
					'label' => 'Content',
					'icon' => 'fa fa-file-text-o',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'News',
							'icon' => 'fa fa-file-text',
							'page' => 'news'
						),
						array(
							'label' => 'FAQ',
							'icon' => 'fa fa-question-circle',
							'page' => 'faq'
						),
						array(
							'label' => 'Search',
							'icon' => 'fa fa-search',
							'page' => 'search'
						),
					)
				),
				array(
					'label' => 'Financial',
					'icon' => 'fa fa-bank',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Invoice',
							'icon' => 'fa fa-file-text-o',
							'page' => 'invoice'
						),
						array(
							'label' => 'Finances',
							'icon' => 'fa fa-legal',
							'page' => 'finances'
						),
						array(
							'label' => 'Bookings',
							'icon' => 'fa fa-ticket',
							'page' => 'bookings'
						),
					)
				),
				array(
					'label' => 'Support',
					'icon' => 'fa fa-life-saver',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Tickets',
							'icon' => 'fa fa-ticket',
							'page' => 'support_tickets',
							'badge' => array(
								'class' => 'badge-primary',
								'label' => '45'
							)
						),
						array(
							'label' => 'Forum Overview',
							'icon' => 'fa fa-folder-o',
							'page' => 'support_forum_overview'
						),
						array(
							'label' => 'Forum Post',
							'icon' => 'fa fa-folder-o',
							'page' => 'support_forum_post'
						),
						array(
							'label' => 'Knowledge Base',
							'icon' => 'fa fa-file-text-o',
							'page' => 'support_kb'
						),
						array(
							'label' => 'Questions',
							'icon' => 'fa fa-question',
							'page' => 'support_questions',
							'badge' => array(
								'class' => 'badge-primary',
								'label' => '7'
							)
						),
						array(
							'label' => 'Answers',
							'icon' => 'fa fa-info',
							'page' => 'support_answers'
						),
					)
				),
				array(
					'label' => 'eCommerce',
					'icon' => 'fa fa-shopping-cart',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Products',
							'icon' => 'fa fa-list',
							'page' => 'shop_products'
						),
						array(
							'label' => 'Edit product',
							'icon' => 'fa fa-pencil',
							'page' => 'shop_edit_product'
						),
					)
				),
				array(
					'label' => 'Account',
					'icon' => 'fa fa-user',
					'type' => 'collapse',
					'page' => array(
						array(
							'label' => 'Login',
							'icon' => 'fa fa-user',
							'page' => 'login',
							'link_class' => 'no-ajaxify'
						),
						array(
							'label' => 'Signup',
							'icon' => 'fa fa-plus-circle',
							'page' => 'signup',
							'link_class' => 'no-ajaxify'
						),
					)
				),
				array(
					'label' => 'Surveys',
					'icon' => 'fa fa-question-circle',
					'page' => 'surveys_multiple'
				),
				array(
					'label' => 'Error',
					'icon' => 'fa fa-exclamation-triangle',
					'page' => 'error',
					'link_class' => 'no-ajaxify'
				),
			)
		),
		array(
			'label' => 'News Feeds',
			'class' => 'category border-top'
		),
		array(
			'label' => 'News Feeds Custom HTML',
			'class' => 'reset',
			'file' => 'news_feeds.php'
		),
		array(
			'label' => 'Filter',
			'class' => 'category'
		),
		array(
			'label' => 'Filter Custom HTML',
			'class' => 'reset',
			'file' => 'filter.php'
		),
	)
);