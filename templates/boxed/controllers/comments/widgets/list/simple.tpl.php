<ul class="boxed_comments_list">
	<?php foreach($items as $item) { ?>

		<?php $author_url = href_to('users', $item['user']['id']); ?>
		<?php $target_url = href_to($item['target_url']) . "#comment_{$item['id']}"; ?>

		<li class="bcl_item">
		
			<div class="bcl_text">
				<?php echo html_clean($item['content_html'], 50); ?>
			</div>
			
			<div class="bcl_clr"></div>
			
			<div> 
				<a href="<?php echo $author_url; ?>" <?php if (!empty($item['user']['is_online'])){ ?>class="bcl_user_avatar peer_online" title="<?php echo LANG_ONLINE; ?>"<?php } else { ?> class="bcl_user_avatar peer_no_online"<?php } ?>> 
					<?php echo html_avatar_image($item['user']['avatar'], 'micro', $item['user']['nickname']); ?>
				</a>  
				<a href="<?php echo $target_url; ?>" class="bcl_target">
					<?php echo html_strip($item['target_title'], 50); ?>
				</a>
			</div>

		</li>

	<?php } ?>
</ul>