<?php
/**
 * The template for displaying all pages.
 *
 * @package MarionPortfolio
 */

defined( 'ABSPATH' ) || die( 'Cheating?' );

use Timber\Timber;
use Timber\Post;

// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────

$context  = Timber::context();
$timber_post = new Post();
$context['post'] = $timber_post;

$templates = array(
	'page-' . $timber_post->post_name . '.twig',
	'page.twig'
);

// ────────────────────────────────────────────────────────────────────────────────────────────────────────────────

Timber::render( $templates, $context );
