<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 22.06.2019
 * Time: 15:31
 */

namespace app\components;


use app\base\BaseComponent;
use app\models\Users;

class AuthComponent extends BaseComponent
{
    /**
     * @param null $params
     * @return Users
     */
    public function getModel($params = null)
    {
        $model = new Users();
        if ($params) {
            $model->load($params);
        }
        return $model;
    }

    /**
     * @param $model Users
     * @return bool
     */
    public function createUser(&$model):bool{
//        $model->setRgisterScenario();
        if(!$model->validate(['password','email'])){
            return false;
        }

        $model->password_hash=$this->generatePasswordHash($model->password);

        $model->auth_key=$this->generateAuthKey();

        if(!$model->save()){
            return false;
        }

        return true;
    }

    private function generateAuthKey(){
        return \Yii::$app->security->generateRandomString();
    }

    private function generatePasswordHash($password){
        return \Yii::$app->security->generatePasswordHash($password);
    }
}