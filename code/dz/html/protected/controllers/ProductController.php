<?php
/**
 * Description of IndexController
 *
 * @author sl
 */
class ProductController extends Controller
{
    public  $layout = '//layouts/index',
            $search_url = '/index.php',
            $search_hidden_input = '<input type="hidden" name="r" value="product/list" />',
            $css_name = NULL;

    private $_pro_fields = 'id, name, color, classify_id, brand_id, price',//, eg_name, update_time
            $_brand_fields = 'id, name',
            $_classify_brand_fields = 'product_classify_id, brand_id',
            $_class_fields = 'id, name, parent_id',
            $_picture_fields = 'id, pro_id, ext',
            $_price_range_fields = 'classify_id, price_range',
            $_param_name_fields = 'id, name, unit',

            $_list_url_tpl = "/index.php?r=product/list&parent_id=%d&classify_id=%d&brand_id=%d&price_range=%s&order=%s&page=%d",
            $_index_url_tpl = "/index.php?r=product/index&id=%d",

            $_big_class_arr = array(
                                    array('id_name'=>'camera', 'name'=>'摄像设备', 'icon'=>'&#xf0162;'),
                                    array('id_name'=>'sound', 'name'=>'录音设备', 'icon'=>'&#xf0149;'),
                                    array('id_name'=>'prop', 'name'=>'美术用品', 'icon'=>'&#xf0137;')
                                ),
            $_parent_class_arr = array(
                                    array(4),
                                    array(40),
                                    array(44)
                                ),

            $_pagesize = 8,
            $_paramsize = 3,
            $_homesize = 9;

