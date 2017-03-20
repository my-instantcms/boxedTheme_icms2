<?php if ($items){ ?>

	<?php $this->addCSS('templates/' . $this->name . '/css/content/wcl_top_grid.css'); ?>

    <div class="wcl_top_grid">
        <?php foreach($items as $item) { ?>

            <?php
                $url        = href_to($ctype['name'], $item['slug']) . '.html';
                $is_first   = !isset($is_first);
                $size       = $is_first ? 'big' : 'normal';
                $is_private = $item['is_private'] && $hide_except_title && !$item['user']['is_friend'];
                $image      = (($image_field && !empty($item[$image_field])) ? $item[$image_field] : '');
                if ($is_private) {
                    if($image_field && !empty($item[$image_field])){
                        $image = default_images('private', $size);
                    }
                    $url = '';
                }
            ?>

            <div class="wtg_item <?php if ($is_first) { ?>wtg_first<?php } ?>">
                <?php if ($image) { ?>
                    <?php if ($is_first) { ?>
                        <div class="wtg_image">
                            <?php if ($url) { ?>
                                <a href="<?php echo $url; ?>" class="wtg_image_a" rel="bookmark">
									<?php echo html_image($image, $size, $item['title']); ?>
								</a>
                            <?php } else { ?>
                                <div class="wtg_image_a">
									<?php echo html_image($image, $size, $item['title']); ?>
								</div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="wtg_image">
                            <?php if ($url) { ?>
                                <a href="<?php echo $url; ?>" class="wtg_image_a" rel="bookmark">
									<?php echo html_image($image, $size, $item['title']); ?>
								</a>
                            <?php } else { ?>
                                <div class="wtg_image_a">
									<?php echo html_image($image, $size, $item['title']); ?>
								</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } else { ?>
					<?php if ($is_first) { ?>
						<div class="wtg_image">
							<?php if ($url) { ?>
								<a href="<?php echo $url; ?>" class="wtg_image_a" rel="bookmark">
									<img src="/templates/boxed/images/nophoto_big.png" alt="<?php html($item['title']); ?>" />
								</a>
							<?php } else { ?>
								<div class="wtg_image_a">
									<img src="/templates/boxed/images/nophoto_big.png" alt="<?php html($item['title']); ?>" />
								</div>
							<?php } ?>
						</div>
					<?php } else { ?>
						<div class="wtg_image">
							<?php if ($url) { ?>
								<a href="<?php echo $url; ?>" class="wtg_image_a" rel="bookmark">
									<img src="/templates/boxed/images/nophoto_small.png" alt="<?php html($item['title']); ?>"/>
								</a>
							<?php } else { ?>
								<div class="wtg_image_a">
									<img src="/templates/boxed/images/nophoto_small.png" alt="<?php html($item['title']); ?>"/>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
                <?php } ?>
                <div class="wtg_info">
					<div class="wtg_title">
                        <?php if ($url) { ?>
                            <a href="<?php echo $url; ?>" rel="bookmark">
								<?php html($item['title']); ?>
							</a>
                        <?php } else { ?>
                            <?php html($item['title']); ?>
                        <?php } ?>
                        <?php if ($item['is_private']) { ?>
                            <span class="is_private" title="<?php html(LANG_PRIVACY_PRIVATE); ?>"></span>
                        <?php } ?>
                    </div>
                    <?php if ($is_first && $is_show_details) { ?>
                        <div class="wtg_details">
                            <span class="wtg_author">
								<i class="bx-user-circle"></i> 
                                <a href="<?php echo href_to('users', $item['user']['id']); ?>" rel="author">
									<?php html($item['user']['nickname']); ?>
								</a>
                                <?php if ($item['parent_id']){ ?>
                                    <?php echo LANG_WROTE_IN_GROUP; ?>
                                    <a href="<?php echo rel_to_href($item['parent_url']); ?>"><?php html($item['parent_title']); ?></a>
                                <?php } ?>
                            </span>
                            <span class="wtg_date">
								<i class="bx-clock-o"></i> <?php html(string_date_age_max($item['date_pub'], true)); ?>
                            </span>
                            <?php if($ctype['is_comments']){ ?>
                                <span class="wtg_comments">
									<i class="bx-comments"></i> 
                                    <?php if ($url) { ?>
                                        <a href="<?php echo $url . '#comments'; ?>" title="<?php echo LANG_COMMENTS; ?>">
                                            <?php echo intval($item['comments']); ?>
                                        </a>
                                    <?php } else { ?>
                                        <?php echo intval($item['comments']); ?>
                                    <?php } ?>
                                </span>
                            <?php } ?>
							<?php if($ctype['options']['hits_on']){ ?>
                                <span class="wtg_views">
									<i class="bx-eye"></i> <?php echo intval($item['hits_count']); ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if (!$is_first && $is_show_details) { ?>
                        <div class="wtg_details">
                            <span class="wtg_author">
								<i class="bx-user-circle"></i> 
                                <a href="<?php echo href_to('users', $item['user']['id']); ?>" rel="author">
									<?php html($item['user']['nickname']); ?>
								</a>
                                <?php if ($item['parent_id']){ ?>
                                    <?php echo LANG_WROTE_IN_GROUP; ?>
                                    <a href="<?php echo rel_to_href($item['parent_url']); ?>"><?php html($item['parent_title']); ?></a>
                                <?php } ?>
                            </span>
                            <span class="wtg_date">
                                <i class="bx-clock-o"></i> <?php html(string_date_age_max($item['date_pub'], true)); ?>
                            </span>
                            <?php if($ctype['is_comments']){ ?>
                                <span class="wtg_comments">
									<i class="bx-comments"></i> 
                                    <?php if ($url) { ?>
                                        <a href="<?php echo $url . '#comments'; ?>" title="<?php echo LANG_COMMENTS; ?>">
                                            <?php echo intval($item['comments']); ?>
                                        </a>
                                    <?php } else { ?>
                                        <?php echo intval($item['comments']); ?>
                                    <?php } ?>
                                </span>
                            <?php } ?>
							<?php if($ctype['options']['hits_on']){ ?>
                                <span class="wtg_views">
									<i class="bx-eye"></i> <?php echo intval($item['hits_count']); ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <?php } ?>
    </div>

<?php } ?>