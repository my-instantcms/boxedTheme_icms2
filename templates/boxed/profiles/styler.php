<?php if (!empty($bg_img)){ ?>
<style>

    html body {
        background-image: url("<?php echo $config->upload_root . $bg_img['original']; ?>") !important;
        <?php if (!empty($bg_color)){ ?>
            background-color: <?php echo $bg_color; ?> !important;
        <?php } ?>
        <?php if (!empty($bg_repeat)){ ?>
        <?php if ($bg_repeat == 'cover'){ ?>
			background-size: cover !important;
		<?php } else { ?>
            background-repeat: <?php echo $bg_repeat; ?> !important;
        <?php } ?>
        <?php } ?>
        <?php if (!empty($bg_pos_x)){ ?>
            background-position-x: <?php echo $bg_pos_x; ?> !important;
        <?php } ?>
        <?php if (!empty($bg_pos_y)){ ?>
            background-position-y: <?php echo $bg_pos_y; ?> !important;
        <?php } ?>
        <?php if (!empty($bg_img_fix)){ ?>
            background-attachment:fixed !important;
        <?php } ?>
    }

    body #layout{
        <?php if (!empty($margin_top)){ ?>
            margin-top: <?php echo $margin_top; ?>px !important;
        <?php } ?>
    }

</style>
<?php } ?>