    public function actionList()
    {
        $parent_id = intval( Yii::app()->request->getParam('parent_id') );
        $classify_id = intval( Yii::app()->request->getParam('classify_id') );
        $brand_id = intval( Yii::app()->request->getParam('brand_id') );
        $price_range = Yii::app()->request->getParam('price');
        $page = intval( Yii::app()->request->getParam('page') );
        $search = addslashes( Yii::app()->request->getParam('search') );

        if ($search) {
            $criteria = new CDbCriteria;
            $criteria->select = $this->_class_fields;
            $criteria->addCondition("name='{$search}'");
            $res = ProductClassify::model()->find($criteria);
            $parent_id = $res['id'];
        }

        $brand_list = $this->getBrandInfo();
        $price_range_list = $this->getPriceRangeInfo();
        $parent_class_list = $this->getClassInfo(0);
        $class_list = $this->getClassInfo(1);//取所有产品类

        $big_pro_class_arr = array();
        $parent_pro_class_arr = array();
        foreach ($this->_big_class_arr as $big_id => $big) {
            foreach ($this->_parent_class_arr[$big_id] as $parent_class_id) {
                $i = 0;
                foreach ($class_list as $class) {
                    if ($i <3) {
                        if ($class['parent_id'] == $parent_class_id) {
                            $big_pro_class_arr[$big_id][] = $class;
                            ++$i;
                        }
                    }
                    $parent_pro_class_arr[$parent_class_id][] = $class;
                    
                }
            }
        }

        $cur_class_pro_class_arr = $parent_pro_class_arr[$parent_id];
        foreach ($cur_class_pro_class_arr as $key => $value) {
            $cur_class_pro_class_arr[$key]['url'] = sprintf($this->_list_url_tpl, $parent_id, $value['id'], $brand_id, $price_range, $order, $page);
        }

        $criteria = new CDbCriteria;
        $criteria->select = $this->_pro_fields;
        
        if ($brand_id) {
            $criteria->addCondition("brand_id={$brand_id}");
        }
        if ($price_range) {
            $price_arr = explode('_', $price_range);
            $price_arr = array_map('intval', $price_arr);
            if (!$price_arr[1]) {
                $criteria->addCondition("price>{$price_arr[1]}");
            } else {
                $criteria->addBetweenCondition("price", $price_arr[0], $price_arr[1]);
            }
        }
        if ($classify_id) {
            $criteria->addCondition("classify_id={$classify_id}");
        } else {
            $classify_id_arr = array_keys($cur_class_pro_class_arr);
            $criteria->addInCondition("classify_id", $classify_id_arr);
        }
        $criteria->addCondition('is_del=0');

        //->join = 'LEFT JOIN doc_access a ON t.id = a.doc_id and a.user_id = 7';
        switch ($order) {
            case 'price1':
                $criteria->order = 'price';
                break;
            
            case 'price2':
                $criteria->order = 'price DESC';
                break;

            default:
                //$criteria->order = $order;
                break;
        }

        $criteria->offset = $page ? ($page-1)*$this->_pagesize : 0;
        $criteria->limit = $this->_pagesize;

        $res = Product::model()->findAll($criteria);
        $count = Product::model()->count($criteria);

        $pro_id = array();
        $pro_list = array();
        if ($res) {
            foreach ($res as $k => $v) {
                $pro_list[$k]['id'] = $v['id'];
                $pro_list[$k]['name'] = $v['name'];
                $pro_list[$k]['color'] = $v['color'];
                $pro_list[$k]['price'] = $v['price'];
                $pro_list[$k]['brand_name'] = $brand_list[$v['brand_id']] ? $brand_list[$v['brand_id']]['name'] : '';
                $pro_list[$k]['class_name'] = $class_list[$v['classify_id']] ? $class_list[$v['classify_id']]['name'] : '';
                $pro_list[$k]['url'] = sprintf($this->_index_url_tpl, $v['id']);
                $pro_id[] = $v['id'];
            }
        }

        $criteria = new CDbCriteria;
        $criteria->select = $this->_picture_fields;
        $criteria->addInCondition('pro_id', $pro_id);
        $criteria->addCondition("is_del=0");
        $res = Picture::model()->findAll($criteria);
        $picture_list = array();
        if ($res) {
            foreach ($res as $k => $v) {
                //$tem_arr = $v;
                //$dir = floor($v['id']/1000);
                //$tem_arr['src'] = IMAGE_DIR.$dir.$v['id'].'.'.$v['ext'];
                $picture_list[$v['pro_id']][] = $v;//$tem_arr;
            }

            foreach ($pro_list as $key => $value) {
                $img_id = $picture_list[$value['id']][0]['id'];
                $img_ext = $picture_list[$value['id']][0]['ext'];
                $dir = floor($picture_list[$value['id']][0]['id']/1000);
                $pro_list[$key]['src'] = IMAGE_DIR.$dir.$img_id.'.'.$img_ext;
            }
        }
        
        $pages = new CPagination($count);
        $pages->pageSize = $this->_pagesize;
        $pages->applyLimit($criteria);

        $show_brand = array();
        foreach ($brand_list as $key => $value) {
            if ($value['product_classify_id'] == $classify_id) {
                $tem_arr = $value;
                $tem_arr['url'] = sprintf($this->_list_url_tpl, $parent_id, $classify_id, $value['id'], $price_range, $order, $page);
                $show_brand[] = $tem_arr;
            }
        }

        if ($price_range_list[$classify_id]) {
            $price_range_list = $price_range_list[$classify_id];
            foreach ($price_range_list as $key => $value) {
                $price_range_list[$key]['url'] = sprintf($this->_list_url_tpl, $parent_id, $classify_id, $brand_id, $value['price_range'], $order, $page);
            }
        }

        $order_url['price1'] = sprintf($this->_list_url_tpl, $parent_id, $classify_id, $brand_id, $price_range, 'price1', $page);
        $order_url['price2'] = sprintf($this->_list_url_tpl, $parent_id, $classify_id, $brand_id, $price_range, 'price2', $page);

        $out['pro_list'] = $pro_list;
        $out['picture_list'] = $picture_list;
        $out['pages'] = $pages;
        $out['show_brand'] = $show_brand;
        $out['price_range_list'] = $price_range_list;
        $out['show_brand_id'] = $show_brand_id;
        $out['show_price_range'] = $show_price_range;
        $out['order_url'] = $order_url;
        $out['parent_class_list'] = $parent_class_list;
        $out['class_list'] = $class_list;
        $out['big_class_arr'] = $this->_big_class_arr;
        $out['parent_class_arr'] = $this->_parent_class_arr;
        $out['big_pro_class_arr'] = $big_pro_class_arr;
        $out['parent_pro_class_arr'] = $parent_pro_class_arr;
        $out['cur_class_pro_class_arr'] = $cur_class_pro_class_arr;
        $out['show_classify_id'] = $classify_id;

        $this->css_name = 'search';
        $this->render('list', $out);
    }

