<?php 
	$core = cmsCore::getInstance();
	if (!empty($this->options['logo'])) {
		$logo = $config->upload_root . $this->options['logo']['original'];
	} else {
		$logo = '/templates/default/images/logo.png';
	}
	$left_sidebar = (isset($this->options['aside_pos']) && $this->options['aside_pos'] == 'left') ? 'is_sidebar_left' : false;
?>
<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video# ya: http://webmaster.yandex.ru/vocabularies/ article: http://ogp.me/ns/article#  profile: http://ogp.me/ns/profile#">
<head>
    <title><?php $this->title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if(isset($this->options['favicon']['original']) && $this->options['favicon']['original']){ ?>
		<?php $favicon = $config->upload_root . $this->options['favicon']['original']; ?>
		<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon">
	<?php } ?>
    <?php
		$this->addMainCSS("templates/{$this->name}/css/bootstrap.min.css");
		$this->addMainCSS("templates/{$this->name}/css/font-awesome/css/font-awesome.min.css");
		$this->addMainCSS("templates/default/css/theme-text.css");
		$this->addMainCSS("templates/default/css/theme-layout.css");
		$this->addMainCSS("templates/default/css/theme-gui.css");
		$this->addMainCSS("templates/default/css/theme-widgets.css");
		$this->addMainCSS("templates/default/css/theme-content.css");
		$this->addMainCSS("templates/default/css/theme-modal.css");
		$this->addMainCSS("templates/{$this->name}/css/responsive.css");
		$this->addMainJS("templates/default/js/jquery.js");
		$this->addMainJS("templates/default/js/jquery-modal.js");
		$this->addMainJS("templates/default/js/core.js");
		$this->addMainJS("templates/default/js/modal.js");
		if (cmsUser::isLogged()){
			$this->addMainJS("templates/default/js/messages.js");
		}
	?>
    <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <?php $this->head(); ?>
	<link rel="stylesheet" type="text/css" href="/templates/<?php html($this->name); ?>/css/styles.css">
	<link rel="stylesheet" type="text/css" href="/templates/<?php html($this->name); ?>/css/my.css">
	<link rel="canonical" href="<?php echo $config->host . $core->uri_absolute; ?>" itemprop="url" />
    <style><?php include('options.css.php'); ?></style>
    <?php if(!empty($this->options['fix_menu'])){ ?>
	<?php $usr_fix = (!empty($this->options['fix_usermenu'])) ? ',header .widget_user_avatar' : ''; ?>
	<script>$(function(){var n=$("nav#main_menu").length?$("nav#main_menu").offset():!1;n&&$(window).scroll(function(){$(window).scrollTop()>n.top&&$("nav#main_menu<?php html($usr_fix); ?>").addClass("menu_fix"),$(window).scrollTop()<n.top&&$("nav#main_menu<?php html($usr_fix); ?>").removeClass("menu_fix")})});</script><?php } ?>
