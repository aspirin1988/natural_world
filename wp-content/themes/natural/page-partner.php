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
$args = array( 'cat'=> 5);
get_header(); ?>

	<!-- АНКЕТА -->
	<div class="container questionnaire">
		<form id="mail" action="" method="post">
			<h3 class="orange-text">Заполните анкету</h3>
			<div class="form-group">
				<label for="fullname">Ф.И.О.</label>
				<input type="text" class="form-control" id="fullname" placeholder="Ф.И.О.">
			</div>
			<div class="form-group">
				<label for="phoneNumber">Телефон</label>
				<input type="text" class="form-control" id="phoneNumber" placeholder="Телефон">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="birthDate">Дата рождения</label>
				<input type="date" class="form-control" id="birthDate" placeholder="Дата рождения">
			</div>
			<div class="form-group">
				<label for="city">Город:</label>
				<select class="form-control" id="city">
					<option value="Алматы">Алматы</option>
					<option value="Талдыкорган">Талдыкорган</option>
					<option value="Шымкент">Шымкент</option>
					<option value="Актау">Актау</option>
				</select>
			</div>
			<!--<div class="checkbox">
				<label>
					<input id="delivery" type="checkbox"> Получать уведомления
				</label>
			</div>-->
			<div id="submit" class="btn btn-orange">Отправить</div>
		</form>
		<div class="textbox">
			<h2 class="text-center text-uppercase"><?php the_field('phone1'); ?></h2>
			<p>
				<?php the_field('phone2');  ?>
			</p>
		</div>
	</div>
	<!-- конец АНКЕТА -->

	<!-- ПРИЕМУЩЕСТВА -->
	<div class="container advantages darkgreen-text">
		<?php $lastposts = get_posts( $args ); setup_postdata($lastposts[0]);?>
		<h3 class="text-uppercase"><?php the_title(); ?></h3>
		<p>
			<?php the_content(); ?>
		</p>
	</div>
	<!-- конец ПРИЕМУЩЕСТВА -->

	<!-- ПОЧУВСТВУЙ СВОБОДУ -->
	<div class="background-freedom">
		<div class="container">
			<div class="textbox text-center">
				<h2 class="text-uppercase"><?php the_field('name1'); ?></h2>
				<p><?php the_field('name2'); ?><br>
					<?php the_field('name3'); ?></p>
			</div>
		</div>
	</div>
	<!-- конец ПОЧУВСТВУЙ СВОБОДУ  -->

<?php
get_footer();