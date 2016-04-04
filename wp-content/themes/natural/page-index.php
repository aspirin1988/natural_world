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

get_header(); ?>

	<!-- НЕМНОГО О -->
	<div class="container">
		<div class="brief-summary darkgreen-text">
			<div class="rectangle">
				<h2>Немного о <span>Natural World</span></h2>
				<img class="tree hidden-sm hidden-xs pull-right" src="<?php the_field('tree'); ?>" alt="Дерево">
				<p>Гонконгская корпорация Шен Лунг  стратегически развивается на мировом рынке, внедряя культуру традиционной китайской медицины и оздоровления нации. Дочерние филиалы корпорации в Китае представлены Обществом с Ограниченной Ответственностью по производству оздоровительной продукции Шен Лунг в округе Юньчэн провинции Шаньдун, Международной Торговой Компании Шен Лунг в провинции Тяньцзинь, Фармацевтической компанией ООО "Бэйкер", торговой компанией "Шен Лунг Здоровье" в городе Тяньцзинь, Обществом с ограниченной ответственностью "Сунмаотан" (г. Тяньцзинь). На сегодняшний день корпорация Шен Лунг (HAPPINESS) проявила себя в сферах биотехнологий, управления здравоохранения, образования и профессиональной подготовки кадров, электронной коммерции, финансовых вложений, а также в сфере промышленности, торговых и финансовых инвестиций в транснациональные корпорации. </p>
			</div>

			<button class="btn btn-orange" type="button" name="button">Читать далее</button>
		</div>
	</div>
	<!-- конец НЕМНОГО О -->

	<!-- ПРОДУКТЫ -->
	<div class="background-products">
		<div class="container">
			<div class="products">
				<h2>Продукция</h2>
				<img class="img-responsive" src="<?php the_field('products1'); ?>" alt="Продукты">
				<div class="product-names darkblue-text">
					<p>Новинки компании</p>
					<p>Косметика</p>
					<p>Оздоровление и питание</p>
				</div>
			</div>
		</div>
	</div>
	<!-- конец ПРОДУКТЫ -->

	<!-- КРИОЗАМОРОЗКА -->
	<div class="background-criofreeze">
		<div class="container">
			<p class="darkblue-text">Вся наша продукция<br> прозводится из трав,
				прошедших<br><span>Криозаморозку</span>
			</p>
			<div class="criofreeze">
				<div>
					<img class="img-responsive" src="<?php the_field('ice'); ?>" alt="Лёд">
				</div>
				<div>
					<img  class="img-responsive" src="<?php the_field('garantee'); ?>" alt="Знак качества">
				</div>
			</div>
		</div>
	</div>
	<!-- конец КРИОЗАМОРОЗКА -->

<?php
get_footer();
