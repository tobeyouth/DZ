/**
 * 创建form
 */
$(function () {
	// json格式
	var defaultData = {
		'formName' : '',
		'text' : [],
		'radios' : [],
		'checkbox' : [],
		'select' : [],
		'textarea' : []
		// 'formData' : {
		// 	'text' : [],
		// 	'checkbox' : {},
		// 	'radio' : {},
		// 	'select' : [],
		// 	'textarea' : [],
		// 	'file' : []
		// }
	};

	$(document).delegate('#DZ_formSave','click',function (e) {
		e.preventDefault();
		var result = $.extend(true,{},defaultData),
			$formName = $('#DZ_formName'),
			$target = $('#target'),
			$inputs = $target.find('input[type=text]'),
			$radios = $target.find('.valtype[data-valtype=radios]'),
			$checkbox = $target.find('.valtype[data-valtype=checkboxes]'),
			$selects = $target.find('select[data-valtype=option]'),
			$files = $target.find('input[type=file]'),
			$textarea = $target.find('textarea'),
			radioId = 1,
			checkboxId = 1;


		result.formName = $formName.text();

		// 开始循环
		// 输入框
		$inputs.each(function () {
			var input = $(this),
				help = input.siblings('.help').text(),
				label = input.parents('.form-group').find('label[data-valtype=label]').text(),
				prepend = input.siblings('span[data-valtype=prepend]').text(),
				append = input.siblings('span[data-valtype=append]').text(),
				data = {
					'type' : 'text',
					'label' : label,
					'help' : help,
					'prepend' : prepend,
					'append' : append
				};
			result.text.push(json2str(data));
		});

		// 单选
		// $radios.each(function () {
		// 	var radio = $(this),
		// 		radioName = radio.attr('name'),
		// 		name = radioName && radioName !== 'group' ? radioName : 'radio-' + radioId,
		// 		label = radio.parent().text(),
		// 		siblings = radio.parents('div[data-valtype=radios]').find('input[type=radio]'),
		// 		data = {
		// 			'type' : 'radio',
		// 			'label' : label
		// 		};

		// 	if (result.formData.radio[name]) {
		// 		result.formData.radio[name].push(data);
		// 	} else {
		// 		result.formData.radio[name] = [];
		// 		result.formData.radio[name].push(data);
		// 		siblings.each(function () {
		// 			$(this).attr({'name':name})
		// 		});

		// 		radioId += 1;
		// 	};
		// });
		$radios.each(function () {
			var box = $(this),
				label = box.siblings('[data-valtype=label]').text(),
				radios = box.find('.radio'),
				options = [];

			radios.each(function () {
				var option = $.trim($(this).text());
				options.push(option);
			});

			var data = {
				'type' : 'radio',
				'label' : label,
				'options' : options.toString()
			};

			result.radios.push(json2str(data));
		});

		// 多选
		// $checkbox.each(function () {
		// 	var checkbox = $(this),
		// 		name = checkbox.attr('name') || 'checkbox-' + checkboxId,
		// 		label = checkbox.parent().text(),
		// 		siblings = checkbox.parents('div[data-valtype=checkboxes]').find('input[type=checkbox]'),
		// 		data = {
		// 			'type' : 'checkbox',
		// 			'label' : label
		// 		};

		// 	if (result.formData.checkbox[name]) {
		// 		result.formData.checkbox[name].push(data);
		// 	} else {
		// 		result.formData.checkbox[name] = [];
		// 		result.formData.checkbox[name].push(data);
		// 		siblings.each(function () {
		// 			$(this).attr({'name':name})
		// 		});

		// 		checkboxId += 1;
		// 	};
		// });
		$checkbox.each(function () {
			var box = $(this),
				label = box.siblings('[data-valtype=label]').text(),
				checkbox = box.find('.checkbox'),
				options = [];

			checkbox.each(function () {
				var option = $.trim($(this).text());
				options.push(option);
			});

			var data = {
				'type' : 'checkbox',
				'label' : label,
				'options' : options.toString()
			};
			console.log(data);
			result.checkbox.push(json2str(data));
		});
		// select
		// $selects.each(function (index) {
		// 	var select = $(this),
		// 		name = $(this).attr('name'),
		// 		options = select.find('option'),
		// 		label = select.parent().siblings('label').text(),
		// 		data = {
		// 			'type' : 'select',
		// 			'name' : name,
		// 			'label' : label,
		// 			'options' : []
		// 		};

		// 	options.each(function () {
		// 		var label = $(this).text();
		// 		data.options.push(label)
		// 	});

		// 	result.formData.select.push(data);
		// });
		$selects.each(function () {
			var box = $(this),
				label = box.parent().siblings('[data-valtype=label]').text(),
				optionlist = box.find('option'),
				options = [];

			optionlist.each(function () {
				var option = $(this).text();
				options.push(option);
			});

			var data = {
				'type' : 'select',
				'label' : label,
				'options' : options.toString()
			};

			result.select.push(json2str(data));
		});

		// file
		// $files.each(function () {
		// 	var file = $(this),
		// 		name = file.attr('name'),
		// 		label = file.parent().siblings('label').text(),
		// 		data = {
		// 			'type' : 'file',
		// 			'name' : name,
		// 			'label' : label
		// 		};

		// 	result.formData.file.push(data);
		// });

		// textarea
		$textarea.each(function () {
			var textarea = $(this),
				label = textarea.parents('.form-group').find('[data-valtype=label]').text(),
				data = {
					'type' : 'textarea',
					'label' : label
				};
			result.textarea.push(json2str(data));
		});

		console.log(result);
		console.log(json2str(result,'@'));
		var ajaxData = json2str(result,'@');

		/**
		 * @宋亮
		 *
		 * 在这下面写入ajax过程，传递参数为ajaxData(已经转为string类型)
		 *
		 * ps:
		 * 表单元素大类之间，通过'@'进行分割
		 * 相同类型元素之间，通过';'进行分割
		 * 元素的不同属性之间，通过'&'进行分割
		 *
		 * 另外，radio,checkbox个select的不同选项，都放在options中，通过','进行了分割
		 * 需要你那边填充value
		 */
		
		
	});
});

// helper
function json2str(json,holder) {
	var joinHolder = holder || '&',
		type = Object.prototype.toString.call(json),
		resultArr = [];

	if (/Object/gi.test(type)) {
		for (key in json) {
			var value = json[key] || '',
				key = key,
				str = '';
			if (!value || typeof(value) === 'string' || typeof(value) == 'number') {
				str = key + '=' + value;
				resultArr.push(str);
			} else if ($.isArray(value)) {
				str = key + ':' + value.join(';');
				resultArr.push(str);
			} else {
				json2str(value);
			}
		}
	} else {
		return;
	};

	return resultArr.join(joinHolder);
};

