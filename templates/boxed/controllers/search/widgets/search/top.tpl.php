<a class="topbar_search_button" href="javascript:void(0);"><i class="fa fa-search"></i></a>
<div class="topbar_search">
	<form action="<?php echo href_to('search'); ?>" method="get" class="topbar_search_form">
		<fieldset>
			<input type="search" name="q" class="form-control" placeholder="<?php html(ERR_SEARCH_QUERY_INPUT); ?>">
		</fieldset>
	</form>
	<a class="topbar_search_close" href="javascript:void(0);"><i class="fa fa-close"></i></a>
</div>
