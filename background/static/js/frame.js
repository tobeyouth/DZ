/**
 * 列表框架页的js
 */
$(function () {
	// 左侧列表slide
	$(document).delegate('.class-list li','click',function (e) {
		e.preventDefault();
		e.stopPropagation();
		var item = $(this),
			subList = item.children('ul'),
			isSlide = item.hasClass('slide');

		if (isSlide) {
			item.removeClass('slide');
		} else {
			item.addClass('slide');
		}
	});

});