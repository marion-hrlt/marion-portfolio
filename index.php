<?php

/**
 * The main template file
 *
 * @package marion portfolio
 */

defined('ABSPATH') || die('Cheating?');

use Timber\Timber;
use Timber\PostQuery;

// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────

$context = Timber::context();

$templates = array('index.twig');

Timber::render($templates, $context);
