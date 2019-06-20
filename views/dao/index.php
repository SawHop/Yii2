<?php
/**
 * Created by PhpStorm.
 * User: SawHo
 * Date: 20.06.2019
 * Time: 22:18
 */
?>
<div class="row">
    <div class="col-md-6">
        <pre>
            <?=print_r($users)?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?=print_r($acitvityUser)?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            <?=print_r($user);?>
        </pre>
    </div>
    <div class="col-md-6">
        <pre>
            Кол-во:<?=$cnt;?>
        </pre>
    </div>
    <div class="col-md-6">
        <?php foreach ($reader as $item):?>
            <?=\yii\helpers\ArrayHelper::getValue($item,'title');?>
        <?php endforeach;?>
    </div>
</div>