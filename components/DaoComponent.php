<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 20.06.2019
 * Time: 22:19
 */

namespace app\components;


use app\base\BaseComponent;
use yii\db\Query;
use yii\log\Logger;

class DaoComponent extends BaseComponent
{
    public function getDb()
    {
        return \Yii::$app->db;
    }

    /**
     * @throws \yii\db\Exception
     */
    public function getAllUsers()
    {
        $sql = 'select * from users';

        return $this->getDb()->createCommand($sql)->cache(10)->queryAll();
    }

    public function getActivityUsers($user_id)
    {
        $sql = 'select * from activity where user_id=:user';

        return $this->getDb()->createCommand($sql, [':user' => $user_id])->cache(10)->queryAll();
    }

    public function getUser($user)
    {
        $query = new Query();
        return $query->cache(10)->select('*')
            ->from('users')
            ->andWhere(['id' => $user])
            ->one();
    }

    public function getCountActivity()
    {
        $query = new Query();
        return $query->from('activity')->select('count(id) as cnt')->
        cache(10)->scalar();
    }

    public function getReaderActivity()
    {
        $query = new Query();
        return $query->from('activity')
            ->createCommand()->cache(10)->query();
    }

    public function insertsAndUpdates(){

        $this->getDb()->transaction(function (){
             $this->getDb()->createCommand()->insert('activity', ['title' => 'title',
                'date_start' => date('Y-m-d'), 'user_id' => 1])->execute();
             $this->getDb()->createCommand()->update('users', [
                'email' => mt_rand(1, 100) . '@test.ru'], ['id' => 1])->execute();

        });

//         $trans=$this->getDb()->beginTransaction();
//        try {
//            $this->getDb()->createCommand()->insert('activity', ['title' => 'title',
//                'date_start' => date('Y-m-d'), 'user_id' => 1])->execute();
//
//            //throw new \Exception('error test');
//            $this->getDb()->createCommand()->update('users', [
//                'email' => mt_rand(1, 100) . '@test.ru'], ['id' => 1])->execute();
//
//            $trans->commit();
//        }catch (\Exception $e){
//            \Yii::getLogger()->log($e->getMessage(),Logger::LEVEL_ERROR);
//            $trans->rollBack();
//        }
    }
}