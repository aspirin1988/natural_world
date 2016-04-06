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
global $url;
$url = '/news/';
$page_col=20;
global $count_posts;
global $cat_id;
$cat_id=4;
$count_posts = get_category($cat_id)->category_count;
global$page_count;
$page_count= ceil($count_posts / $page_col);
$count_page=ceil($count_posts / $page_col);
global $offsett_post;
$offsett_post= $wp_query->query_vars['page']*$page_col;
$curent_page= $wp_query->query_vars['page'];
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
get_header(); ?>

	<!-- ЩИТ И КАРТИНКА -->
	<div class="container">
		<div class="product-filter">
			<div class="picture">
				<div class="shield" id="shield">
					<h2 class="text-center">Наша продукция</h2>
					<ul>
						<?php foreach($categories as $val){ ?>
						<li><a class="scroll-to" href="#<?=$val->slug?>"><?=$val->name?></a></li>
						<?php } ?>
					</ul>
				</div>
				<img class="img-responsive hidden-sm hidden-xs" src="<?php the_field('products1'); ?>" alt="Наслаждайся жизнью">
			</div>
		</div>
	</div>
	<!-- конец ЩИТ И КАРТИНКА -->
	<!-- PRODUCT UNITS -->
<br>
<?php foreach ($categories as $value) { $args1 = array( 'cat'=> $value->cat_ID ,'numberposts'=>$page_col, ); ?>
	<br>
	<div class="hr" id="<?php echo $value->slug?>" ><?php echo $value->name ?> </div>
	<div class="container product-units darkblue-text text-center">
		<div class="flexrow">
			<?php
			$lastposts = get_posts($args1);
			foreach ($lastposts as $post) {
				setup_postdata($post);
				?>

				<div class="item">
					<div class="img-containter">
						<img class="img-rounded" src="<?php the_post_thumbnail_url('medium'); ?>"
							 alt="Картинка продукта">
					</div>
					<div class="item-name">
						<h3><?php the_title(); ?></h3>
						<p><?php $tr = strip_tags(get_the_content());
							$j = 128;
							if (mb_strlen($tr) > $j) {
								$res = mb_substr($tr, 0, $j) . '...';
							} else {
								$res = $tr;
							}
							echo $res; ?></p>
						<a href="#" class="open-modal" data-id="<?php echo $post->ID; ?>"><img
								src="<?php bloginfo('template_directory') ?>/public/images/arrows.png"
								alt="Перейти"></a>
					</div>
				</div>
			<?php } ?>


		</div>
		<?php if ($count_page > 1) { ?>
			<nav>
				<ul class="pagination">
					<?php if ($curent_page > 0) { ?>
						<li><a href="/products/<?= $curent_page - 1 ?>"><</a></li>
					<?php }
					$activ = 'active' ?>

					<?php for ($i = $curent_page; $i < $curent_page + 5; $i++) {
						if ($i < $count_page) { ?>
							<li class="<?= $activ ?>"><a href="/products/<?= $i ?>"><?= $i + 1 ?></a></li>
							<?php $activ = '';
						}
					} ?>
					<?php if ($curent_page < $count_page - 1) { ?>
						<li><a href="/products/<?= $curent_page + 1 ?>">></a></li>
					<?php } ?>
				</ul>
			</nav>
		<?php } ?>
	</div>
	<?php
		}
	?>
	<!-- конец PRODUCT UNITS -->

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Название товара</h4>
				</div>
				<div class="modal-body">
					<img class="img-rounded modal-image" src="images/item_pic.jpg" alt="Картинка продукта">
					<p class="modal-content-text" >Описательное описание товара о том какой этот товар крутой, полезный, единственный и так далее. А так же куча слов о том, что с вами будет, если вы его не приобретёте. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora quis error temporibus repudiandae hic quia asperiores totam natus, quae ipsum dolor reprehenderit veritatis quos aspernatur repellendus labore reiciendis eos ullam aperiam iste repellat, impedit doloremque et aliquam. Iste ipsa, praesentium magni ducimus id eius totam, libero quis rem incidunt, temporibus.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur, dicta.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente error nobis sit ullam. Eum cumque, soluta nulla. Obcaecati, ut, quia. Deleniti voluptatum nisi minima quisquam! Quisquam officiis quasi at qui quod quam eveniet ab impedit cumque hic dicta recusandae, ut ea facere possimus obcaecati voluptatem delectus, dolores corrupti quos tempora soluta. Quaerat dolorem, ab in facilis est sapiente, culpa nobis delectus atque velit ducimus iure veniam temporibus ipsum! Eos adipisci dolorem magni vitae fuga magnam illum alias dolorum provident inventore odit, assumenda animi expedita odio exercitationem ratione officiis quod consequatur, voluptatum, ab recusandae repellendus harum. Nulla totam temporibus sapiente perferendis.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				</div>
			</div>

		</div>
	</div>
	<!-- End Modal -->
<div class="top-btn" ><a class="scroll-to" href="#shield">^</a></div>
<?php
get_footer();