</head>
<body id="<?php echo $device_type; ?>_device_type" class="<?php html($left_sidebar); ?>">

    <div id="layout">

        <?php if (!$config->is_site_on){ ?>
            <div id="site_off_notice"><?php printf(ERR_SITE_OFFLINE_FULL, href_to('admin', 'settings', 'siteon')); ?></div>
        <?php } ?>
		
		<header>
			<div class="my_topbar">
				<?php if($this->hasWidgetsOn('topbar_left')) { ?>
					<div class="topbar_left">
						<?php $this->widgets('topbar_left', false, 'wrapper_plain'); ?>
					</div>
				<?php } ?>
				<div class="topbar_right<?php if(!$this->hasWidgetsOn('topbar_left')) { ?> not_left_bar<?php } ?>">
					<?php $this->widgets('topbar_right', false, 'wrapper_plain'); ?>
				</div>
				
			</div>
			<div class="my_logobox">
				<div class="row">
					<div class="col-sm-4 my_logo">
						<a href="<?php echo href_to_home(); ?>">
							<img src="<?php html($logo); ?>" alt="<?php html($config->sitename); ?>">
						</a>
						<?php if(!$core->uri) { ?>
							<h1 style="display:none"><?php $this->title(); ?></h1>
						<?php } ?>
					</div>
					<div class="col-sm-8">
						<?php if($this->hasWidgetsOn('topbar_banner')) { ?>
							<figure class="topbar_banner">
								<?php $this->widgets('topbar_banner'); ?>
							</figure>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php if($this->hasWidgetsOn('main_menu')) { ?>
				<nav id="main_menu">
					<?php $this->widgets('main_menu', false, 'wrapper_plain'); ?>
				</nav>
				<?php $this->widgets('main_menu', false, 'menu_mobile'); ?>
			<?php } ?>
		</header>
		
		<?php if ($config->show_breadcrumbs && $this->isBreadcrumbs()){ ?>
			<div id="breadcrumbs">
				<?php $this->breadcrumbs(array('strip_last'=>false)); ?>
			</div>
		<?php } ?>

		<?php
			$is_sidebar = $this->hasWidgetsOn('right-top', 'right-center', 'right-bottom');
			$is_footer = $this->hasWidgetsOn('footer1', 'footer2', 'footer3');
			$section_class = $is_sidebar ? 'col-sm-8' : 'col-sm-12';
		?>
		
		<?php if($this->hasWidgetsOn('top')) { ?>
			<div id="top_position">
				<?php $this->widgets('top'); ?>
			</div>
		<?php } ?>
		
		<main>
			<div class="row" style="background:#f9f9f9">
			
				<?php if ($is_sidebar && $left_sidebar) { ?>
					<aside class="col-sm-4">
						<div id="widget_pos_right-top"><?php $this->widgets('right-top'); ?></div>
						<div id="widget_pos_right-center"><?php $this->widgets('right-center'); ?></div>
						<div id="widget_pos_right-bottom"><?php $this->widgets('right-bottom'); ?></div>
					</aside>
				<?php } ?>
			
				<section class="<?php html($section_class); ?>" id="main_content">
				
					<?php
						$messages = cmsUser::getSessionMessages();
						if ($messages){
							?>
							<div class="sess_messages">
								<?php
									foreach($messages as $message){
										echo $message;
									}
								?>
							</div>
							<?php
						}
					?>
					<?php if($this->hasWidgetsOn('left-top')) { ?>
						<div id="widget_pos_left-top"><?php $this->widgets('left-top'); ?></div>
					<?php } ?>
				
					<?php if ($this->isBody()){ ?>
						<article>
							<div id="controller_wrap"><?php $this->body(); ?></div>
						</article>
					<?php } ?>
					<?php if($this->hasWidgetsOn('left-bottom')) { ?>
						<div id="widget_pos_left-bottom"><?php $this->widgets('left-bottom'); ?></div>
					<?php } ?>

				</section>
				
				<?php if($is_sidebar && !$left_sidebar){ ?>
					<aside class="col-sm-4">
						<div id="widget_pos_right-top"><?php $this->widgets('right-top'); ?></div>
						<div id="widget_pos_right-center"><?php $this->widgets('right-center'); ?></div>
						<div id="widget_pos_right-bottom"><?php $this->widgets('right-bottom'); ?></div>
					</aside>
				<?php } ?>
				
			</div>
		</main>
		
		<?php if($this->hasWidgetsOn('bottom')) { ?>
			<div id="top_position">
				<?php $this->widgets('bottom'); ?>
			</div>
		<?php } ?>

        <?php if ($config->debug && cmsUser::isAdmin()){ ?>
            <div id="sql_debug" style="display:none">
                <div id="sql_queries">
                    <div id="sql_stat"><?php echo $core->db->getStat(); ?></div>
                    <?php foreach($core->db->query_list as $sql) { ?>
                        <div class="query">
                            <div class="src"><?php echo $sql['src']; ?></div>
                            <?php echo nl2br(htmlspecialchars($sql['sql'])); ?>
                            <div class="query_time"><?php echo LANG_DEBUG_QUERY_TIME; ?> <span class="<?php echo (($sql['time']>=0.1) ? 'red_query' : 'green_query'); ?>"><?php echo number_format($sql['time'], 5); ?></span> <?php echo LANG_SECOND10 ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
		
		<footer>
			<div class="row footer_top">
				<?php if(isset($this->options['hide_text']) && $this->options['hide_text']){ ?>
					<span><?php html($this->options['hide_text']); ?></span>
				<?php } ?>
			</div>
			<?php if($is_footer){ ?>
				<div class="row footer_middle">
					<div class="my_columns">
						<?php if($this->hasWidgetsOn('footer1')) { ?>
							<div class="col-sm-4">
								<?php $this->widgets('footer1'); ?>
							</div>
						<?php } ?>
						<?php if($this->hasWidgetsOn('footer2')) { ?>
							<div class="col-sm-4">
								<?php $this->widgets('footer2'); ?>
							</div>
						<?php } ?>
						<?php if($this->hasWidgetsOn('footer3')) { ?>
							<div class="col-sm-4">
								<?php $this->widgets('footer3'); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<?php if(isset($this->options['counters']) && $this->options['counters']){ ?>
				<div class="footer_text">
					<div class="row">
						<p><?php echo $this->options['counters']; ?></p>
					</div>
				</div>
			<?php } ?>
			<div class="my_copyrights">				
				<p class="pull-left">
					&copy; <?php echo $this->options['owner_year'] ? $this->options['owner_year'] : date('Y'); ?> 
					<?php if(isset($this->options['owner_name']) && $this->options['owner_name']){ ?>
						<a href="<?php echo $this->options['owner_url'] ? $this->options['owner_url'] : href_to_home(); ?>">
							<?php html($this->options['owner_name']); ?>
						</a>
					<?php } else { ?>
						<?php echo LANG_POWERED_BY_INSTANTCMS; ?>
					<?php } ?>
					<?php if ($config->debug && cmsUser::isAdmin()){ ?>
						&nbsp;
						<span class="item">
                            SQL: <a href="#sql_debug" title="SQL dump" class="ajax-modal">
								<?php echo $core->db->query_count; ?>
							</a>
                        </span>
                        <?php if ($config->cache_enabled){ ?>
                            <span class="item">
                                Cache: <a href="<?php echo href_to('admin', 'cache_delete', $config->cache_method);?>" title="Clear cache"><?php echo cmsCache::getInstance()->query_count; ?></a>
                            </span>
                        <?php } ?>
                        <span class="item">
                            Mem: <?php echo round(memory_get_usage()/1024/1024, 2); ?> Mb
                        </span>
                        <span class="item">
                            Time: <?php echo number_format(cmsCore::getTime(), 4); ?> s
                        </span>
                    <?php } ?>
				</p>
				<?php $this->widgets('footer', false, 'wrapper_plain'); ?>
			</div>
		</footer>

    </div>
	<script src="/templates/<?php html($this->name); ?>/js/flexmenu.min.js"></script>
	<script src="/templates/<?php html($this->name); ?>/js/my.js"></script>
</body>
</html>
