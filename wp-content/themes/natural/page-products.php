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
$page=6;
global $count_posts;
global $cat_id;
$cat_id=4;
$count_posts = get_category($cat_id)->category_count;
global$page_count;
$page_count= ceil($count_posts / $page);
global $offsett_post;
$offsett_post= $wp_query->query_vars['page']*$page;
$args = array( 'cat'=> $cat_id ,'numberposts'=>$page ,'offset'=>$offsett_post );
get_header(); ?>

	<!-- ЩИТ И КАРТИНКА -->
	<div class="container">
		<div class="product-filter">
			<div class="picture">
				<div class="shield">
					<h2 class="text-center">Наша продукция</h2>
					<ul>
						<li>Косметика</li>
						<li>Оздоровление и питание</li>
						<li>Продукты ежедневного использования</li>
						<li>Новинки компании</li>
					</ul>
				</div>
				<img class="img-responsive hidden-sm hidden-xs" src="<?php the_field('products1'); ?>" alt="Наслаждайся жизнью">
			</div>
		</div>
	</div>
	<!-- конец ЩИТ И КАРТИНКА -->

	<!-- PRODUCT UNITS -->
	<div class="container product-units darkblue-text text-center">
		<div class="flexrow">
			<?php $lastposts = get_posts( $args );
			foreach ($lastposts as $post)  {setup_postdata($post);
				?>
			<div class="item">
				<div class="img-containter">
					<img class="img-rounded" src="<?php the_post_thumbnail_url('medium'); ?>" alt="Картинка продукта">
				</div>
				<div class="item-name">
					<h3><?php the_title(); ?></h3>
					<p><?php  $tr=strip_tags(get_the_content());
                                $j=128;
                                if (mb_strlen($tr)>$j) {
									$res=mb_substr($tr,0,$j).'...';
								}
								else{
									$res=$tr;
								}
                                echo $res;?></p>
					<a href="#" class="open-modal" data-id="<?php echo $post->ID;  ?>" ><img src="<?php bloginfo('template_directory') ?>/public/images/arrows.png" alt="Перейти"></a>
				</div>
			</div>
				<?php }?>


		</div>
	</div>
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

<?php
get_footer();
