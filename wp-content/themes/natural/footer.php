<?php
$args = array(
	'type'         => 'post',
	'child_of'     => 4,
	'parent'       => '',
	'orderby'      => 'ID',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'taxonomy'     => 'category',
	'pad_counts'   => false,
	// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
);
$categories = get_categories( $args );
?>
<footer class="darkgreen-text">
	<div class="container">
		<div class="footer-partner">
			<h3>Стать партнёром</h3>
			<p>Заполните  анкету и станьте
				нашим партнером. <br>
				Зарабатывайте вместе с нами!
			</p>
			<a href="/partner/" ><div  class="btn btn-orange">Анкета</div></a>
		</div>
		<div class="footer-products">
			<h3>Наша продукция</h3>
			<ul>
				<?php foreach($categories as $val){ ?>
					<li><a class="scroll-to" href="/products/#<?=$val->slug?>"><?=$val->name?></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="footer-contacts text-right">
			<h3>Контакты</h3>
			<p>
				<?php the_field('name1',5); ?>  <a href="tel:<?php the_field('phone1',5); ?>"><?php the_field('phone1',5); ?></a> <br>
				<?php the_field('name2',5); ?>  <a href="tel:<?php the_field('phone2',5); ?>"><?php the_field('phone2',5); ?></a> <br>
				<?php the_field('name3',5); ?>  <a href="tel:<?php the_field('phone3',5); ?>"><?php the_field('phone3',5); ?></a> <br>
				e-mail: <a href="mailto:<?php the_field('email',5); ?>"><?php the_field('email',5); ?></a> <br>
			</p>
		</div>
	</div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory')?>/public/js/main.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory'); ?>/public/js/bootstrap.min.js"></script>
</body>
</html>