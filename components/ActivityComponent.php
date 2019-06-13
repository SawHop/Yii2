<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 14.06.2019
 * Time: 0:41
 */

namespace app\components;


use app\models\Activity;
use yii\base\Component;
use yii\db\Exception;

class ActivityComponent extends Component
{
    public $model_class;

    public function init()
    {
        parent::init();

        if(empty($this->model_class)){
            throw new Exception('Need model_class param');
        }
    }

    public function getModel()
    {
        return new $this->model_class;
    }

    public function createActivity(&$model): bool
    {
        $model->load(\Yii::$app->request->post());
        if (!$model->validate()) {
            //print_r($model->getErrors());
            return false;
        }
        return true;
    }
}