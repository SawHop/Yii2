<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 13.06.2019
 * Time: 21:27
 */

namespace app\controllers;


use app\base\BaseController;
use app\controllers\actions\ActivityCreateActions;

class ActivityController extends BaseController
{
   public function actions()
   {
       return [
           'create'=>['class'=>ActivityCreateActions::class, 'name'=>'Dimas'],
           'new'=>['class'=>ActivityCreateActions::class],
       ];
   }
}