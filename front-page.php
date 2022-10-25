<?php

/**
 * The main template file
 *
 * @package LightMint
 * @since LightMint 1.0
 */

defined('ABSPATH') || die('Cheating?');

use Timber\Timber;

// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────

$context = Timber::context();

$templates = array('front-page.twig');

Timber::render($templates, $context);
