<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 13.06.2019
 * Time: 21:47
 */

namespace app\models;


use app\base\BaseModel;

class Activity extends BaseModel
{
    public $title;

    public $description;

    public $date_start;

    public $is_blocked;

    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'string', 'min' => 10],
            ['is_blocked', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название активности',
            'description' => 'Описание',
            'date_start' => 'Дата начала',
            'is_blocked' => 'Блок событие',
        ];
    }
}