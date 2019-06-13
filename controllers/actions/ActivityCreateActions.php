<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 13.06.2019
 * Time: 21:37
 */

namespace app\ controllers\actions;


use app\models\Activity;
use yii\base\Action;

class ActivityCreateActions extends Action
{
    public $name;

    public function run()
    {
        $model = new Activity();

        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
        }

//        print_r($model->getAttributes());
//        exit();

//        if (!$model->validate()) {
//            print_r($model->getErrors());
//        }

        return $this->controller->render('create', ['model' => $model, 'name' => $this->name]);
    }
}