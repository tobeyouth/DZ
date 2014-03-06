/**
 * 首页的js
 */
$(function () {
	$(document).delegate('#add-btn','click',function (e) {
		e.preventDefault();
		var parent = $(this).parent('li'),
			isDown = parent.hasClass('down');

		if (isDown) {
			parent.removeClass('down');
		} else {	
			parent.addClass('down');
		}
	});
});