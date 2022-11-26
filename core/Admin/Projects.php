<?php

/**
 * Admin::Projects
 *
 * @package MarionPortfolio Theme
 */

namespace App\Admin;

/**
 * Projects CPT
 */
class Projects
{

    /**
     * Init / Run
     * 
     * @access public
     */
    public function run()
    {
        add_action('init', [$this, 'register']);
        add_action('init', [$this, 'register_taxonomies']);
        add_action('init', [$this, 'add_caps']);
    }



    /**
     * Register post type Projects.
     *
     * @access public
     */
    public function register()
    {

        $labels = array(
            'name'                  => _x('Projets', 'Post Type General Name', 'portfolio'),
            'singular_name'         => _x('Projet', 'Post Type Singular Name', 'portfolio'),
            'menu_name'             => __('Projets', 'portfolio'),
            'name_admin_bar'        => __('Projet', 'portfolio'),
            'all_items'             => __('Tous les projets', 'portfolio'),
            'add_new_item'          => __('Ajouter un nouveau projet', 'portfolio'),
            'add_new'               => __('Ajouter', 'portfolio'),
            'new_item'              => __('Nouveau', 'portfolio'),
            'edit_item'             => __('Modifier le projet', 'portfolio'),
            'update_item'           => __('Mettre à jour', 'portfolio'),
            'view_item'             => __('Voir le projet', 'portfolio'),
            'view_items'            => __('Voir les projets', 'portfolio'),
            'search_items'          => __('Rechercher des projets', 'portfolio'),
            'not_found'             => __('Aucun projet trouvé', 'portfolio'),
            'not_found_in_trash'    => __('Aucun projet trouvé dans la corbeille', 'portfolio'),
        );
        $capabilities = array(
            'edit_post'             => 'edit_project',
            'read_post'             => 'read_project',
            'delete_post'           => 'delete_project',
            'edit_posts'            => 'edit_projects',
            'edit_others_posts'     => 'edit_others_projects',
            'publish_posts'         => 'publish_projects',
            'read_private_posts'    => 'read_private_projects',
        );
        $rewrite = array(
            'slug'                  => 'projets',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __('Projets', 'portfolio'),
            'description'           => __('Mes projets.', 'portfolio'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z" clip-rule="evenodd" /><path d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" /></svg>'),
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'show_in_rest'          => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capabilities'          => $capabilities,
        );
        register_post_type('project', $args);
    }

    /**
     * Register taxonomies.
     *
     * @access public
     */
    public function register_taxonomies()
    {
        $rewrite = array(
            'slug'                       => 'tag-project',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        register_taxonomy(
            'project-tag',
            'project',
            array(
                'hierarchical'          => false,
                'public'                => true,
                'show_in_rest'          => true,
                'show_ui'               => true,
                'show_admin_column'     => true,
                'capabilities'          => array(
                    'manage_terms' => 'manage_post_tags',
                    'edit_terms'   => 'edit_post_tags',
                    'delete_terms' => 'delete_post_tags',
                    'assign_terms' => 'assign_post_tags',
                ),
                'rewrite'               => $rewrite,
            )
        );
    }

    /**
     * Add capabilities to administrator.
     *
     * @access public
     */
    public function add_caps()
    {
        $role_object = get_role('administrator');
        if (!$role_object->has_cap('edit_project')) {
            $role_object->add_cap('edit_project');
            $role_object->add_cap('read_project');
            $role_object->add_cap('delete_project');
            $role_object->add_cap('edit_projects');
            $role_object->add_cap('edit_others_projects');
            $role_object->add_cap('publish_projects');
            $role_object->add_cap('read_private_projects');
        }
    }
}
