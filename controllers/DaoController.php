<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 20.06.2019
 * Time: 22:16
 */

namespace app\controllers;


use app\base\BaseController;
use app\components\DaoComponent;

class DaoController extends BaseController
{
    public function actionIndex()
    {
        /** @var DaoComponent $comp */
        $comp = \Yii::createObject(['class' => DaoComponent::class]);

        $comp->insertsAndUpdates();

        $users = $comp->getAllUsers();

        $activityUser = $comp->getActivityUsers(\Yii::$app->request->get('user', 1));

        $user = $comp->getUser(\Yii::$app->request->get('user', 1));

        $cnt = $comp->getCountActivity();
        $reader = $comp->getReaderActivity();

        return $this->render('index', ['users' => $users,
            'acitvityUser' => $activityUser, 'user' => $user,
            'cnt' => $cnt, 'reader' => $reader]);
    }
}