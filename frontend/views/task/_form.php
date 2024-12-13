<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="task-form">

    <?php
    $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        ['waiting' => 'Waiting', 'in_dev' => 'In dev', 'close' => 'Close',],
        ['prompt' => '']
    ) ?>

    <?= $form->field($model, 'priority')->dropDownList(['low' => 'Low', 'medium' => 'Medium', 'high' => 'High',],
        ['prompt' => '']) ?>

    <?= $form->field($model, 'end_at')->widget(
        DateTimePicker::class,
        [
            'options' => ['placeholder' => 'Select operating time ...'],
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'yyyy-M-dd hh:i:i',
                'startDate' => date('Y-m-d H:i:s'),
                'todayHighlight' => true
            ]
        ]
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php
    ActiveForm::end(); ?>

</div>
