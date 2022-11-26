<?php

/**
 * Theme functions
 *
 * @package marion portfolio
 */

// Include vendors
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/core/App.php');

use App\App;

$timber = new \Timber\Timber();

$app = new App();
$app->run();

// Include functions
require_once get_stylesheet_directory() . '/includes/theme-functions.php';
