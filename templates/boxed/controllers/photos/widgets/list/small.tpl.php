<?php if ($photos){ ?>
	<ul class="widget-photolist">
		<?php foreach($photos as $photo) { ?>
			<?php $url = href_to('photos', $photo['slug'] . '.html'); ?>
			<li><a href="<?php echo $url; ?>"><?php echo html_image($photo['image'], 'small', $photo['title']); ?></a></li>
		<?php } ?>
	</ul>
	<style>.widget-photolist{overflow:hidden}.widget-photolist li{float:left;margin:0 5px 5px 0!important;line-height:0!important;height:auto!important}.widget-photolist li img{border:1px solid #ccc;padding:3px}.footer_middle .widget-photolist li img{border:1px solid #424242;width:64px}.widget-photolist li:hover img{-moz-opacity:.7;-ms-opacity:.7;filter:alpha(opacity=70);-khtml-opacity:.7;-o-opacity:.7;-webkit-opacity:.7;opacity:.7}</style>
<?php } ?>