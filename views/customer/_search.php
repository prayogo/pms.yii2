<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customerid') ?>

    <?= $form->field($model, 'company') ?>

    <?= $form->field($model, 'dayofjoin') ?>

    <?= $form->field($model, 'npwp') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'countryid') ?>

    <?php // echo $form->field($model, 'partnertypeid') ?>

    <?php // echo $form->field($model, 'webpage') ?>

    <?php // echo $form->field($model, 'datein') ?>

    <?php // echo $form->field($model, 'userin') ?>

    <?php // echo $form->field($model, 'dateup') ?>

    <?php // echo $form->field($model, 'userup') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
