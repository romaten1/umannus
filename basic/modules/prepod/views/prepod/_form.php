<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\prepod\models\Prepod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prepod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cafedra_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'second_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'job_id')->textInput() ?>

    <?= $form->field($model, 'job_org_id')->textInput() ?>

    <?= $form->field($model, 'science_status_id')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'visited')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
