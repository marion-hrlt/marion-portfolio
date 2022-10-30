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
            'menu_icon'             => 'dashicons-portfolio',
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
