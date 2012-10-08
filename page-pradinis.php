<?php 

function stripBBCode($text_to_search) {
 $pattern = '|[[\/\!]*?[^\[\]]*?]|si';
 $replace = '';
 return preg_replace($pattern, $replace, $text_to_search);
}

function strip_texts($text){
	
}

get_header(); 

?><div id="center_wrapper">
	<div id="center" class="clearfix">
		<div id="main_content" class="fl">
			<div class="clearfix two_columns">
				<div class="column fl">
					<h2 style="margin-bottom: 8px;"><strong>Naujausi įrašai</strong> <a href="http://www.zolininkas.lt/feed" title="Prenumeruoti visus tinklaraščio įrašus"><img src="<?php bloginfo('url'); ?>/wp-content/themes/zolininkas-3/images/rss.gif" alt="RSS" width="16" height="16" style="border: none; vertical-align: middle;"/></a></h2>
					<?php 
						$posts = get_posts("numberposts=8&order=DESC&orderby=date");
						foreach($posts as $post):
							$img_src = get_main_image($post->post_content);
							$link = get_permalink($post->ID);
							$post_date = substr($post->post_date, 0, 10);
							$pos = 180;//strpos($posts[0]->post_content, '<!--more-->');
							 if ($pos===false){
								$pos = strlen($post->post_content);
							 }
							 $content = mb_substr(stripBBCode(strip_tags($post->post_content)), 0, $pos);
							?>
							
							<h2><a href="<?php echo $link; ?>"><?php echo $post->post_title?></a> <span>(<?php echo $post_date; ?>)</span></h2>
							<p class="clearfix hyphenate">
								<?php if ($img_src): ?>
									<a href="<?php echo $link; ?>"><img src="<?php echo $img_src ?>?v0.1" alt=""/></a>
								<?php endif; ?>
								<?php echo $content; ?><a href="<?php echo $link; ?>">...</a>
							</p>
						<?php endforeach; ?>
					<p>
						<a href="http://www.zolininkas.lt/tinklarastis/">Senesni įrašai</a>
					</p>
				</div>
				<div class="column fr">
					<!--<div class="clearfix highlight-article" style="padding: 6px; border: 3px solid #B3DE55; border-radius: 8px; margin-bottom: 12px;">
						<img src="http://www.zolininkas.lt/wp-content/uploads/sula.png" alt="Sula" width="90" height="90" class="fl"/>
						<div class="details" style="width: 223px; float: right;">
							<h1 style="padding: 0; margin: 0; font-weight: normal; color: #403e3e; font-size: 24px;">Klevų sula jau teka!</h1>
							<p style="color: #403e3e; font-size: 14px; margin-top: 6px; margin-bottom: 0;">
								Atnaujinta: 2012 kovo 11 d.<br/>
								<a href="http://www.zolininkas.lt/gerimai/sula/">Daugiau apie sulą, sulainį, kaip ir kur leisti sulą</a>
							</p>
						</div>
					</div-->

					<div class="index-latest-photo">
						<?php if (function_exists('kran_latest_post_image')) 
							kran_latest_post_image('nuotraukos', AK_IMAGES_THUMB_INDEX); ?>
					</div>

					<h2 style="margin-bottom: 8px;"><strong>Vaistiniai augalai</strong></h2>
					<?php 
						 $pages = get_pages("child_of=53&sort_column=post_date&sort_order=DESC");
						 for ($i=0; $i<8; $i++):
						 	$img_src = get_main_image($pages[$i]->post_content);
						 	$link = get_page_link($pages[$i]->ID); 
						 	$pos = 180;//strpos($pages[$i]->post_content, '<!--more-->');
						 	if ($pos===false){
								$pos = strlen($pages[$i]->post_content);
						 	}
						 	$content = mb_substr(stripBBCode(strip_tags($pages[$i]->post_content)), 0, $pos);
						 	
						 	 $short_title = $pages[$i]->post_title;
						 	 $pos = strrpos($short_title, '(');
							 if ($pos !==false){
							 	$short_title = substr($short_title, 0, $pos);
							 }
						 	
							?>
							<h2><a href="<?php echo $link; ?>" title="<?php echo $pages[$i]->post_title?>"><?php echo $short_title; ?></a></h2>
							<p class="clearfix hyphenate"> 
								<?php if ($img_src): ?>
									<a href="<?php echo $link; ?>"><img src="<?php echo $img_src ?>?v0.1" alt="" /></a>
								<?php endif; ?>
								<?php echo $content; ?><a href="<?php echo $link; ?>" title="<?php echo $pages[$i]->post_title; ?>">...</a>
							</p>
						<?php 
							endfor;
						?>
						<p>
							<a href="http://www.zolininkas.lt/zinynas/">Apie kitus augalus skaitykite žinyne</a>
						</p>
				</div>
			</div>			
			<!--<div class="clearfix two_columns events-block">
				<h2>"ŽALI" renginiai</h2>
				<table cellspacing="0" cellpadding="0" class="events-table">   
				   <tr>
					  <th>Renginys</th>
					  <th>Vieta</th>
					  <th class="date">Data/laikas</th>
				   </tr>
				    <tr>
					  <td class="event">Kūčių valgių gaminimas ir degustacija su žolinčiais.</td>
					  <td><strong>Vilnius</strong>, Litexpo parodų rūmai.</td>
					  <td class="date">
					  	 <span class="day">Gruo. 3-5 d.</span>
					  </td>
				   </tr>
				</table>
				<p class="tar"> 
				 <a href="http://www.zolininkas.lt/pateik-pasiulyma/">Pranešti apie renginį &raquo;</a>
				</p>
			</div>	-->
			<div class="clearfix two_columns mashrooms-plants">
				<div class="column fl">
					<div class="clearfix column-in">
						<a href="http://www.zolininkas.lt/vaistiniai-augalai/melyne-paprastoji-lot-vaccinium-myrtillus-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/melyne.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/vaistiniai-augalai/brukne-paprastoji-lot-vaccinium-vitis-idaea-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/brukne.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/vaistiniai-augalai/zemuoge-paprastoji-lot-fragaria-vesca-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/zemuoge.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/vaistiniai-augalai/varnauoge-juodoji-lot-empetrum-nigrum/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/varnauoge.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/zyma/uoga/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/uogos.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/vaistiniai-augalai/spanguole-paprastoji-lot-vaccinium-oxycoccos-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/spanguole.png?v0.1" width="110" height="110" /></a>
					</div>
				</div>
				<div class="column fr">
					<div class="clearfix column-in">
						<a href="http://www.zolininkas.lt/grybai/musmire-paprastoji-lot-amanita-muscaria-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/musmire.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/grybai/meslagrybis-gauruotasis-lot-coprinus-comatus-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/meslagrybis.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/zyma/grybas/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/grybai.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/grybai/skylenis-izulnusis-lot-inonotus-obliquus-l/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/skylenis.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/zyma/grybas/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/baravykas.png?v0.1" width="110" height="110" /></a>
						<a href="http://www.zolininkas.lt/grybai/baltekle-pavasarine-lot-calocybe-gambosa/" title=""><img src="http://www.zolininkas.lt/wp-content/uploads/avizele.png?v0.1" width="110" height="110" /></a>
					</div>
				</div>
			</div>
			<div class="site-friends">
				<h5>Draugai</h5>
				<div class="clearfix">
					<div class="element fl">
						<a href="http://www.marmozel.lt" title="Marmozel - gyvoji kosmetika"><img src="http://www.zolininkas.lt/wp-content/uploads/friends/marmozel.jpeg?v0.1" alt="Marmozel" width="125" height="125" /></a>
					</div>
					<div class="element fl">
						<a href="http://www.zolinciuakademija.lt" title="Žaliasis sveikatos klubas"><img src="http://www.zolininkas.lt/wp-content/uploads/friends/zolinciai.jpeg?v0.1" alt="Žolinčių akademija" width="125" height="125" /></a>
					</div>
					<div class="element fl">
						<a href="http://www.sodospalvos.lt"><img src="http://www.zolininkas.lt/wp-content/uploads/friends/sodo-spalvos.png" alt="Sodo spalvos" width="125" height="125" /></a>
					</div>
					<div class="element fl">
						<a href="http://meistriukas.ucoz.com" target="_blank"><img alt="Meistriuko dirbtuvėlė"src="http://meistriukas.ucoz.com/Baneriai/Apsikeitimui/Baneris_125x125.jpg" /></a>
					</div>
				</div>
			</div>
			
			
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>