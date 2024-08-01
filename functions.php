<?php
/**
 * Functions and definitions
 * In WordPress, functions.php or the theme functions file is a template included in WordPress themes. It acts like a plugin for your WordPress site that's automatically activated with your aIn WordPress, functions.php or the theme functions file is a template included in WordPress themes. It acts like a plugin for your WordPress site that's automatically activated with your current theme.
 *
 *
 */

 define('FORCE_SSL_ADMIN', true);
	add_theme_support( 'title' );
 	
	//ADD SUPPORT FOR TITLE TAG
	// Register Theme Features
	function custom_theme_features()  {

		// Add theme support for Post Formats
		add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

		// Add theme support for Featured Images
		add_theme_support( 'post-thumbnails' );

		// Add theme support for HTML5 Semantic Markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Add theme support for document Title tag
		add_theme_support( 'title-tag' );
	}
	add_action( 'after_setup_theme', 'custom_theme_features' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
		'width'  				=> 300,
		'height' 				=> 160,
		'flex-height' 			=> true,
		'flex-width'			=> true,
		'header-text'			=> array('site-title', 'site-description'),
		'unlink-homepage-logo'	=> true
	));

	if (function_exists('register_nav_menus')){
		register_nav_menus(array(
				'Header' => __('Menú General','Silva Mobility'),
				'Marca' => __('Menú Principal Marcas','Silva Mobility'),
				'Social' => __('Social','Silva Mobility'),
				'Footer' => __('Menú en Footer','Silva Mobility'),
			)
		);
	}

	//Añadir sidebar widgets
	add_action('widgets_init', 'mis_widgets');

	function mis_widgets(){
		//Registrar un sidebar
		register_sidebar(
			array(
				'id'			=> 'sidebar',
				'name'			=> __('Barra Lateral'),
				'description'	=> __('Sólo aparece al costado'),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<p class="widget-title">',
				'after_title'	=> '</p>'
			)
		);

		register_sidebar(
			array(
				'id'			=> 'footer_1',
				'name'			=> __('Footer 1'),
				'description'	=> __('Sólo aparece en el footer'),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<p class="footer_title">',
				'after_title'	=> '</p>'
			)
		);
		register_sidebar(
			array(
				'id'			=> 'footer_2',
				'name'			=> __('Footer 2'),
				'description'	=> __('Sólo aparece en el footer'),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<p class="footer_title">',
				'after_title'	=> '</p>'
			)
		);
		register_sidebar(
			array(
				'id'			=> 'footer_3',
				'name'			=> __('Footer 3'),
				'description'	=> __('Sólo aparece en el footer'),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<p class="footer_title">',
				'after_title'	=> '</p>'
			)
		);
		register_sidebar(
			array(
				'id'			=> 'footer_4',
				'name'			=> __('Footer 4'),
				'description'	=> __('Sólo aparece en el footer'),
				'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<p class="footer_title">',
				'after_title'	=> '</p>'
			)
		);
	}
	
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

	//Add custom fonts
	// function enqueue_google_fonts() {
	// 	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', false );

	// 	wp_enqueue_style('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', false);
	// }
	// add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts' );

	//Añadir custom post type Modelos
	function create_modelos_post_type() {
		$labels = array(
			'name'                  => _x('Modelos', 'Post Type General Name', 'textdomain'),
			'singular_name'         => _x('Modelo', 'Post Type Singular Name', 'textdomain'),
			'menu_name'             => __('Modelos', 'textdomain'),
			'name_admin_bar'        => __('Modelo', 'textdomain'),
			'archives'              => __('Archivo de Modelos', 'textdomain'),
			'attributes'            => __('Atributos de Modelo', 'textdomain'),
			'parent_item_colon'     => __('Modelo Padre:', 'textdomain'),
			'all_items'             => __('Todos los Modelos', 'textdomain'),
			'add_new_item'          => __('Agregar nuevo Modelo', 'textdomain'),
			'add_new'               => __('Agregar nuevo', 'textdomain'),
			'new_item'              => __('Nuevo Modelo', 'textdomain'),
			'edit_item'             => __('Editar Modelo', 'textdomain'),
			'update_item'           => __('Actualizar Modelo', 'textdomain'),
			'view_item'             => __('Ver Modelo', 'textdomain'),
			'view_items'            => __('Ver Modelos', 'textdomain'),
			'search_items'          => __('Buscar Modelos', 'textdomain'),
			'not_found'             => __('No se encontraron Modelos', 'textdomain'),
			'not_found_in_trash'    => __('No se encontraron Modelos en la papelera', 'textdomain'),
			'featured_image'        => __('Imagen destacada', 'textdomain'),
			'set_featured_image'    => __('Establecer imagen destacada', 'textdomain'),
			'remove_featured_image' => __('Eliminar imagen destacada', 'textdomain'),
			'use_featured_image'    => __('Usar como imagen destacada', 'textdomain'),
			'insert_into_item'      => __('Insertar en el Modelo', 'textdomain'),
			'uploaded_to_this_item' => __('Subido a este Modelo', 'textdomain'),
			'items_list'            => __('Lista de Modelos', 'textdomain'),
			'items_list_navigation' => __('Navegación de la lista de Modelos', 'textdomain'),
			'filter_items_list'     => __('Filtrar lista de Modelos', 'textdomain'),
		);
	
		$args = array(
			'label'                 => __('Modelo', 'textdomain'),
			'description'           => __('Custom Post Type para Modelos', 'textdomain'),
			'labels'                => $labels,
			'supports'              => array('title', 'excerpt','editor', 'thumbnail', 'custom-fields', 'page-attributes'),
			'hierarchical'          => false,
			'menu_icon'				=> 'dashicons-car',
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
			'taxonomies'            => array('category', 'marcas'), // Asegúrate de incluir 'category' y 'marcas'
		);
		register_post_type('models', $args);
	}
	add_action('init', 'create_modelos_post_type', 0);
	

	// Añadir taxonomía Marcas para páginas
	function registrar_taxonomia_marcas() {
		$labels = array(
			'name'              => _x( 'Marcas', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Marca', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Buscar Marcas', 'textdomain' ),
			'all_items'         => __( 'Todas las Marcas', 'textdomain' ),
			'parent_item'       => __( 'Marca principal', 'textdomain' ),
			'parent_item_colon' => __( 'Marca principal:', 'textdomain' ),
			'edit_item'         => __( 'Editar Marca', 'textdomain' ),
			'update_item'       => __( 'Actualizar Marca', 'textdomain' ),
			'add_new_item'      => __( 'Agregar nueva Marca', 'textdomain' ),
			'new_item_name'     => __( 'Nombre de la nueva Marca', 'textdomain' ),
			'menu_name'         => __( 'Marcas', 'textdomain' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'marcas' ),
		);
	
		register_taxonomy( 'marcas', 'modelos', $args );
	}
	add_action( 'init', 'registrar_taxonomia_marcas' );
	
	
	function asociar_taxonomia_marcas() {
		register_taxonomy_for_object_type( 'marcas', 'modelos' );
	}
	add_action( 'init', 'asociar_taxonomia_marcas' );
	

	
	//Añadir menu por cada marca
	function registrar_menus_marcas() {
		// Obtener todas las marcas
		$marcas = get_terms( array(
			'taxonomy' => 'marcas',
			'hide_empty' => false,
		) );

		// Asegurarse de que no hay errores y que hay marcas disponibles
		if ( ! is_wp_error( $marcas ) && ! empty( $marcas ) ) {
			foreach ( $marcas as $marca ) {
				// Registrar un menú para cada marca
				register_nav_menu( 'menu_' . $marca->slug, __( 'Menú ' . $marca->name, 'textdomain' ) );
			}
		}
	}
	add_action( 'init', 'registrar_menus_marcas' );

	function actualizar_menus_marcas( $term_id, $tt_id, $taxonomy ) {
		if ( 'marcas' === $taxonomy ) {
			registrar_menus_marcas();
		}
	}
	add_action( 'created_marcas', 'actualizar_menus_marcas', 10, 3 );
	add_action( 'edited_marcas', 'actualizar_menus_marcas', 10, 3 );
	add_action( 'delete_marcas', 'actualizar_menus_marcas', 10, 3 );


	// Función para obtener todas las plantillas desde una carpeta específica
	function get_custom_templates_from_directory($directory) {
		$templates = array();
		$files = scandir($directory);

		foreach ($files as $file) {
			if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
				// Obtén el comentario de la plantilla
				$contents = file_get_contents($directory . '/' . $file);
				if (preg_match('|Template Name:(.*)$|mi', $contents, $header)) {
					$templates[$directory . '/' . $file] = _cleanup_header_comment($header[1]);
				}
			}
		}

		return $templates;
	}

	// Añadir las plantillas personalizadas al selector de plantillas
	function add_custom_post_type_templates($templates) {
		$template_directory = get_template_directory() . '/page-templates';
		$custom_templates = get_custom_templates_from_directory($template_directory);

		return array_merge($templates, $custom_templates);
	}
	add_filter('theme_page_templates', 'add_custom_post_type_templates');

	// Cargar la plantilla personalizada seleccionada
	function load_custom_post_type_template($template) {
		global $post;

		if ($post->post_type == 'model' && $template_file = get_post_meta($post->ID, '_wp_page_template', true)) {
			if ($template_file && file_exists(get_template_directory() . '/' . $template_file)) {
				$template = get_template_directory() . '/' . $template_file;
			}
		}

		return $template;
	}
	add_filter('template_include', 'load_custom_post_type_template');

	//Añadir clases según categorías
	function agregar_clases_categoria_al_body( $clases ) {
		if ( is_single() ) {
			global $post;
			$categorias = get_the_category( $post->ID );
	
			if ( ! empty( $categorias ) ) {
				foreach ( $categorias as $categoria ) {
					// Añadir una clase basada en el slug de la categoría
					$clases[] = 'page-template-'.$categoria->slug;
				}
			}
		}
		return $clases;
	}
	add_filter( 'body_class', 'agregar_clases_categoria_al_body' );
	

	// Función para limitar la longitud del excerpt
	function custom_excerpt_length( $length ) {
		return 20; // Número de palabras del excerpt
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	// Función para personalizar el final del excerpt
	function custom_excerpt_more( $more ) {
		return '...'; // Texto que aparece al final del excerpt
	}
	add_filter( 'excerpt_more', 'custom_excerpt_more' );

// Desactivar los estilos globales de Gutenberg
function remove_global_styles() {
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'remove_global_styles', 100);
