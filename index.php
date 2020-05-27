<?
global $post;
the_post();
get_header('compiled');
?>
<div class="pageDefault">

	<div class="title-super">
		<h1><? the_title() ?></h1>
	</div>

	<div class="pageDefault-inner">
		<? the_content(); ?>
	</div>

</div>
<? get_footer('compiled'); ?>
