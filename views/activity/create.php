<?php

/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 13.06.2019
 * Time: 21:32
 * @var $model \app\models\Activity
 */

/* @var $this \yii\web\View */

?>

<div class="row">
    <div class="col-md-6">
        <?php $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'Activity-create',
            'method' => 'POST'
        ]) ?>
        <?= $name ?>
        <br>
        <?= \Yii::getAlias('@app/files/file'); ?>
        <br>
        <?= \Yii::getAlias('@webroot'); ?>
        <br>
        <?= $form->field($model, 'title') ?>

        <?= $form->field($model, 'description')->textarea(['data-id' => '1']) ?>

        <?= $form->field($model, 'date_start')->input('date') ?>

        <?= $form->field($model, 'is_blocked')->checkbox() ?>

        <div class="form-group">
            <button type="submit">отправить</button>
        </div>


        <?php \yii\bootstrap\ActiveForm::end() ?>
    </div>
</div>
