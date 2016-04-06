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
$args = array( 'cat'=> 3);
get_header(); ?>

	<!-- НЕМНОГО О -->
	<div class="container">
		<div class="brief-summary darkgreen-text">
		<?php $lastposts = get_posts( $args ); setup_postdata($lastposts[0]);?>
			<div class="rectangle">
				<h2>Немного о <span>Natural World</span></h2>
				<img class="tree pull-right hidden-sm hidden-xs" src="<?php the_field('tree',5);?>" alt="Дерево">
				<?php the_content(); ?>


			</div>

		</div>
	</div>
	<!-- конец НЕМНОГО О -->

	<!-- КРИОЗАМОРОЗКА -->
	<div class="background-criofreeze">
		<div class="container">
			<p class="darkblue-text">Вся наша продукция<br> производится из трав,
				прошедших<br><span>Криозаморозку</span>
			</p>
			<div class="criofreeze">
				<div>
					<img class="img-responsive" src="<?php the_field('ice',5); ?>" alt="Лёд">
				</div>
				<div>
					<img  class="img-responsive" src="<?php the_field('garantee',5); ?>" alt="Знак качества">
				</div>
			</div>
		</div>
	</div>
	<!-- конец КРИОЗАМОРОЗКА -->

<?php
get_footer();
