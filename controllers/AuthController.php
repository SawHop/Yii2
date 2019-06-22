<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 22.06.2019
 * Time: 15:30
 */

namespace app\controllers;


use app\base\BaseController;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionSignUp()
    {
        $model=\Yii::$app->auth->getModel();

        if(\Yii::$app->request->isPost){
            $model=\Yii::$app->auth->getModel(\Yii::$app->request->post());

            if(\Yii::$app->auth->createUser($model)){
                return $this->redirect(['/']);
            }
        }
        return $this->render('signup',['model'=>$model]);
    }
}