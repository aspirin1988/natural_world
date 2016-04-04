<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package natural
 */
header('Content-Type: application/json');
$curent_page=$wp_query->query_vars['page'];

	$post=get_post($curent_page,ARRAY_A);
	$post['img']=get_the_post_thumbnail_url($curent_page);

	echo json_encode($post);
