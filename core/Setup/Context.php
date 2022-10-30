<?php

/**
 * Setup::Context
 *
 * @package MarionPortfolio Theme
 */

namespace App\Setup;

use Timber\Timber;
use Timber\Menu;

/**
 * Context
 */
class Context
{

    /**
     * Init / Run
     */
    public function run()
    {
        add_filter('timber_context', [$this, 'add_nav_menus']);
        add_filter('timber_context', [$this, 'add_link_directory']);
    }

    /**
     * Add nav menu
     *
     * @param array $context Timber context.
     * @return array
     */
    public function add_nav_menus($context)
    {
        if (has_nav_menu('primary')) {
            $context['menus']['main'] = new Menu('primary');
        }

        return $context;
    }

    public function add_link_directory($context)
    {
        $context['directory'] = get_stylesheet_directory_uri();
        return $context;
    }
}
