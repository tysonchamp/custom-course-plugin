// initialization phase every time a page is generated.
add_action( 'init', 'create_testimonial_reviews' );

function create_testimonial_reviews() {
    register_post_type( 'courses',
        array(
            'labels' => array(
                'name' => 'Course',
                'singular_name' => 'Courses',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Courses',
                'edit' => 'Edit',
                'edit_item' => 'Edit Courses',
                'new_item' => 'New Courses',
                'view' => 'View',
                'view_item' => 'View Courses',
                'search_items' => 'Search Courses',
                'not_found' => 'No Movie Courses',
                'not_found_in_trash' => 'No Courses found in Trash',
                'parent_item_colon' => '',
                'parent' => 'Parent Courses'
            ),

            'description',
            'public' => true,
            'menu_position' => 5,
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'page-attributes', 'custom-fields' ),
            'show_in_admin_bar' => true,
            'taxonomies' => array( '' ),
            'has_archive' => true
        )
    );
}


/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('course-type', 'courses', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Course Type', 'taxonomy general name' ),
      'singular_name' => _x( 'Course Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Locations' ),
      'all_items' => __( 'All Locations' ),
      'parent_item' => __( 'Parent Course Type' ),
      'parent_item_colon' => __( 'Parent Course Type:' ),
      'edit_item' => __( 'Edit Course Type' ),
      'update_item' => __( 'Update Course Type' ),
      'add_new_item' => __( 'Add New Course Type' ),
      'new_item_name' => __( 'New Course Type Name' ),
      'menu_name' => __( 'Course Type' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'course-type', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

