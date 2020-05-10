<?php

use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use app\models\LogVisit;

/** @var $this View */
/** @var LogVisit $logVisit */

$this->title = 'Log';
?>

<div class="site-log">
    <div class="container-fluid">
        <div class="row">
            <?php if (Yii::$app->session->hasFlash('log-success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <?= Yii::$app->session->getFlash('log-success') ?>
                </div>
            <?php endif; ?>
            <?php if (Yii::$app->session->hasFlash('log-error')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <?= Yii::$app->session->getFlash('log-error') ?>
                </div>
            <?php endif; ?>

            <div class="col-md-6">
                <div class="well">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'action' => ['site/get-max-visitors'],
                        'options' => [
                            'class' => 'form-horizontal'
                        ],
                    ]) ?>

                    <?= $form->field($logVisit, 'startDate')->widget(DateTimePicker::class, [
                        'options' => ['placeholder' => 'Enter start date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd hh:ii:ss',
                        ]
                    ])->label(false) ?>
                    <?= $form->field($logVisit, 'endDate')->widget(DateTimePicker::class, [
                        'options' => ['placeholder' => 'Enter end date ...'],
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd hh:ii:ss',
                        ]
                    ])->label(false) ?>

                    <?= Html::submitButton('<span class="glyphicon glyphicon-send"></span> Получить максимальное количество пользователей', ['class' => 'btn btn-primary']) ?>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
