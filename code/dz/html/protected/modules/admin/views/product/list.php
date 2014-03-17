<!-- 右侧内容 -->
		<div class="col-xs-10 col-md-10 right-content">
			<div class="clearfix">
				<div class="input-group form-inline col-xs-9 col-md-9 pull-left">
		            <input type="text" class="form-control">
		            <span class="input-group-btn">
		              <button class="btn btn-default" type="button">搜索</button>
		            </span>
		        </div>
		        <a type="" href="" class="btn btn-info add-btn">添加商品</a>
			</div>
			<div class="product-list">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="col-md-2">商品ID</th>
							<th class="col-md-7">商品名</th>
                                                        <th class="col-md-2">价格</th>
							<th class="col-md-2">类别</th>
							<th class="col-md-1">修改</th>
							<th class="col-md-1">删除</th>
						</tr>
					</thead>
                                        <tbody>
                                        <?php
                                            if(!empty($data)):
                                        ?>
                                            <?php
                                                foreach ($data as $k=>$v):
                                            ?>
                                            <tr>
                                                <td><?php echo CHtml::encode($v->id);?></td>
                                                <td><?php echo CHtml::encode($v->name);?></td>
                                                <td><?php echo CHtml::encode($v->price);?></td>
                                                
                                                <td><?php echo CHtml::encode($v->classify->name)?></td>
							<td><a href="" class="btn btn btn-primary">修改</a></td>
							<td><a href="" class="btn btn-danger">删除</a></td>
                                                        
						</tr>
                                        <?php
                                            endforeach;
                                        ?>
                                        <?php
                                            endif;
                                        ?>
					
						
					</tbody>
				</table>
			</div>
			<ul class="pagination">
				<li><a href="#" class="disabled">&laquo;</a></li>
				<li><a href="#" class="active">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
		</div>