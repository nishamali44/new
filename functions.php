<?php
/*
	==========================================
	 Include scripts
	==========================================
*/
function awesome_script_enqueue() {
	//css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');
	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/katayam.css', array(), '1.0.0', 'all');
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/katayam.js', array(), '1.0.0', true);
	
}
add_action( 'wp_enqueue_scripts', 'awesome_script_enqueue');
/*
	==========================================
	 Activate menus
	==========================================
*/
function katayam_theme_setup() {
	
	add_theme_support('menus');
	
	register_nav_menu('primary', 'Primary Header Navigation');
	register_nav_menu('secondary', 'Footer Navigation');
	
}
add_action('init', 'katayam_theme_setup');
/*
	==========================================
	 Theme support function
	==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('html5',array('search-form'));
/*
	==========================================
	 Sidebar function
	==========================================
*/
function katayam_widget_setup() {
	
	register_sidebar(
		array(	
			'name'	=> 'Sidebar',
			'id'	=> 'sidebar-1',
			'class'	=> 'custom',
			'description' => 'Standard Sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		)
	);
	register_sidebar( array(
'name' => 'Footer Area 1',
'id' => 'footer-1',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

register_sidebar( array(
'name' => 'Footer Area 2',
'id' => 'footer-2',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

register_sidebar( array(
'name' => 'Footer Area 3',
'id' => 'footer-3',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );

register_sidebar( array(
'name' => 'Footer Area 4',
'id' => 'footer-4',
'description' => 'Appears in the footer area',
'before_widget' => '<aside id="%1$s" class="widget %2$s">',
'after_widget' => '</aside>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action('widgets_init','katayam_widget_setup');
/*
	==========================================
	 Include Walker file
	==========================================
*/
require get_template_directory() . '/inc/walker.php';
/*
Head function
*/
function katayam_remove_version(){
	return'';	
}
add_filter('the_generator','katayam_remove_version');

/*
	==========================================
	 Custom Post Type 
	==========================================
*/
function katayam_custom_post_type(){
	$labels=array(
	'name'=>'Portfolio',
	'singular_name'=>'Portfolio',
	'add_new'=>'Add Portfolio word',
	'all_items'=>'All Items',
	'add_new_item'=>'Add Item',
	'edit_item'=>'Edit Item',
	'new_item'=>'New Item',
	'view_item'=>'View Item',
	'search_item'=>'Search Portfolio',
	'not_found'=>'No Item Found',
	'not_found_in_trash'=>'No Item Fount In Trash',
	'parent_item_colon'=>'Parent Item'
	);	
$args=array(
'labels'=>$labels,
'public'=>true,
'has_archive'=>true,
'publicly_queryable'=>true,
'query_var'=>true,
'rewrite'=>true,
'capability_type'=>'post',
'hierarchical'=>false,
'supports'=>array(
'title',
'editor',
'excerpt',
'thumbnail',
'revisions',
),
//'taxonomies'=>array('category','post_tag'),
'menu_position'=>5,
'exclude_from_search'=>false
);
register_post_type('portfolio',$args);
}
add_action('init','katayam_custom_post_type');

function katayam_custom_taxonomies(){
	//add new taxonomies hierarchical
	$labels=array(
	'name'=>'Fields',
	'singular_name'=>'Field',
	'search_item'=>'Search Fields',
	'all_items'=>'All Field',
	'parent_item'=>'Parent Field',
	'parent_item_colon'=>'Parent Item',
	'edit_item'=>'Edit Item',
	'update_item'=>'Update Field',
	'add_new_item'=>'Add Item',
	'new_item_name'=>'New Field Name',
	'menu_name'=>'Field'
	
	);
	$args=array(
	'hierarchical'=>true,
	'labels'=>$labels,
	'show_ui'=>true,
	'show_admin_colum'=>true,
	'query_var'=>true,
	'rewrite'=>array('slug'=>'field')
	);
	register_taxonomy('field',array('portfolio'),$args);
	//add new taxonomies Not hierarchical
	register_taxonomy('software','portfolio',array(
	'label'=>'Software',
	'rewrite'=>array('slug'=>'software'),
	'hierarchical'=>false
	));
}
add_action('init','katayam_custom_taxonomies');

/*
	==========================================
     Custom Term Function	
	==========================================
*/

function katayam_get_terms($postID,$term){
	$terms_list= wp_get_post_terms($postID,$term);
	$output='';
					$i=0;
                       foreach($terms_list as $term){$i++;
					   if($i>1){$output.=',';}
	                      $output.='<a href="'.get_term_link($term).'">'.$term->name.'</a>';
                              }
							  return $output;
}