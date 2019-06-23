<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 22.06.2019
 * Time: 16:57
 */

namespace app\controllers;


use app\base\BaseController;

class RbacController extends BaseController
{
    public function actionGen(){
        \Yii::$app->rbac->generateRbac();
    }
}