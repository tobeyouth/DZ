<h4>新建预约单</h4>

<!--筛选供应商及仓库start-->
<?php
$form = $this->beginWidget('CActiveForm',array(
	'method'=>'get',
	'action'=>Yii::app()->createUrl($this->route),
	'id'=>'search_supplier'
));
?>
<table class="table">
	<tr>
		<td>
			供应商名称:
			<?php
			$options = array(
				'name' => 'CreateReservationOrder[supplier_name]',
				'value' => isset($_GET['CreateReservationOrder']['supplier_name'])
						?CHtml::encode($_GET['CreateReservationOrder']['supplier_name']):'',
				'sourceUrl' => Yii::app()->createUrl('/PO/supplier/json'),
				// additional javascript options for the autocomplete plugin
				'options' => array(
					'minLength' => '2',
				),
				'htmlOptions' => array(
					'style' => 'height:20px;width:250px',
				),
			);
			$this->widget('zii.widgets.jui.CJuiAutoComplete', $options);
			?>
		</td>
		<td>
			中转仓库:
			<?php
			$activeWarehouse =  Warehouse::getActiveWarehouse();
			echo CHtml::dropDownList('CreateReservationOrder[warehouse]',isset($_GET['CreateReservationOrder']['warehouse'])? CHtml::encode($_GET['CreateReservationOrder']['warehouse']) : '',$activeWarehouse);
			?>
		</td>
		<td>
			<?php echo CHtml::submitButton('查找',array('class' => 'btn btn-info btn-small')); ?>
		</td>
	</tr>
</table>
<?php
$this->endWidget();
?>
<!--筛选供应商及仓库end-->
<?php
//到货单列表

