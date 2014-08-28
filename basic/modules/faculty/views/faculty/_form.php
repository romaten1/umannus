<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\modules\faculty\models\Faculty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faculty-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

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
            'browseLabel' => 'Відкрити',
            'removeLabel' => 'Видалити',
        ]
    ]);?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Створити') : Yii::t('app', 'Оновити'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
