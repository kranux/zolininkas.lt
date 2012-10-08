<?php get_header(); 

$pages = array();

//Vaistiniai augalai
$parents = array(53=>'Vaistažolės', 73=>'Negalavimai', 330=>'Receptai', 743=>'Grybai');
foreach ($parents as $parent=>$label){
	$pgs = get_pages("child_of=$parent");
	foreach ($pgs as $page){
		$pages[] = array(
			'title' => $page->post_title,
			'parent' => $page->post_parent,
			'img_src' => get_main_image($page->post_content),
			'link' => get_page_link($page->ID),
		);
	}
}

function cmp_title($a, $b){
	return strcoll ($a['title'], $b['title']);
}
setlocale(LC_COLLATE, "lt_LT.utf8");
usort($pages, cmp_title);

$letters = array();
foreach($pages as $page){
	$letters[mb_substr($page['title'], 0, 1)] = true;
}

function make_name_attr($s){
	$s = mb_strtolower($s);
	return $s;
}

$last_letter = "";
?>
<div id="head-filter" class="head-filter">
	<div class="clearfix inner">
		<span class="logo-2"><br/></span>
		<div class="lefter">
			<div class="filters clearfix">
				<a href="#" class="filter show-all active" id="show-all-filter">Rodyti visus</a>
				<?php foreach ($parents as $id=>$label){ ?>
					<a href="#" class="filter filter-<?php echo $id; ?>" id="filter-<?php echo $id; ?>"><?php echo $label; ?></a>
				<?php } ?>
			</div>
		
			<div class="alfabet clearfix">
				<?php foreach ($letters as $letter=>$t){ ?>
					<a href="#<?php echo make_name_attr($letter); ?>"><?php echo strtoupper($letter); ?></a>
				<?php } ?>
			</div>
		</div>
		<div class="righter">
			<form method="get" id="searchform" action="http://zolininkas.lt/"> 
				<input type="text" placeholder="Greita paieška žinyne" id="quick-search" name="s"/>
			</form>
			<div class="clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style" >
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_twitter"></a>    
					<a class="addthis_button_email"></a>
					<span class="addthis_separator"> </span>
					<a class="addthis_button_facebook_like" style="position: relative; margin-top: -4px;"></a>
				</div>
				<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=zolininkas"></script>
				<!-- AddThis Button END -->
			</div>
		</div>
	</div>
</div>
<div id="center_wrapper" class="full-content">
<div id="center" class="clearfix">
<div id="main_content" class="fl library-container">
	<div class="" id="search-results" style="display:none;">
		<div class="in">
			<div class="in-2 clearfix">
			</div>
		</div>
	</div>
	<?php foreach ($pages as $page){ ?>
		<?php 
			$fl = mb_substr($page['title'], 0, 1);
			if ($fl != $last_letter){ ?>
			<?php if (!empty($last_letter)){ ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php $last_letter = $fl; ?>
			<a name="<?php echo make_name_attr($last_letter); ?>"></a>
			<div class="library-line">
				<span class="letter"><?php echo strtoupper($last_letter); ?></span>
				<div class="in">
					<div class="in-2 clearfix">
			<?php } ?>
			<a class="library-element parent-<?php echo $page['parent']; ?>" href="<?php echo $page['link']; ?>">
				<img src="<?php if (!empty($page['img_src'])){echo $page['img_src'];}else{echo get_bloginfo('template_directory').'/images/default-img.png';} ?>" alt=""/>
				<span class="name"><?php echo $page['title']; ?></span>
				<span class="tag"><br/></span>
			</a>
	<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>