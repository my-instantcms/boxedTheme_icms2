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
		$this->addMainCSS("templates/{$this->name}/css/boxedFont/style.css");
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
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.min.js"></script>
    <![endif]-->
    <?php $this->head(); ?>
	<meta name="csrf-token" content="<?php echo cmsForm::getCSRFToken(); ?>" />
	<link rel="stylesheet" type="text/css" href="/templates/<?php html($this->name); ?>/css/styles.css">
	<link rel="stylesheet" type="text/css" href="/templates/<?php html($this->name); ?>/css/my.css">
	<link rel="canonical" href="<?php echo $config->host . $core->uri_absolute; ?>" itemprop="url" />
    <style><?php include('options.css.php'); ?></style>
    <?php if(!empty($this->options['fix_menu'])){ ?>
		<?php $usr_fix = (!empty($this->options['fix_usermenu'])) ? ',header .widget_user_avatar' : false; ?>
		<script>$(function(){var n=$("nav#main_menu").length?$("nav#main_menu").offset():!1;n&&$(window).scroll(function(){$(window).scrollTop()>n.top&&$("nav#main_menu<?php html($usr_fix); ?>").addClass("menu_fix"),$(window).scrollTop()<n.top&&$("nav#main_menu<?php html($usr_fix); ?>").removeClass("menu_fix")})});</script>
		<?php if(isset($this->options['margin_top']) && $this->options['margin_top'] > 0){ ?>
			<style>header .widget_user_avatar.menu_fix{margin-top:-<?php html($this->options['margin_top']); ?>px}</style>
		<?php } ?>
		<style>.redactor-toolbar.toolbar-fixed-box{margin-top: 50px !important}</style>
	<?php } ?>
</head>
<body id="<?php echo $device_type; ?>_device_type" class="<?php html($left_sidebar); ?>">

    <div id="layout">

        <?php if (!$config->is_site_on){ ?>
            <div id="site_off_notice">
                <?php if (cmsUser::isAdmin()){ ?>
                    <?php printf(ERR_SITE_OFFLINE_FULL, href_to('admin', 'settings', 'siteon')); ?>
                <?php } else { ?>
                    <?php echo ERR_SITE_OFFLINE; ?>
                <?php } ?>
            </div>
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
			<?php if($this->hasWidgetsOn('topbar_banner') || !empty($this->options['logo'])) { ?>
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
						<?php if($this->hasWidgetsOn('topbar_banner')) { ?>
							<div class="col-sm-8">						
								<figure class="topbar_banner">
									<?php $this->widgets('topbar_banner'); ?>
								</figure>						
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
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
			$is_columns = $this->hasWidgetsOn('column1', 'column2', 'column3');
			$is_sidebar = $this->hasWidgetsOn('right-top', 'right-center', 'right-bottom');
			$is_footer = $this->hasWidgetsOn('footer1', 'footer2', 'footer3');
			$section_class = $is_sidebar ? 'col-sm-8' : 'col-sm-12 is_not_sidebar';
		?>
		
		<?php if($this->hasWidgetsOn('top')) { ?>
			<div id="top_position">
				<?php $this->widgets('top'); ?>
			</div>
		<?php } ?>
		
		<?php if($is_columns) { ?>
			<?php 
				$col_1 = $this->hasWidgetsOn('column3') ? 'col-md-3 col-sm-3' : 'col-md-6 col-sm-6';
				$col_2 = $this->hasWidgetsOn('column1', 'column3') ? 'col-md-6 col-sm-6' : 'col-md-12 col-sm-12';
				$col_3 = $this->hasWidgetsOn('column1') ? 'col-md-3 col-sm-3' : 'col-md-6 col-sm-6';
			?>
			<div class="is_three_columns">
				<?php if($this->hasWidgetsOn('column1')) { ?>
					<div class="<?php html($col_1); ?>"><?php $this->widgets('column1'); ?></div>
				<?php } ?>
				<?php if($this->hasWidgetsOn('column2')) { ?>
					<div class="<?php html($col_2); ?>"><?php $this->widgets('column2'); ?></div>
				<?php } ?>
				<?php if($this->hasWidgetsOn('column3')) { ?>
					<div class="<?php html($col_3); ?>"><?php $this->widgets('column3'); ?></div>
				<?php } ?>
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
					if ($messages){ ?>
						<div class="sess_messages">
							<?php foreach($messages as $message){ ?>
								<div class="<?php echo $message['class']; ?>"><?php echo $message['text']; ?></div>
							 <?php } ?>
						</div>
					<?php } ?>
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
            <div id="debug_block">
                <?php $this->renderAsset('ui/debug', array('core' => $core)); ?>
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
					&copy; <?php echo !empty($this->options['owner_year']) ? $this->options['owner_year'] : date('Y'); ?> 
					<?php if(isset($this->options['owner_name']) && $this->options['owner_name']){ ?>
						<a href="<?php echo $this->options['owner_url'] ? $this->options['owner_url'] : href_to_home(); ?>">
							<?php html($this->options['owner_name']); ?>
						</a>
					<?php } else { ?>
						<?php echo LANG_POWERED_BY_INSTANTCMS; ?>
					<?php } ?>
					<?php if ($config->debug && cmsUser::isAdmin()){ ?>
                        <span class="item">
                            <a href="#debug_block" title="<?php echo LANG_DEBUG; ?>" class="ajax-modal"><?php echo LANG_DEBUG; ?></a>
                        </span>
                        <span class="item">
                            Time: <?php echo cmsDebugging::getTime('cms', 4); ?> s
                        </span>
                        <span class="item">
                            Mem: <?php echo round(memory_get_usage(true)/1024/1024, 2); ?> Mb
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
