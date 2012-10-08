<?php get_header(); ?>
<?php 

function stripBBCode($text_to_search) {
 $pattern = '|[[\/\!]*?[^\[\]]*?]|si';
 $replace = '';
 return preg_replace($pattern, $replace, $text_to_search);
}

function strip_texts($text){
	
}

?>


<div id="center_wrapper">
<div id="center" class="clearfix">
<div id="main_content" class="fl">
	<?php $current_tag = single_tag_title("", false); 
	if ($current_tag): 
		echo '<div class="tagarchive"><h1>'.ucwords($current_tag).'</h1></div> ';
		 $tag_id = get_query_var('tag_id');
		echo tag_description( $tag_id );
		
	endif;
	?>
	
	<?php 
	if (is_search()):
		$s = filter_input(INPUT_GET, 's', FILTER_SANITIZE_STRING);
		if ($s):
		?>
		<h2 class="search_header">Paieškos frazė: <span class="search_phrase"><?php echo $s; ?></span></h2>
	<?php 
		endif;
	endif;
	?> 

	<?php if (have_posts()) : while (have_posts()) : the_post(); $loopcounter++; ?>

		<div <?php if (function_exists('post_class')) post_class(); ?>>

			<article class="entry hyphenate entry-<?php echo $postCount ;?>">
			
				<div class="entrytitle_wrap clearfix">
					<div class="entrytitle">
					<?php if ($loopcounter==1 && ! is_tag() && !is_singular()) :?>  
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Nuoroda į <?php the_title(); ?>"><?php the_title(); ?></a></h1> 
					<?php else : ?>
						<?php if (is_singular()): ?>
							<h1><?php the_title(); ?></h1>
						<?php else : ?>	
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Nuoroda į <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php endif; ?>
					<?php endif; ?>
					</div>
					
			
			
					<?php if (!is_singular()): ?>
						<div class="endate">
							<span class="in">
								<span class="big"><?php the_time('j'); ?></span> 
								<?php the_time('M'); ?>
							</span> 
							<?php the_time('Y'); ?> 
						</div>
					<?php endif; ?>	
				</div>
			
			
				<div class="entrybody clearfix" >	
					<?php if (is_singular()): ?>
                    	<div class="social-block clearfix" style="padding: 5px; padding-bottom: 3px; background: #f6f6f6; margin-top: 22px; margin-bottom: 5px; height: 23px;">
                    		<span style="display: inline-block; float: left; margin-top: 1px; font-size: 12px; padding-right: 5px; line-height: 20px; color: #666; padding-left: 4px;">Pasidalinkite:</span>
                    		<!-- Place this tag in your head or just before your close body tag -->
							<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
							  {lang: 'lt'}
							</script>
							<!-- AddThis Button BEGIN -->
							<div class="addthis_toolbox addthis_default_style" style="display: inline-block; float: left; margin-top: 2px;">
								<a class="addthis_button_facebook"></a>
								<a class="addthis_button_twitter"></a>    
								<a class="addthis_button_email"></a>
								<span class="addthis_separator"> </span>
								<!--<a class="addthis_button_facebook_like"></a>-->
								
								<!-- Place this tag where you want the +1 button to render -->
								<span style="display: inline-block; float: left; margin-top: 1px; margin-left: 2px;">
									<g:plusone size="small" style="margin-top: 3px;"></g:plusone>
								</span>
							</div>
							<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
							<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=zolininkas"></script>
							<!-- AddThis Button END -->
    
                            <div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count" data-width="50" data-show-faces="true"></div>
                    	</div>
                        <div class="big_adds" style="padding: 15px 60px; ">
                            <?php adsensem_ad('ad-2'); ?>
                        </div>		
                    <?php endif; ?>	
					<?php if (is_archive() || is_search()) : 
							$content = get_the_content();
							$img_src = get_main_image($content);
							if ($img_src):
						?>	
								<div class="list_img"><img src="<?php echo $img_src; ?>" alt="" /></div>
						<?php
						 	endif;
							the_excerpt(); _e('<p><a href="'.get_permalink().'">Skaityti visą straipsnį '); the_title(); _e('</a></p>');  ?>
					<?php else : ?>
						<?php the_content('Skaityti visą straipsnį &raquo;');   ?>
                       
						
					<?php endif; ?>
                    
				</div>
				<?php if (is_singular()): ?>
					<div class="top_controls clearfix">
						<div class="page_update fr tar">
							Straipsnis papildytas: <?php the_modified_time('F j, Y');?>
						</div>
					</div>
				<?php endif; ?>
				<div class="tags">
					<?php the_tags( '<strong>Žymos:</strong> ', ', ', ''); ?>
				</div>
				<div class="entrymeta">	
					<div class="postinfo clearfix"> 
				
						<?php if ($loopcounter==1) social_bookmarks(); ?>	
						<?php if (is_single()): ?>
						 <span class="postedby">Autorius: <?php the_author() ?></span>
						<?php endif; ?>
						
						<?php if (!is_page()): ?>
							
						<?php endif; ?>
						
						<?php if (!is_singular()): ?>
							  					
						<?php else: ?>
							
						<?php endif; ?>
				
						<?php edit_post_link('Redaguoti', '', ''); ?>
				
					</div>	
				</div>
				
			                    
				<?php if ($loopcounter == 1 && !is_singular()) { include (TEMPLATEPATH . '/ad_middle.php'); } ?>                 
				
			</article>	
			
			<?php if (is_singular()): ?>
				<div class="new-add">
					<script type="text/javascript"><!--
					google_ad_client = "ca-pub-6180259687990079";
					/* Zolininkas tekstiniai apačioje */
					google_ad_slot = "5985445343";
					google_ad_width = 728;
					google_ad_height = 90;
					//-->
					</script>
					<script type="text/javascript"
					src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script>
				</div>
				<div class="bottom_comments">
					<div class="commentsblock">
						<?php comments_template(); ?>
					</div>
				</div>
			<?php endif; ?>
					
	</div>
	
	<?php endwhile; ?>
	
	<?php if (!is_singular()): ?>         
		<div id="nav-global" class="navigation">
			<div class="nav-previous">
			<?php 
				next_posts_link('&laquo; Senesni įrašai');
				echo '&nbsp;';
				previous_posts_link('Naujesni įrašai &raquo;');
			?>
			</div>
		</div>
		
	<?php endif; ?>
		
	<?php else : ?>
		<div class="nothing_found">
			<h1>Informacijos susijusios su Jūsų pateikta paieškos fraze neturime,</h1>
			<div class="entrybody">tačiau užsukę į <a href="http://www.zolininkas.lt/zinynas/">žolininko žinyną</a> visada rasite ką nors naudingo ir įdomaus.</div>
			<p>O galbūt jus sudominų paskutinis tinklaraščio įrašas?</p>
			
			<?php 
				$posts = get_posts("numberposts=1&order=DESC&orderby=date");
				$img_src = get_main_image($posts[0]->post_content);
				$link = get_permalink($posts[0]->ID);
				$pos = strpos($posts[0]->post_content, '<!--more-->');
				 if ($pos===false){
					$pos = strlen($posts[0]->post_content);
				 }
				 $content = stripBBCode(strip_tags(substr ($posts[0]->post_content, 0, $pos)));
			?>
			
			
			
			<div class="clearfix">
				<?php if ($img_src): ?>
					<a href="<?php echo $link; ?>"><img src="<?php echo $img_src ?>" alt="" /></a>
				<?php endif; ?>
				<h2><a href="<?php echo $link; ?>"><?php echo $posts[0]->post_title?></a></h2>
				<?php echo $content; ?>... <a href="<?php echo $link; ?>">Skaityti visą straipsnį &raquo;</a>
			</div>
		</div>
	<?php endif; ?>
	
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
