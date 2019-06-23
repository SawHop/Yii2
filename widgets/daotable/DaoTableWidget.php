<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 23.06.2019
 * Time: 14:23
 */

namespace app\widgets\daotable;


use yii\bootstrap\Widget;

class DaoTableWidget extends Widget
{
    public $activities;

    public function run()
    {
        return $this->render('index',['data'=>$this->activities]);
    }
}