<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */

namespace fecshop\services\product;

use fecshop\services\Service;
use Yii;
use yii\base\InvalidValueException;

/**
 * Product Review Service
 * @author Terry Zhao <2358269014@qq.com>
 * @since 1.0
 */
class Menu extends Service
{
    public $filterByLang;
    protected $_reviewModelName = '\fecshop\models\mongodb\product\Menu';
    protected $_reviewModel;

    public function __construct()
    {
        list($this->_reviewModelName, $this->_reviewModel) = \Yii::mapGet($this->_reviewModelName);
    }


    public function getPrimaryKey()
    {
        return '_id';
    }


    /*
     * example filter:
     * [
     * 		'numPerPage' 	=> 20,
     * 		'pageNum'		=> 1,
     * 		'orderBy'	=> [$this->getPrimaryKey() => SORT_DESC, 'sku' => SORT_ASC ],
     * 		'where'			=> [
                ['>','price',1],
                ['<=','price',10]
     * 			['sku' => 'uk10001'],
     * 		],
     * 	'asArray' => true,
     * ]
     * 查看review 的列表
     */
    protected function actionList($filter)
    {
        $query = $this->_reviewModel->find();
        $query = Yii::$service->helper->ar->getCollByFilter($query, $filter);

        return [
            'coll' => $query->all(),
            'count' => $query->limit(null)->offset(null)->count(),
        ];
    }


    /**
     * @property $primaryKey | String 主键值
     * get artile model by primary key.
     */
    protected function actionGetByPrimaryKey($primaryKey)
    {
        if ($primaryKey) {
            return $this->_reviewModel->findOne($primaryKey);
        } else {
            return new $this->_reviewModelName();
        }
    }

    //保存
    protected function actionSave($one)
    {
        $currentDateTime = \fec\helpers\CDate::getCurrentDateTime();
        $primaryVal = isset($one[$this->getPrimaryKey()]) ? $one[$this->getPrimaryKey()] : '';

        if ($primaryVal) {
            $model = $this->_reviewModel->findOne($primaryVal);
            if (!$model) {
                Yii::$service->helper->errors->add('keywordsModel ' . $this->getPrimaryKey() . ' is not exist');

                return;
            }
        } else {
            $model = new $this->_reviewModelName();
            $primaryVal = new \MongoDB\BSON\ObjectId();
            $model->{$this->getPrimaryKey()} = $primaryVal;
            $one['created_at'] = time();
        }
        $one['updated_at'] = time();
        unset($one[$this->getPrimaryKey()]);
        $saveStatus = Yii::$service->helper->ar->save($model, $one);
        $model->save();

        return true;
    }

    public function actionGetMenuList($numPerPage = 10)
    {
        $filter = [
            'numPerPage' => $numPerPage,
            'orderBy'	=> ['sort_order' => SORT_ASC ],
        ];
        $keywordsColl = $this->list($filter);
        $keywords = $keywordsColl['coll'];

        return $keywords;
    }

    /**
     * @property $filter|array
     * get artile collection by $filter
     * example filter:
     * [
     *        'numPerPage'    => 20,
     *        'pageNum'        => 1,
     *        'orderBy'    => [$this->getPrimaryKey() => SORT_DESC, 'sku' => SORT_ASC ],
     * 'where'            => [
     * ['>','price',1],
     * ['<=','price',10]
     *            ['sku' => 'uk10001'],
     *        ],
     *    'asArray' => true,
     * ]
     */
    protected function actionColl($filter = '')
    {
        return $this->list($filter);
    }


    public function actionGetList($type, $numPerPage = 10)
    {
        $filter = [
            'numPerPage' => $numPerPage,
            'where' => [
                ['type' => (string)$type],
            ]
        ];
        $keywordsColl = $this->list($filter);
        $keywords = $keywordsColl['coll'];
        return $keywords;
    }

    //删除
    public function remove($ids)
    {
        if (empty($ids)) {
            Yii::$service->helper->errors->add('remove id is empty');

            return false;
        }
        if (is_array($ids)) {
            foreach ($ids as $id) {
                $model = $this->_reviewModel->findOne($id);
                if (isset($model[$this->getPrimaryKey()]) && !empty($model[$this->getPrimaryKey()])) {

                    $model->delete();
                } else {
                    Yii::$service->helper->errors->add("keywords Remove Errors:ID:$id is not exist.");

                    return false;
                }
            }
        } else {
            $id = $ids;
            $model = $this->_reviewModel->findOne($id);
            if (isset($model[$this->getPrimaryKey()]) && !empty($model[$this->getPrimaryKey()])) {

                $model->delete();
            } else {
                Yii::$service->helper->errors->add("keywords Remove Errors:ID:$id is not exist.");

                return false;
            }
        }

        return true;
    }


}