    public function actionIndex()
    {
        $id = intval( Yii::app()->request->getParam('id') );

        if (!$id) {
            die;
        }

        $criteria = new CDbCriteria;
        $criteria->select = $this->_pro_fields;
        $criteria->addCondition('is_del=0');
        $criteria->addCondition("id={$id}");

        $res = Product::model()->find($criteria);

        $brand_list = $this->getBrandInfo();
        $price_range_list = $this->getPriceRangeInfo();
        $class_list = $this->getClassInfo(1);//取所有产品类
        $parent_class_list = $this->getClassInfo(0);

        foreach ($class_list as $class) {
            if ($class['id'] == $res['classify_id']) {
                $parent_classify_id = $class['parent_id'];
            }
        }

        $product['id'] = $res['id'];
        $product['name'] = $res['name'];
        $product['color'] = $res['color'];
        $product['price'] = $res['price'];
        $product['classify_id'] = $res['classify_id'];
        $product['brand_id'] = $res['brand_id'];
        $product['brand_name'] = $brand_list[$res['brand_id']] ? $brand_list[$res['brand_id']]['name'] : '';
        $product['brand_url'] = sprintf($this->_list_url_tpl, $parent_classify_id, '', $res['brand_id'], '', '', 1);
        $product['class_name'] = $class_list[$res['classify_id']] ? $class_list[$res['classify_id']]['name'] : '';
        $product['class_url'] = sprintf($this->_list_url_tpl, $parent_classify_id, $res['classify_id'], '', '', '', 1);
        $product['parent_class_name'] = $parent_class_list[$class_list[$res['classify_id']]['parent_id']];

        foreach ($class_list as $class) {
            if ($class['id'] == $product['classify_id']) {
                $parent_classify_id = $class['parent_id'];
            }
        }

        $criteria = new CDbCriteria;
        $criteria->select = $this->_picture_fields;
        $criteria->addCondition("pro_id={$res['id']}");
        $criteria->addCondition("is_del=0");
        $res = Picture::model()->findAll($criteria);
        $picture_list = array();
        if ($res) {
            $res = array_slice($res, 0, 4);
            foreach ($res as $k => $v) {
                $dir = floor($v['id']/1000);
                $picture_list[] = IMAGE_DIR.$dir.$v['id'].'.'.$v['ext'];
            }
        }

        $show_brand = array();
        foreach ($brand_list as $key => $value) {
            if ($value['product_classify_id'] == $product['classify_id']) {
                $tem_arr = $value;
                $tem_arr['url'] = sprintf($this->_list_url_tpl, $parent_classify_id, $product['classify_id'], '', '', '', 1);
                $show_brand[] = $tem_arr;
            }
        }

        $criteria = new CDbCriteria;
        $criteria->select = $this->_param_name_fields;
        $criteria->addCondition("classify_id={$product['classify_id']}");
        $criteria->addCondition("is_del=0");
        $criteria->order = 'sort DESC';
        $criteria->limit = $this->_paramsize;
        $param_name_arr = ParamName::model()->findAll($criteria);

        $param_value_arr = array();
        if ($param_name_arr) {
            $param_value_id = array();
            foreach ($param_name_arr as $val) {
                $param_value_fields[] = "param_{$val['id']}";
            }
            $param_value_fields_str = join($param_value_fields, ',');
            $cmd = Yii::app()->db->createCommand();
            $cmd->select($param_value_fields_str);
            $cmd->from("dz_param_value_{$product['classify_id']}");
            $cmd->where("pro_id={$product['id']}");
            $param_value_arr = $cmd->queryAll();
        }

        $out['product'] = $product;
        $out['picture_list'] = $picture_list;
        $out['show_brand'] = $show_brand;
        $out['param_name_arr'] = $param_name_arr;
        $out['param_value_arr'] = $param_value_arr;

        $this->css_name = 'detail';
        $this->render('index', $out);
    }

