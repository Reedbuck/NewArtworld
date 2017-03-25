
$(function() {
    $('.rb_carousel-block').css('width', (($('.rb_carousel').width() / 4) + 'px') );
    $('.rb_carousel-items').css('width', (($('.rb_carousel-block').width() * 8) + 'px') );
});

$( window ).resize(function() {
    $('.rb_carousel-block').css('width', (($('.rb_carousel').width() / 4) + 'px') );
    $('.rb_carousel-items').css('width', (($('.rb_carousel-block').width() * 8) + 'px') );
});


//Обработка клика на стрелку вправо
$(document).on('click', ".rb_carousel-button-right",function(){ 
	var carusel = $(this).parents('.rb_carousel');
	right_carusel(carusel);
	return false;
});
//Обработка клика на стрелку влево
$(document).on('click',".rb_carousel-button-left",function(){ 
	var carusel = $(this).parents('.rb_carousel');
	left_carusel(carusel);
	return false;
});
function left_carusel(carusel){
   var block_width = $(carusel).find('.rb_carousel-block').outerWidth();
   $(carusel).find(".rb_carousel-items .rb_carousel-block").eq(-1).clone().prependTo($(carusel).find(".rb_carousel-items")); 
   $(carusel).find(".rb_carousel-items").css({"left":"-"+block_width+"px"});
   $(carusel).find(".rb_carousel-items .rb_carousel-block").eq(-1).remove();    
   $(carusel).find(".rb_carousel-items").animate({left: "0px"}, 200); 
   
}
function right_carusel(carusel){
   var block_width = $(carusel).find('.rb_carousel-block').outerWidth();
   $(carusel).find(".rb_carousel-items").animate({left: "-"+ block_width +"px"}, 200, function(){
	  $(carusel).find(".rb_carousel-items .rb_carousel-block").eq(0).clone().appendTo($(carusel).find(".rb_carousel-items")); 
      $(carusel).find(".rb_carousel-items .rb_carousel-block").eq(0).remove(); 
      $(carusel).find(".rb_carousel-items").css({"left":"0px"}); 
   }); 
}

$(function() {
//Раскомментируйте строку ниже, чтобы включить автоматическую прокрутку карусели
	auto_right('.rb_carousel:first');
})

// Автоматическая прокрутка
function auto_right(carusel){
	setInterval(function(){
		if (!$(carusel).is('.hover'))
			right_carusel(carusel);
	}, 3000)
}
// Навели курсор на карусель
$(document).on('mouseenter', '.rb_carousel', function(){$(this).addClass('hover')})
//Убрали курсор с карусели
$(document).on('mouseleave', '.rb_carousel', function(){$(this).removeClass('hover')})