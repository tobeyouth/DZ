<!-- 右侧内容 -->
<div class="col-xs-10 col-md-10 right-content">
        <h3>当前所在分类</h3>
        <ol class="breadcrumb">
            <?php
                foreach ($nav as $val) {
                    if (!$val['url']) {
            ?>
                <li class="active"><?=$val['name']?></li>
            <?php
                    } else {
            ?>
                <li><a href="<?=$val['url']?>"><?=$val['name']?></a></li>
            <?php
                    }
                }
            ?>
        </ol>
        <!-- 添加类别 -->
        <div class="add-wrap">
                <form action="/index.php?r=admin/productClassify/add" method="POST">
                        <!-- 这个input用于后台获取父级类别 -->
                        <input type="hidden" name="parent_id" value="<?=$parent_id?>">
                        <div class="input-group input-group-lg btn-group-lg">
                        <input type="text" class="form-control" name="name">
                    <span class="input-group-btn">
                                <button class="btn btn-default btn-group-lg" type="submit">
                                        添加
                                                <em class="glyphicon glyphicon-cloud"></em>
                                </button>
                        </span>
                </div>
                <div class="check-type">
                        <label class="radio-inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked="">
                        这是一个子类
                        </label>
                        <label class="radio-inline">
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" checked="">
                        这是一个产品
                        </label>
                </div>
                </form>
        </div>
        <!-- 当前类别下子类或者商品的列表 -->
        <div class="table-list">
                <table class="table table-hover class-tabel">
                        <tbody>
                            <?php
                                if ($res) {
                                    foreach($res as $key=>$val){
                                        $top = $key + 1;
                            ?>
                            <tr>
                                    <th class="col-md-1"><?=$top?></th>
                                    <td class="col-md-9"><?=$val['name']?></td>
                                    <td class="col-md-2">
                                            <button type="button" class="btn btn-warning update-name">修改名称</button>
                                            <button type="button" class="btn btn-danger delete-btn">删除</button>
                                    </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                </table>
        </div>
</div>