    public function actionHome()
    {
        $pro_class_list = $this->getClassInfo(1);//取所有产品类
        $parent_class_list = $this->getClassInfo(0);

        $total_pro_arr = array();
        $total_pro_class_arr = array();
        //$big_class_pro_img_arr = array();
        foreach ($this->_big_class_arr as $big_class_id => $big_class_name) {
            $i = 0;
            $pro_class_id_arr[$big_class_id] = array();
            foreach ($pro_class_list as $class) {
                if (4 == $i) {
                    break;
                }
                if (in_array($class['parent_id'], $this->_parent_class_arr[$big_class_id])) {
                    $pro_class_id_arr[$big_class_id][] = $class['id'];
                    ++$i;
                }
            }

            $class_pro_list = array();
            foreach ($pro_class_id_arr[$big_class_id] as $pro_class_id) {
                $cmd = Yii::app()->db->createCommand();
                $cmd->select($this->_pro_fields);
                $cmd->from("dz_product");
                $cmd->where("classify_id={$pro_class_id} and is_del=0");
                $cmd->order('update_time DESC');
                $cmd->limit($this->_homesize);
                
                $res = $cmd->queryAll();

                $pro_id = array();
                $pro_list = array();
                if ($res) {
                    foreach ($res as $k => $v) {
                        $pro_list[$k]['id'] = $v['id'];
                        $pro_list[$k]['name'] = $v['name'];
                        $pro_list[$k]['color'] = $v['color'];
                        $pro_list[$k]['price'] = $v['price'];
                        $pro_list[$k]['brand_name'] = $brand_list[$v['brand_id']] ? $brand_list[$v['brand_id']]['name'] : '';
                        $pro_list[$k]['class_name'] = $class_list[$v['classify_id']] ? $class_list[$v['classify_id']]['name'] : '';
                        $pro_list[$k]['url'] = sprintf($this->_index_url_tpl, $v['id']);
                        $pro_id[] = $v['id'];
                    }
                }

                $pro_id = join($pro_id, ',');
                $cmd = Yii::app()->db->createCommand();
                $cmd->select($this->_picture_fields);
                $cmd->from("dz_picture");
                $cmd->where("pro_id in({$pro_id}) and is_del=0");
                $cmd->order('');
                $cmd->limit(0);
                $res = $cmd->queryAll();

                // $criteria = new CDbCriteria;
                // $criteria->select = $this->_picture_fields;
                // $criteria->addInCondition('pro_id', $pro_id);
                // $criteria->addCondition("is_del=0");
                // $res = Picture::model()->findAll($criteria);
                $picture_list = array();
                if ($res) {
                    foreach ($res as $k => $v) {
                        //$tem_arr = $v;
                        //$dir = floor($v['id']/1000);
                        //$tem_arr['src'] = IMAGE_DIR.$dir.$v['id'].'.'.$v['ext'];
                        $picture_list[$v['pro_id']][] = $v;//$tem_arr;
                    }

                    foreach ($pro_list as $key => $value) {
                        $img_id = $picture_list[$value['id']][0]['id'];
                        $img_ext = $picture_list[$value['id']][0]['ext'];
                        $dir = floor($picture_list[$value['id']][0]['id']/1000);
                        $pro_list[$key]['src'] = IMAGE_DIR.$dir.$img_id.'.'.$img_ext;
                    }
                }

                $total_pro_arr[$pro_class_id] = $pro_list;
            }

            //$total_pro_class_arr[$big_class_id] = $pro_class_id_arr;
            //$total_pro_arr[$big_class_id] = $class_pro_list;
        }

        $out['big_class_arr'] = $this->_big_class_arr;
        $out['total_pro_arr'] = $total_pro_arr;
        $out['pro_class_list'] = $pro_class_list;
        $out['parent_class_list'] = $parent_class_list;//非产品类信息
        $out['parent_class_arr'] = $this->_parent_class_arr;
        $out['pro_class_id_arr'] = $pro_class_id_arr;

        $this->css_name = 'index';
        $this->render('home', $out);
    }

    protected function getBrandInfo()
    {
        $criteria = new CDbCriteria;
        $criteria->select = $this->_brand_fields;
        $criteria->addCondition('is_del=0');
        $res = Brand::model()->findAll($criteria);

        $brand_list = array();
        if ($res) {
            $brand_id = array();
            foreach ($res as $value) {
                $brand_list[$value['id']]['id'] = $value['id'];
                $brand_list[$value['id']]['name'] = $value['name'];
                $brand_id[] = $value['id'];
            }

            $criteria->select = $this->_classify_brand_fields;
            $criteria->addInCondition('brand_id', $brand_id);
            $criteria->addCondition("is_del=0");
            $res = ClassifyBrandRel::model()->findAll($criteria);
            foreach ($res as $value) {
                $brand_list[$value['brand_id']]['classify_id'] = $value['product_classify_id'];
            }
        }

        return $brand_list;
    }

    protected function getClassInfo($is_pro_class)
    {
        $criteria = new CDbCriteria;
        $criteria->select = $this->_class_fields;
        $criteria->addCondition('is_del=0');
        $criteria->addCondition("is_pro_class={$is_pro_class}");
        $criteria->order = 'sort DESC';

        $res = ProductClassify::model()->findAll($criteria);

        $class_list = array();
        if ($res) {
            foreach ($res as $value) {
                $class_list[$value['id']]['id'] = $value['id'];
                $class_list[$value['id']]['name'] = $value['name'];
                $class_list[$value['id']]['parent_id'] = $value['parent_id'];
                if ($is_pro_class) {
                    $parent_id = $value['parent_id'];
                    $classify_id = $value['id'];
                } else {
                    $parent_id = $value['id'];
                    $classify_id = '';
                }
                $class_list[$value['id']]['url'] = sprintf($this->_list_url_tpl, $parent_id, $classify_id, '', '', '', 1);
            }
        }

        return $class_list;
    }

    protected function getPriceRangeInfo()
    {
        $criteria = new CDbCriteria;
        $criteria->select = $this->_price_range_fields;
        $criteria->addCondition('is_del=0');
        
        $res = PriceRange::model()->findAll($criteria);

        $price_list = array();
        if ($res) {
            foreach ($res as $value) {
                $price_list[$value['classify_id']][] = $value;
            }
        }

        return $price_list;
    }
}