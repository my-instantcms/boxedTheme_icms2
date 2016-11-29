<?php if ($items){ ?>
	<?php $this->addJS("templates/{$this->name}/js/jquery.newsticker.js"); ?>
    <div class="newsticker" id="nt_<?php html($widget->id); ?>">
		<i class="fa fa-bullhorn"></i>
		<ul class="newsticker-list">
			<?php foreach($items as $item) { ?>
				<?php $url = href_to($ctype['name'], $item['slug']) . '.html'; ?>
				<li class="newsticker-item">
					<a href="<?php echo $url; ?>">
						<?php html(mb_strimwidth($item['title'], 0, $teaser_len ? $teaser_len : 50, "...")); ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	</div>
<style>.newsticker{white-space:nowrap}.newsticker>i.fa{font-size:24px;width:50px;height:50px;line-height:54px;text-align:center;float:left;color:#fff;margin:0 15px 0 0;background:#272727}.newsticker>i.fa:after{content:" ";border:7px solid transparent;border-left-color:#272727;position:absolute;left:50px;top:19px}.newsticker ul{overflow:hidden;height:50px;display:block}.newsticker ul li{height:50px;line-height:50px}.newsticker ul li a{text-decoration:none}.newsticker ul li a:hover{text-decoration:underline}</style>
	<script>$(function(){$('#nt_<?php html($widget->id); ?>.newsticker').newsticker();});</script>	
<?php } ?>