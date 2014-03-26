/**
 * 创建form
 */
$(function () {
	// json格式
	var defaultData = {
		'formName' : '',
		'formData' : {
			'text' : [],
			'checkbox' : {},
			'radio' : {},
			'select' : [],
			'textarea' : [],
			'file' : []
		}
	};

	$(document).delegate('#DZ_formSave','click',function (e) {
		e.preventDefault();
		var result = $.extend({},defaultData),
			$formName = $('#DZ_formName'),
			$target = $('#target'),
			$inputs = $target.find('input[type=text]'),
			$radios = $target.find('input[type=radio]'),
			$checkbox = $target.find('input[type=checkbox]'),
			$files = $target.find('input[type=file]'),
			$selects = $target.find('select'),
			$textarea = $target.find('textarea'),
			radioId = 1,
			checkboxId = 1;

		result.formName = $formName.text();
		// 开始循环
		
		// 输入框
		$inputs.each(function () {
			var input = $(this),
				help = input.siblings('.help').text(),
				label = input.parent().siblings('label').text(),
				prepend = input.siblings('span[data-valtype=prepend]'),
				append = input.siblings('span[data-valtype=append]'),
				data = {
					'type' : 'text',
					'label' : label,
					'help' : help,
					'prepend' : prepend,
					'append' : append
				};
			result.formData.text.push(data)
		});

		// 单选
		$radios.each(function () {
			var radio = $(this),
				radioName = radio.attr('name'),
				name = radioName && radioName !== 'group' ? radioName : 'radio-' + radioId,
				label = radio.parent().text(),
				siblings = radio.parents('div[data-valtype=radios]').find('input[type=radio]'),
				data = {
					'type' : 'radio',
					'label' : label
				};

			if (result.formData.radio[name]) {
				result.formData.radio[name].push(data);
			} else {
				result.formData.radio[name] = [];
				result.formData.radio[name].push(data);
				siblings.each(function () {
					$(this).attr({'name':name})
				});

				radioId += 1;
			};
		});

		// 多选
		$checkbox.each(function () {
			var checkbox = $(this),
				name = checkbox.attr('name') || 'checkbox-' + checkboxId,
				label = checkbox.parent().text(),
				siblings = checkbox.parents('div[data-valtype=checkboxes]').find('input[type=checkbox]'),
				data = {
					'type' : 'checkbox',
					'label' : label
				};

			if (result.formData.checkbox[name]) {
				result.formData.checkbox[name].push(data);
			} else {
				result.formData.checkbox[name] = [];
				result.formData.checkbox[name].push(data);
				siblings.each(function () {
					$(this).attr({'name':name})
				});

				checkboxId += 1;
			};
		});

		// select
		$selects.each(function () {
			var select = $(this),
				name = $(this).attr('name'),
				options = select.find('option'),
				label = select.parent().siblings('label').text(),
				data = {
					'type' : 'select',
					'name' : name,
					'label' : label,
					'options' : []
				};

			options.each(function () {
				var label = $(this).text();
				data.options.push(label)
			});

			result.formData.select.push(data);
		});

		// file
		$files.each(function () {
			var file = $(this),
				name = file.attr('name'),
				label = file.parent().siblings('label').text(),
				data = {
					'type' : 'file',
					'name' : name,
					'label' : label
				};

			result.formData.file.push(data);
		});

		// textarea
		$textarea.each(function () {
			var textarea = $(this),
				label = textarea.parent().siblings('label').text(),
				data = {
					'type' : 'textarea',
					'label' : label
				};
			result.formData.textarea.push(data);
		});

		console.log(result);

	})

});