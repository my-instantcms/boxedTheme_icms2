<div class="visually_impaired">
	<i class="fa fa-eye"></i>
	<div class="vi_fonts">
		<a class="fontzoomout" title="Уменьшить шрифт"><i class="fa fa-minus"></i></a>
		<a class="fontreset" title="Размер по умолчанию"><i class="fa fa-font"></i></a>
		<a class="fontzoomin" title="Увеличить шрифт"><i class="fa fa-plus"></i></a>
	</div>
	<div class="vi_backgrounds">
		<a class="set_black" title="Темный фон"><i class="fa fa-adjust"></i></a> 
		<a class="set_white" title="Светлый фон"><i class="fa fa-adjust"></i></a> 
		<a class="set_reset" title="Фон по умолчанию"><i class="fa fa-close"></i></a>
	</div>
	<div class="vi_images">
		<a class="toggle_images" title="Показать изображения"><i class="fa fa-photo"></i></a>
	</div>
</div>
<style>.visually_impaired{padding:10px 0 10px 10px;height:50px;overflow:hidden;width:400px}.visually_impaired>i.fa{font-size:30px;width:50px;height:50px;line-height:50px;text-align:center;float:left;color:#fff;margin:-10px 15px -10px -10px;background:#000}.visually_impaired>i.fa:after{content:" ";border:7px solid transparent;border-left-color:#000;position:absolute;left:50px;top:19px}.vi_backgrounds,.vi_fonts,.vi_images{position:relative;display:inline-block;vertical-align:middle;margin-right:15px}.vi_backgrounds a,.vi_fonts a,.vi_images a{width:40px;display:inline-block;background:#000;color:#fff;padding:6px 10px 4px;text-align:center;white-space:nowrap;vertical-align:middle;-ms-touch-action:manipulation;touch-action:manipulation;cursor:pointer;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border-radius:3px;line-height:normal;font-size:18px}.vi_fonts a:nth-child(2){margin:0 -4px;border-radius:0;border-right:1px solid #676767;border-left:1px solid #676767}.vi_fonts a:last-child{border-radius:0 3px 3px 0}.vi_fonts a:first-child{border-radius:3px 0 0 3px}.vi_fonts a:hover{color:#000;background:#fff}html .vi_backgrounds a.set_white,html .vi_backgrounds a.set_white .fa:before{background:#fff!important;color:#000!important}html .vi_backgrounds a.set_black,html .vi_backgrounds a.set_black .fa:before{background:#000!important;color:#fff!important}.vi_backgrounds a.set_reset{background:#980404}.vi_images a{background:#1b9804}.vi_images a.is_dsbl{background:#000}body.set_black_bg,body.set_black_bg *,body.set_black_bg :before{background:#000!important;color:#fff!important;border-color:#000!important}body.set_white_bg,body.set_white_bg *,body.set_white_bg :before{background:#fff!important;color:#000!important;border-color:#fff!important}.visually_impaired div:last-child{margin-right:0}</style>
<script>
$(document).ready(function() {
	$(".vi_fonts .fontzoomout").on("click", function(){
		var fSize = (typeof $("html").data('fSize') !== "undefined") ? $("html").data('fSize') - 1 : 9;
		if(fSize >= 7){
			$("html").css('font-size', fSize + 'px').data('fSize', fSize);
		}
	});
	$(".vi_fonts .fontreset").on("click", function(){
		$("html").css('font-size', '10px').data('fSize', 10);
	});
	$(".vi_fonts .fontzoomin").on("click", function(){		
		var fSize = (typeof $("html").data('fSize') !== "undefined") ? $("html").data('fSize') + 1 : 11;
		if(fSize <= 13){
			$("html").css('font-size', fSize + 'px').data('fSize', fSize);
		}
	});
	$(".vi_backgrounds .set_black").on("click", function(){
		$("body").addClass('set_black_bg').removeClass('set_white_bg');
	});
	$(".vi_backgrounds .set_white").on("click", function(){
		$("body").addClass('set_white_bg').removeClass('set_black_bg');
	});
	$(".vi_backgrounds .set_reset").on("click", function(){
		$("body").removeClass('set_white_bg').removeClass('set_black_bg');
	});
	$(".vi_images .toggle_images").on("click", function(){
		var button = $(this);
		if(button.hasClass('is_dsbl')){
			$("img").css('opacity', 100);
			button.removeClass('is_dsbl');
		} else {
			$("img").css('opacity', 0);
			button.addClass('is_dsbl');
		}
	});
});
</script>