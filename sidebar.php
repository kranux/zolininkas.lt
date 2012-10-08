<aside id="sidebar" class="clearfix sidebar fr">
	<div class="search-form">  
		<?php $search_text = "Ieškoti..."; ?> 
        <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"> 
            <input type="text" value="<?php echo $search_text; ?>" name="s" id="s" onblur="if (this.value == '')  
            {this.value = '<?php echo $search_text; ?>';}"  
            onfocus="if (this.value == '<?php echo $search_text; ?>')  
            {this.value = '';}" /> 
            <input type="hidden" id="searchsubmit" /> 
        </form>  
		<small style="margin-top: 0.3em; color: #666; display: block; text-align: right;">Įvedę paieškos žodį spauskite "Enter"</small>
    </div>
	 
	<a href="http://www.zolininkas.lt/vaistazoliu-zinynas/" onClick="recordOutboundLink(this, 'Specialios nuorodos', 'zolininkas.lt/vaistazoliu-zinynas/');return false;" class="zolininkas-book fadeInLeft"><strong>Žolininko žinynas</strong></a>
	<a href="http://www.zolininkas.lt/foto/" class="zolininkas-photo"><strong>Gražiausios foto</strong> (10.03)</a>
	   <?php if ($wp_query->post->post_name == "pradinis"):?>
        <?php else: ?>
        <!--<p style="padding: 6px; border: 3px solid #B3DE55; border-radius: 8px; margin-bottom: 12px; margin-top: 0; margin-bottom: 7px;"><span style="font-size: 22px;">Klevų sula jau teka!</span><br/> <a href="http://www.zolininkas.lt/gerimai/sula/">Daugiau apie sulą, sulainį, kaip ir kur leisti sulą</a></p-->
        <?php endif; ?>
	 
	<h4 class="title">Rudens gėrybės</h4>
    <div class="featured_items">
    	<?php 
			$query = new WP_Query(); 
			$query->query("tag=aktualus-augalas&post_type=any");
			$pages = $query->get_posts();
		 
			for ($i=0; $i<min(5, count($pages)); $i++):
			$img_src = get_main_image($pages[$i]->post_content);
			$link = $pages[$i]->post_type == "page" ? get_page_link($pages[$i]->ID) : get_permalink( $pages[$i]->ID );
			$pos = 180;//strpos($pages[$i]->post_content, '<!--more-->');
			if ($pos===false){
				$pos = strlen($pages[$i]->post_content);
			}
			$content = mb_substr(stripBBCode(strip_tags($pages[$i]->post_content)), 0, $pos);
			//var_dump($pages[$i]);
			
			$short_title = $pages[$i]->post_title;
			$pos = strrpos($short_title, '(');
			if ($pos !==false){
			$short_title = substr($short_title, 0, $pos);
			}
		 ?>
			<div class="item clearfix">
				<img src="<?php echo $img_src ?>?v0.1" alt="" class="fl" />
				<h4><a href="<?php echo $link; ?>"><?php echo $pages[$i]->post_title; ?></a></h4>
			</div>
		<?php 
		endfor;?>
        
    </div>
	
	<h4 class="title">Aktualūs receptai</h4>
	<div class="featured_items">
		<?php 
			$query = new WP_Query(); 
			$query->query("tag=aktualus-receptas&post_type=any");
			$pages = $query->get_posts();
		 
			for ($i=0; $i<min(5, count($pages)); $i++):
			$img_src = get_main_image($pages[$i]->post_content);
			$link = $pages[$i]->post_type == "page" ? get_page_link($pages[$i]->ID) : get_permalink( $pages[$i]->ID );
			$pos = 180;//strpos($pages[$i]->post_content, '<!--more-->');
			if ($pos===false){
				$pos = strlen($pages[$i]->post_content);
			}
			$content = mb_substr(stripBBCode(strip_tags($pages[$i]->post_content)), 0, $pos);
			//var_dump($pages[$i]);
			
			$short_title = $pages[$i]->post_title;
			$pos = strrpos($short_title, '(');
			if ($pos !==false){
			$short_title = substr($short_title, 0, $pos);
			}
		 ?>
			<div class="item clearfix">
				<img src="<?php echo $img_src ?>?v0.1" alt="" class="fl" />
				<h4><a href="<?php echo $link; ?>"><?php echo $pages[$i]->post_title; ?></a></h4>
			</div>
		<?php 
		endfor;
		?>
	</div>
	
	<?php 
		$show_featured_items = true;
		if (is_page()):
			global $wp_query;
			$pageID = $wp_query->post->ID;
		 	$mykey_values = get_post_custom_values("susije", $pageID);
		 	if (!empty($mykey_values)):
				$show_featured_items = false;?>
				<h4 class="title shop-title">Susijusios prekės</h4>
				<div class="featured_items shop-items">
					<?php foreach ( $mykey_values as $key => $value ) : ?>
						<?php echo $value; ?>	 
					<?php endforeach; ?>
	  			</div>
	  		<?php endif; ?>
  	 <?php endif; ?>	


  	<div class="sidebar-inner">
		<?php dynamic_sidebar('Right Sidebar') ?>
	</div>
    
	<p>
		<a href="http://www.zolininkas.lt/zolininko-biblioteka/">Apie žolininko biblioteką</a><br/><br/>
		<a href="http://www.zolininkas.lt/draugai/">Draugai</a><br/>
	</p>
	<script type="text/javascript"><!--
	google_ad_client = "ca-pub-6180259687990079";
	/* Zolininkas dešinė kvadratas */
	google_ad_slot = "3417600833";
	google_ad_width = 250;
	google_ad_height = 250;
	//-->
	</script>
	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
	
</aside>