if(!empty($data) && !empty($supplierInfo)) {
	$companyType = isset($supplierInfo->company_type) ? $supplierInfo->company_type :'';

	$form=$this->beginWidget('TbActiveForm', array(
		'id'=>'reservation-order-form',
		'enableAjaxValidation'=>false,
		'action' => array('/PO/ReservationOrder/AddReservationOrder')
	));

	$token = md5(md5($supplierInfo->supplier_id."JUmei.Com").md5($companyType));
	echo CHtml::hiddenField('ReservationOrder[supplier_id]',$supplierInfo->supplier_id);
	echo CHtml::hiddenField('ReservationOrder[company_type]',$companyType);
	echo CHtml::hiddenField('ReservationOrder[token]',$token);
	$this->widget('bootstrap.widgets.TbGridView', array(
		'id'=>'jerppurchase-order-grid',
		'dataProvider'=>$data,
		'filter'=>$asnModel,
		'summaryText' => '',
        'afterAjaxUpdate'=>'function(id,data){
             var itemQuantity = 0;
             $("#item_quantity").val(itemQuantity);
             console.log($("#jerppurchase-order-grid_c0_all").val());
             if($("#jerppurchase-order-grid_c0_all").is(":checked")) {
                    console.log("bbb");
                    $("#jerppurchase-order-grid_c0_all").attr("checked","");
             }else{
                console.log("aaa");
                 $("#jerppurchase-order-grid_c0_all").attr("checked",false);
                 console.log($("#jerppurchase-order-grid_c0_all").attr("checked"));
                 //$("#jerppurchase-order-grid_c0_all").val("22222");
             }


            $("#jerppurchase-order-grid_c0_all").change(function(){
                var checkList = $(".asnid_check");
                if($(this).attr("checked")) {
                    checkList.each(function(key,obj){
                        if($(obj).is(":checked")){
                            return true;
                        }
                            itemQuantity += parseInt($(obj).parent().siblings(".itemQuantity").html());
                    })
                }else {
                    checkList.each(function(key,obj){
                    if(!$(obj).is(":checked")){
                        return true;
                    }
                        itemQuantity -= parseInt($(obj).parent().siblings(".itemQuantity").html());
                    })
                }
                $("#item_quantity").val(itemQuantity);
            })

	$(".asnid_check").change(function(){
		if ($(this).attr("checked")) {
			itemQuantity += parseInt($(this).parent().siblings(".itemQuantity").html());
			//alert(itemQuantity);
			$("#item_quantity").val(itemQuantity);
		}else {
			itemQuantity -= parseInt($(this).parent().siblings(".itemQuantity").html());
			//alert(itemQuantity);
			$("#item_quantity").val(itemQuantity);
		}
	})
        }',
		'type'=>'condensed striped bordered',
		'columns'=>array(
			array(
				'selectableRows'=>2,
				//'footer' => '<button type="button"  onclick="GetCheckbox();" style="width:76px">批量创建预约单</button>',
				'class' => 'CCheckBoxColumn',
				//'checked'=>false,
				'headerHtmlOptions' => array('width'=>'33px'),
				'checkBoxHtmlOptions' => array('name' => 'ReservationOrder[asn_ids][]','class'=>'asnid_check',),
			),
			'advanced_shipping_note_id'=>array(
				'header'=>'到货单号',
				'name'=>'advanced_shipping_note_id',
				'htmlOptions'=>array('class'=>'span2'),
			),
			'purchase_order_id'=>array(
				'header'=>'采购单号',
				'name'=>'purchase_order_id',
				'htmlOptions'=>array('class'=>'span2'),
				'visible'=>$companyType != 'dzd'
			),
			'stock_order_id'=>array(
				'header'=>'存货单号',
				'name'=>'stock_order_id',
				'htmlOptions'=>array('class'=>'span2'),
				'visible'=>$companyType == 'dzd'
			),
			array(
				'header'=>'到货数量',
				'value'=>'AdvancedShippingNote::model()->getPlanShippingQuantityById($data->advanced_shipping_note_id,$data->supplier_id,$data->company_type)',
				'htmlOptions'=>array('class'=>'itemQuantity'),
				//'value'=>'100'
			),
			array(
				'header'=>'中转仓库',
				'value'=>'Warehouse::getWarehouseName($data->warehouse_id)',
				'filter'=>false,
			),
			array(
				'header'=>'目的仓库',
				'value' => 'Warehouse::getWarehouseName($data->warehouse_to_id)',
				'filter'=>false,
			),
			array(
				'header' => '单据状态',
				'value' =>'DZDAdvancedShippingNote::$status_options[$data->status]',
				'filter'=>false,
			),
			array(
				'header' => '创建人',
				'name' => 'creator',
				'filter'=>false,
			),
			array(
				'header' => '创建时间',
				'name' => 'create_time',
				'filter'=>false,
			)
		),
	));




	?>
	<h4>预约单信息</h4>
	<div class="form">
		<?php

		JMAssetRegister::registerMy97DatePicker();

		?>
		<?php echo $form->errorSummary($reservationModel); ?>
		<label for="ReservationOrder_note">供应商名称：</label>
		<?php
		echo CHtml::textField('ReservationOrder["supplier_name"]',isset($_GET['CreateReservationOrder']['supplier_name'])
			?CHtml::encode($_GET['CreateReservationOrder']['supplier_name']):'',array('readonly'=>true));
		?>
		<?php
		/*
			echo $form->labelEx($reservationModel,'box_quantity');
			echo $form->textField($reservationModel,'box_quantity',array('id'=>'box_quantity','value'=>'','onkeyup' => "this.value=this.value.replace(/\D/g,'')",
				'onafterpaste' => "this.value=this.value.replace(/\D/g,'')"));
			echo $form->error($reservationModel,'box_quantity');

			echo $form->labelEx($reservationModel,'item_quantity');
			echo $form->textField($reservationModel,'item_quantity',array('id'=>'item_quantity','value'=>'','onkeyup' => "this.value=this.value.replace(/\D/g,'')",
				'onafterpaste' => "this.value=this.value.replace(/\D/g,'')"));
			echo $form->error($reservationModel,'item_quantity');
		*/


		echo $form->labelEx($reservationModel,'warehouse');
		echo $form->textField($reservationModel,'warehouse',array('id'=>'warehouse','value'=>$warehouse,'readonly'=>true));
		echo $form->error($reservationModel,'warehouse');

		echo $form->labelEx($reservationModel,'expect_time');
		echo $form->textField($reservationModel,'expect_time',array('class' => "Wdate",'readonly' => 'true','value' => '',
			'onfocus' => "WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd',minDate:'%y-%M-#{%d}',
            maxDate:'%y-%M-#{%d+3}'});"));
		echo $form->error($reservationModel,'expect_time');

		echo $form->labelEx($reservationModel,'item_quantity');
		echo $form->textField($reservationModel,'item_quantity',array('id'=>'item_quantity','value'=>'','onkeyup' => "this.value=this.value.replace(/\D/g,'')",
			'onafterpaste' => "this.value=this.value.replace(/\D/g,'')",'readonly'=>true));
		echo $form->error($reservationModel,'item_quantity');

		echo $form->labelEx($reservationModel,'delivery_method');
		echo $form->dropDownList($reservationModel, 'delivery_method', ReservationOrder::$deliveryMethodOptions);
		echo $form->error($reservationModel,'delivery_method');

		echo $form->labelEx($reservationModel,'car_quantity');
		echo $form->textField($reservationModel,'car_quantity', array('id'=>'carQuantity','maxlength'=>5,'value' => '',
			'onkeyup' => "this.value=this.value.replace(/\D/g,'')",
			'onafterpaste' => "this.value=this.value.replace(/\D/g,'')"));
		echo $form->error($reservationModel,'car_quantity');

		echo $form->labelEx($reservationModel,'supplier_contacts');
		echo $form->textField($reservationModel,'supplier_contacts',array('id'=>'supplierContacts','size'=>45,'maxlength'=>45));
		echo $form->error($reservationModel,'supplier_contacts');
		?>
		<?php
		echo $form->labelEx($reservationModel,'supplier_mobile');
		echo $form->textField($reservationModel,'supplier_mobile',array('id'=>'supplierMobile','size'=>60,'maxlength'=>255));
		echo $form->error($reservationModel,'supplier_mobile');
		?>
		<div style="width:30%" class="alert alert-info">联系方式一定要认真填写，以免发生错误！</div>
		<?php
		echo $form->labelEx($reservationModel,'email');
		echo $form->textField($reservationModel,'email',array('id'=>'email','size'=>45,'maxlength'=>45));
		echo $form->error($reservationModel,'email');
		?>
		<?php echo $form->labelEx($reservationModel,'driver'); ?>
		<?php echo $form->textField($reservationModel,'driver',array('id'=>'driver','size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($reservationModel,'driver'); ?>

		<?php echo $form->labelEx($reservationModel,'driver_id_num'); ?>
		<?php echo $form->textField($reservationModel,'driver_id_num',array('id'=>'driverIdNum','size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($reservationModel,'driver_id_num'); ?>

		<?php //echo $form->labelEx($reservationModel,'note'); ?>
		<label for="ReservationOrder_note">备注（填写紧急预约原因）：<span class="required" >*</span></label>
		<?php echo $form->textArea($reservationModel,'note',array('id'=>'note','rows'=>6,'width'=>'450px','maxlength'=>60)); ?>
		<?php echo $form->error($reservationModel,'note'); ?>


		<br />
		<br />
		<div>
			<div style="width:100%;float:left;">
				<div class="progress progress-info" style="width:70px;height:40px;float: left;margin-right:70px;">
					<div class="bar" style="width:100%;background: #ffc0cb;color: black;line-height: 35px;">已占用</div>
				</div>
				<div class="progress progress-info" style="width:70px;height:40px;float: left;">
					<div class="bar" style="width:100%;background: lightgreen;color: black;line-height: 35px; ">空闲</div>
				</div>
			</div>
			<?php if(!empty($visuallizationData)):?>
				<?php foreach ($visuallizationData as $key=>$value):?>
					<div style="float:left;width:100%;">
						<div style="color:black;font-size: 15px;font-weight: bold;float: left;height: 40px;margin-right:50px;margin-top: 30px;"><?php echo $value['confirm_expect_time'];?></div>
						<div class="progress" style="height:40px;width:70%;margin-top:20px;float:left;">
							<?php if (isset($value['free']) && isset($value['freeQuantity'])):?>
								<div class="bar bar-success" style="color: black;line-height: 35px;width: <?php echo $value['occupy'];?>;background: #ffc0cb"><?php echo $value['quantity'];?>件</div>
								<div class="bar bar-warning" style="color: black;line-height: 35px;width: <?php echo $value['free'];?>;background: lightgreen"><?php echo $value['freeQuantity'];?>件</div>
							<?php else:?>
								<div class="bar bar-success" style="color: black;line-height: 35px;width: <?php echo $value['occupy'];?>;background: #ffc0cb"><?php echo $value['quantity'];?>件</div>
								<div class="bar bar-warning" style="color: black;line-height: 35px;width: <?php echo $value['upPersent'];?>;background: red"><?php echo $value['upQuantity'];?>件</div>
							<?php endif?>
						</div>
					</div>
				<?php endforeach ?>

			<?php endif?>
		</div>

		<?php //echo CHtml::submitButton('保存',array('class' => 'btn btn-info','id'=>'save')); ?>
		<?php
		echo CHtml::link('保存','javascript:void(0)',array('id'=>'save','class'=>'btn btn-info'));
		?>
		<?php

		$this->endWidget();
		?>
	</div>
	<?php
	#将全选的默认选中干掉，只能这样写了，其他方式不会
	$cs = Yii::app()->getClientScript();
	$cs->registerScript('f1','$("#jerppurchase-order-grid_c0_all").attr("checked",false);');
	?>

<?php
}else{
	$supplierName = isset($_GET['CreateReservationOrder']['supplier_name']) ? CHtml::encode($_GET['CreateReservationOrder']['supplier_name']):'' ;
	if ($supplierName) {
		echo "<h4>没有找到该供应商{$supplierName}的数据</h4>";
	}
}
?>
<script>
	$("#search_supplier").submit(function(){
		var  supplierName = $("#CreateReservationOrder_supplier_name").val();
		if (supplierName==""){
			alert("请输入供应商名称");
			return false;
		}
	})


	var itemQuantity = 0;
	$(".asnid_check").change(function(){
		if ($(this).attr("checked")) {
			itemQuantity += parseInt($(this).parent().siblings(".itemQuantity").html());
			//alert(itemQuantity);
			$("#item_quantity").val(itemQuantity);
		}else {
			itemQuantity -= parseInt($(this).parent().siblings(".itemQuantity").html());
			//alert(itemQuantity);
			$("#item_quantity").val(itemQuantity);
		}
	})
    $("#jerppurchase-order-grid_c0_all").change(function(){
        var checkList = $(".asnid_check");
        if($(this).attr("checked")) {
            checkList.each(function(key,obj){
                if($(obj).is(":checked")){
                    return true;
                }
                    itemQuantity += parseInt($(obj).parent().siblings(".itemQuantity").html());
            })
        }else {
            checkList.each(function(key,obj){
                if(!$(obj).is(":checked")){
                    return true;
                }
                itemQuantity -= parseInt($(obj).parent().siblings(".itemQuantity").html());
            })
        }
        $("#item_quantity").val(itemQuantity);
    })


	$("#save").click(function(){
		var checkOptions = $("[name='ReservationOrder[asn_ids][]']:checked");
		if (checkOptions.length == 0) {
			alert("请勾选到货单!");
			return false;
		}

//		var boxQuantity = $("#box_quantity").val().replace(/(^\s*)|(\s*$)/g, "");
//		var itemQuantity = $("#item_quantity").val().replace(/(^\s*)|(\s*$)/g, "");
		var carQuantity = $("#carQuantity").val().replace(/(^\s*)|(\s*$)/g, "");
		//var itemQuantity = $("#itemQuantity").val();
		var Wdate = $(".Wdate").val();
		var warehouse = $("#warehouse").val().replace(/(^\s*)|(\s*$)/g, "");
		var supplierContacts = $("#supplierContacts").val().replace(/(^\s*)|(\s*$)/g, "");
		var supplierMobile = $("#supplierMobile").val().replace(/(^\s*)|(\s*$)/g, "");
		var email = $("#email").val().replace(/(^\s*)|(\s*$)/g, "");
		var driver = $("#driver").val().replace(/(^\s*)|(\s*$)/g, "");
		var driverIdNum = $("#driverIdNum").val().replace(/(^\s*)|(\s*$)/g, "");
		var note = $("#note").val().replace(/(^\s*)|(\s*$)/g, "");
//		if (boxQuantity == '') {
//			alert('箱数不能为空');
//			return false;
//		}
//		if (itemQuantity == '') {
//			alert('件数不能为空');
//			return false;
//		}
		if (Wdate == '') {
			alert('请选择日期');
			return false;
		}
		if (warehouse == '') {
			alert('仓库不能为空');
			return false;
		}
		if (carQuantity == '') {
			alert('车辆数不能为空');
			return false;
		}
		if (carQuantity == 0) {
			alert('车辆数不能0');
			return false;
		}
		if (supplierContacts == '') {
			alert('供应商联系人不能为空');
			return false;
		}
		if (supplierMobile == '') {
			alert('供应商联系方式不能为空');
			return false;
		}
		if(!supplierMobile.match(/^1[3|4|5|8][0-9]\d{4,8}$/)){
			alert('手机号码不正确');
			return false;
		}
		if (email == '') {
			alert('邮件地址不能为空');
			return false;
		}
		if(!email.match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)){
			alert('邮箱格式不正确');
			return false;
		}
		if (driver == '') {
			alert('司机姓名不能为空');
			return false;
		}
		if (driverIdNum == '') {
			alert('司机身份证号不能为空');
			return false;
		}
		if (note == "") {
			alert('紧急预约原因不能为空');
			return false;
		}

		$('#reservation-order-form').submit();

	})

</script>