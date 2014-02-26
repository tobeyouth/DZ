/**
 * 列表框架页的js
 */
$(function () {
	$(document).delegate('.class-list a','click',function (e) {
		e.preventDefault();
		var item = $(this),
			listItem = item.parent('li'),
			isActive = item.hasClass('active'),
			hasSlide = listItem.hasClass('slide'),
			hasSlideDown = listItem.hasClass('slide-down');

		// 变色
		if (isActive) {
			item.removeClass('active');
			// slideDown
			if (hasSlideDown) {
				listItem.removeClass('slide-down');
			};
		} else {
			listItem.siblings('li').find('a').removeClass('active');
			item.addClass('active');
			if (hasSlide) {
				listItem.addClass('slide-down');
			};
		};

	});

});