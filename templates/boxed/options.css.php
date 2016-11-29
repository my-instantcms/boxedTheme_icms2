<?php 
	$color = isset($this->options['color']) ? $this->options['color'] : '#20b2aa';
	$bg_color = isset($this->options['bg_color']) ? $this->options['bg_color'] : '#eee';
	$headbgcolor = isset($this->options['headbgcolor']) ? $this->options['headbgcolor'] : '#fff';
	$headpadding = isset($this->options['headpadding']) ? $this->options['headpadding'] : 55;

	if ( isset($this->options['bg_img']) && $this->options['bg_img'] ) {
		$bg_img = 'url("' . $config->upload_root . $this->options['bg_img']['original'] . '")';
	} else {
		$bg_img = 'none';
	}
	
	if ( isset($this->options['headbg']) && $this->options['headbg'] ) {
		$headbg = 'url("' . $config->upload_root . $this->options['headbg']['original'] . '")';
	} else {
		$headbg = 'none';
	}
	
	if ( empty($this->options['hidebgimg']) && $headbg == 'none') {
		$headbg = 'url("/templates/' . $this->name  . '/images/header-logo-bg.png")';
	}
	
	if ( isset($this->options['footerbg']) && $this->options['footerbg'] ) {
		$footerbg = 'url("' . $config->upload_root . $this->options['footerbg']['original'] . '")';
	} else {
		$footerbg = 'none';
	}

 ?>
 
 body{
	background-color: <?php html($bg_color); ?> !important;
	background-image: <?php echo $bg_img; ?> !important;
	<?php if ($bg_img != 'none' && isset($this->options['bg_repeat'])) { ?>
		<?php if($this->options['bg_repeat'] == 'cover'){ ?>
			background-size: cover !important;
		<?php } else { ?>
			background-repeat: <?php html($this->options['bg_repeat']); ?> !important;
		<?php } ?>
		<?php echo $this->options['bg_img_fix'] ? 'background-attachment:fixed !important;' : ''; ?>
		
		background-position-x: <?php html($this->options['bg_img_pos_x']); ?> !important;
		background-position-y: <?php html($this->options['bg_img_pos_y']); ?> !important;
	<?php } ?>
 }
 
.my_topbar .topbar_left,
#main_menu,
.topbar_search_button,
.topbar_search,
.my_socialicons li a:hover,
footer .footer_top,
nav#main_menu .menu ul li,
footer .widget .title::before,
#layout .widget > .title .links a,
#layout .widget_tabbed > .tabs .links a,
.widget_content_slider .items .item.active,
a.menu_mobile
{background:<?php echo $color; ?>}
.topbar_right .menu li a:hover
{color:<?php echo $color; ?>}
footer .footer_top:before{
	border-bottom-color:<?php echo $color; ?>;
}
.my_logobox{
	padding:<?php echo $headpadding; ?>px 15px;
	background-color: <?php html($headbgcolor); ?> !important;
	background-image: <?php echo $headbg; ?> !important;
	<?php if ($headbg != 'none' && isset($this->options['headbg_repeat'])) { ?>
		<?php if($this->options['headbg_repeat'] == 'cover'){ ?>
			background-size: cover !important;
		<?php } else { ?>
			background-repeat: <?php html($this->options['headbg_repeat']); ?> !important;
		<?php } ?>
		
		background-position-x: <?php html($this->options['headbg_img_pos_x']); ?> !important;
		background-position-y: <?php html($this->options['headbg_img_pos_y']); ?> !important;
	<?php } ?>
}

footer .footer_middle{
	background-image: <?php echo $footerbg; ?> !important;
	<?php if ($footerbg != 'none' && isset($this->options['footerbg_img_pos_x'])) { ?>
		background-size: cover !important;		
		background-position-x: <?php html($this->options['footerbg_img_pos_x']); ?> !important;
		background-position-y: <?php html($this->options['footerbg_img_pos_y']); ?> !important;
	<?php } ?>
}