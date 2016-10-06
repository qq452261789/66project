$(function(){
	
	//var top = document.body.scrollTop || document.documentElement.scrollTop;
	//console.log(top);
	var $banner_box = $("#banner_box");
	
	
	var $about_title = $("#about_title");
	var $about_article = $("#about_article");
	var $about_href = $("#about_href")
	
	var $about_top = $("#about").offset().top  ;

	document.body.offsetWidth ;
	$about_title.hide();
	$about_article.hide();
	$about_href.hide();
	
	console.log($(window).height());
	
	$(window||document.body).scroll(function ()
	{
		var sts = $(this).scrollTop()+$(window).height();
		if(sts>=$about_top){
			$about_title.fadeIn(400,function(){
				$about_article.fadeIn(400,function(){
					$about_href.fadeIn();	
				});
			})
		}
	});
	
	$(window||document.body).scroll(function ()
	{
		var st = $(this).scrollTop();
		pos_y = st/($banner_box.height())*(250)
		//console.log(pos_y);
		
		$banner_box.css({"background-position-y":pos_y});
		
		
	});
	
	
	
})