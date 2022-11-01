<?php

/**
 * The main template file
 *
 * @package LightMint
 * @since LightMint 1.0
 */

defined('ABSPATH') || die('Cheating?');

use Timber\PostQuery;
use Timber\Timber;

// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────

$context = Timber::context();
$context['newest_projects'] = new PostQuery([
    'post_type' => 'project',
    'posts_per_page' => 5,
]);

$templates = array('front-page.twig');

Timber::render($templates, $context);
