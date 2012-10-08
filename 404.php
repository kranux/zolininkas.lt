<?php get_header(); ?>
<center id="center_wrapper">
	<div id="center" class="clearfix">
		<div id="main_content" class="fl">
			<h2>Patekote į neegzistuojantį puslapį!</h2>
			<p>
			Paskutiniai straipsniai:
			</p>

			<ul>
				<?php query_posts('posts_per_page=10');	if (have_posts()) : while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>" title="Permalink for : <?php the_title(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; endif; ?>
			</ul>
		</div>
<?php get_footer(); ?>
