<?php

/**
 * The front page template file
 *
 * @package MarionPortfolio
 */

defined('ABSPATH') || die('Cheating?');

use Timber\PostQuery;
use Timber\Timber;

// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────

$context = Timber::context();
$context['newest_projects'] = new PostQuery([
    'post_type' => 'project',
    'posts_per_page' => 3,
]);

$templates = array('front-page.twig');

Timber::render($templates, $context);
