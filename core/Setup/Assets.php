<?php

/**
 * Setup::Assets
 *
 * @package MarionPortfolio Theme
 */

namespace App\Setup;

use Exception;

/**
 * Enqueues
 */
class Assets
{

    /**
     * Run.
     *
     * @access public
     */
    public function run()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'), 100);
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'), 100);
    }

    /**
     * Enqueue styles.
     *
     * @access public
     */
    public function enqueue_styles()
    {
        $version     = wp_get_theme()->get('Version');
        wp_enqueue_style('marion-portfolio/styles', get_template_directory_uri() . '/assets/public/styles/app.css', false, $version);
        wp_enqueue_style('prismcss', get_template_directory_uri() . '/assets/public/styles/prism.css');

    }

    /**
     * Enqueue scripts.
     *
     * @access public
     */
    public function enqueue_scripts()
    {
        $version = wp_get_theme()->get('Version');
        wp_enqueue_script('marion-portfolio/scripts', get_template_directory_uri() . '/assets/public/scripts/app.js', [], $version, false);
        wp_enqueue_script('prismjs', get_template_directory_uri() . '/assets/public/scripts/prism.js');
    
        //Sert à passer des infos php au js (Fetch/Ajax)
		wp_localize_script('marion-portfolio/scripts', 'm_portfolio', [
			'ajax_url' => admin_url('admin-ajax.php'),
		]);
    }

}
