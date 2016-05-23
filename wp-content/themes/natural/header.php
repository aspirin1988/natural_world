<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=get_field('logo',5)?>" type="image/png">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php $current_object=get_queried_object(); $field=get_option($current_object->taxonomy.'_'.$current_object->term_taxonomy_id) ?>
	<title>Natural World | <?php
		if (is_tax()||is_category()){
			$_title=$field['meta-title'];
			if ($_title){
				echo $_title;
			} else{
				if (get_field('meta-title')){
					the_field('meta-title');
				}else{
					wp_title();}
			}
		}else{
			if (get_field('meta-title')){
				the_field('meta-title');
			}else{
				the_title();}
		}?>
	</title>
	<meta name="description" content="<?php if (is_tax()){ echo $field['meta-description'];}else{ the_field('meta-description');}?>"/>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
	<!-- Bootstrap -->
	<link href="<?php bloginfo('template_directory'); ?>/public/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo('template_directory'); ?>/public/css/styles.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<header>
	<!-- ШАПКА -->
	<div class="upperrow text-center container">
		<p class="text-uppercase darkgreen-text inline-">Продукты здоровья и крема  на травяных основах</p>
		<div class="phone-section pull-right">
			<div>
				<img class="phone-icon" src="<?php bloginfo('template_directory'); ?>/public/images/smartphone-icon.png" alt="Иконка смартфона">
			</div>
			<p  class="phonenumbers"><a href="tel:<?php the_field('phone1',5); ?>"><?php the_field('phone1',5); ?></a> <br>
				<a href="tel:<?php the_field('phone2',5); ?>"><?php the_field('phone2',5); ?></a></p>
		</div>
		<img src="<?php the_field('logo',5); ?>" alt="Лого">
		<div class="hidden-sm hidden-xs">
			<img class="anim-clouds clouds-leftgroup" src="<?php bloginfo('template_directory'); ?>/public/images/clouds-leftgroup.png" alt="Облака">
			<img class="anim-clouds cloud-central" src="<?php bloginfo('template_directory'); ?>/public/images/cloud-central.png" alt="Облако">
			<img class="anim-clouds clouds-rightgroup" src="<?php bloginfo('template_directory'); ?>/public/images/clouds-rightgroup.png" alt="Облака">
			<img class="anim-clouds shine" src="<?php bloginfo('template_directory'); ?>/public/images/shine.png" alt="Лучи солнца">
		</div>
	</div>
	<!-- ШАПКА -->

	<!-- НАВИГАЦИЯ -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav text-center">
					<?php $menu=wp_get_nav_menu_items('main'); /*print_r($menu);*/ foreach ($menu as $key=>$val) { if (!$val->menu_item_parent){ $class='';  $title=get_the_title(); if($title==$val->title){$class='active';} ?>
						<li class="<?php echo $class;?>"><a href="<?=$val->url?>"><?=$val->title?></a></li>
					<?php }}?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- конец НАВИГАЦИЯ -->
</header>