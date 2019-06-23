<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 23.06.2019
 * Time: 14:35
 */

namespace app\models;


use yii\data\ActiveDataProvider;

class ActivitySearch extends Activity
{
    public function getDataProvider($params)
    {

        $model = new Activity();

        $query = $model::find();

        $this->load($params);

        $provoider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);


        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->with('user');

        return $provoider;

    }
}