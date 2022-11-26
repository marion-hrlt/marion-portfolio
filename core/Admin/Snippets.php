<?php

/**
 * Admin::Snippets
 *
 * @package MarionPortfolio Theme
 */

namespace App\Admin;

/**
 * Snippets CPT
 */
class Snippets
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
            'name'                  => _x('Snippets', 'Post Type General Name', 'm_portfolio'),
            'singular_name'         => _x('Snippet', 'Post Type Singular Name', 'm_portfolio'),
            'menu_name'             => __('Snippets', 'm_portfolio'),
            'name_admin_bar'        => __('Snippet', 'm_portfolio'),
            'all_items'             => __('Tous les snippets', 'm_portfolio'),
            'add_new_item'          => __('Ajouter un nouveau snippet', 'm_portfolio'),
            'add_new'               => __('Ajouter', 'm_portfolio'),
            'new_item'              => __('Nouveau', 'm_portfolio'),
            'edit_item'             => __('Modifier le snippet', 'm_portfolio'),
            'update_item'           => __('Mettre à jour', 'm_portfolio'),
            'view_item'             => __('Voir le snippet', 'm_portfolio'),
            'view_items'            => __('Voir les snippets', 'm_portfolio'),
            'search_items'          => __('Rechercher des snippets', 'm_portfolio'),
            'not_found'             => __('Aucun snippet trouvé', 'm_portfolio'),
            'not_found_in_trash'    => __('Aucun snippet trouvé dans la corbeille', 'm_portfolio'),
        );
        $capabilities = array(
            'edit_post'             => 'edit_snippet',
            'read_post'             => 'read_snippet',
            'delete_post'           => 'delete_snippet',
            'edit_posts'            => 'edit_snippets',
            'edit_others_posts'     => 'edit_others_snippets',
            'publish_posts'         => 'publish_snippets',
            'read_private_posts'    => 'read_private_snippets',
        );
        $rewrite = array(
            'slug'                  => 'snippets',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __('Snippets', 'm_portfolio'),
            'description'           => __('Mes snippets.', 'm_portfolio'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zm4.03 6.28a.75.75 0 00-1.06-1.06L4.97 9.47a.75.75 0 000 1.06l2.25 2.25a.75.75 0 001.06-1.06L6.56 10l1.72-1.72zm4.5-1.06a.75.75 0 10-1.06 1.06L13.44 10l-1.72 1.72a.75.75 0 101.06 1.06l2.25-2.25a.75.75 0 000-1.06l-2.25-2.25z" clip-rule="evenodd" /></svg>'),
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
        register_post_type('snippet', $args);
    }

    /**
     * Register taxonomies.
     *
     * @access public
     */
    public function register_taxonomies()
    {
        $rewrite = array(
            'slug'                       => 'tag-snippet',
            'with_front'                 => true,
            'hierarchical'               => false,
        );
        register_taxonomy(
            'snippet-tag',
            'snippet',
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
        if (!$role_object->has_cap('edit_snippet')) {
            $role_object->add_cap('edit_snippet');
            $role_object->add_cap('read_snippet');
            $role_object->add_cap('delete_snippet');
            $role_object->add_cap('edit_snippets');
            $role_object->add_cap('edit_others_snippets');
            $role_object->add_cap('publish_snippets');
            $role_object->add_cap('read_private_snippets');
        }
    }

}
