<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\faculty\models\Faculty;
use app\modules\job\models\Job;
use app\modules\cafedra\models\Cafedra;
use app\modules\scienceStatus\models\ScienceStatus;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model app\modules\prepod\models\Prepod */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prepod-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'cafedra_id')->dropDownList(ArrayHelper::map(Cafedra::find()->all(), 'id', 'title'))  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'second_name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>
    <?php 
        echo $model->image_id ? Html::img($model->Imageurl) : '';
    ?>
    <?= $form->field($model, 'image_id')->widget(FileInput::classname(), [
        'options'=>['accept' => 'image/*'],
        'pluginOptions' => [
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'browseLabel' => 'Відкриити',
            'removeLabel' => 'Видалити',
        ]
    ]);?>

    <?= $form->field($model, 'job_id')->dropDownList(ArrayHelper::map(Job::find()->where(["type"=>Job::STATUS_JOB_WORK])->all(), 'id', 'title'))  ?>

    <?= $form->field($model, 'job_org_id')->dropDownList(ArrayHelper::map(Job::find()->where(["type"=>Job::STATUS_JOB_ORG])->all(), 'id', 'title'))  ?>

    <?= $form->field($model, 'science_status_id')->dropDownList(ArrayHelper::map(ScienceStatus::find()->all(), 'id', 'title'))  ?>
    
    <?= $form->field($model, 'active')->dropDownList(['1' => 'Активний', '0' => 'Неактивний'])  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Створити') : Yii::t('app', 'Оновити'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
