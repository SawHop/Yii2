<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 13.06.2019
 * Time: 21:37
 */

namespace app\controllers\actions;


use app\components\ActivityComponent;
use app\models\Activity;
use yii\base\Action;

class ActivityCreateActions extends Action
{
    public $name;

    public function run()
    {
        /** @var ActivityComponent $comp */
        $comp = \Yii::$app->activity;
        $model = $comp->getModel();
        if (\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post());
            if ($comp->createActivity($model)) {

            }
//            if (!$model->validate()) {
//                print_r($model->getErrors());
//            }
        }


//        print_r($model->getAttributes());
//        exit();


        return $this->controller->render('create', ['model' => $model, 'name' => $this->name]);
    }
}