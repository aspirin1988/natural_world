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
		<form id="mail" >
			<h3 class="orange-text">Заполните анкету</h3>
			<div class="form-group">
				<label for="Ф.И.О.">Ф.И.О.</label>
				<input type="text" class="form-control" id="Ф.И.О." placeholder="Ф.И.О.">
			</div>
			<div class="form-group">
				<label for="Телефон">Телефон</label>
				<input type="text" class="form-control" id="Телефон" placeholder="Телефон">
			</div>
			<div class="form-group">
				<label for="Email">Email</label>
				<input type="email" class="form-control" id="Email" placeholder="Email">
			</div>
			<div class="form-group">
				<label for="Дата рождения">Дата рождения</label>
				<input type="date" class="form-control" id="Дата рождения" placeholder="Дата рождения">
			</div>
			<div class="form-group">
				<label for="Город">Город:</label>
				<select class="form-control" id="Город">
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
			<input type="text" class="hide" name="title" id="title" value="Анкета" >
			<input type="submit" value="Отправить" class="btn btn-orange">
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
