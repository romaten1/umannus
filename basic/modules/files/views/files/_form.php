<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\files\models\FileType;
use app\modules\subject\models\Subject;
use yii\helpers\ArrayHelper;
use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model app\modules\files\models\Files */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="files-form">

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

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(FileType::find()->all(), 'id', 'title'))  ?>

    <?= $form->field($model, 'title_arkhive[]')->widget(FileInput::classname(), [
        'options'=>['multiple'=>'true'],
        'pluginOptions' => [
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => true,
            'browseLabel' => 'Відкрити',
            'removeLabel' => 'Видалити',
            'uploadLabel' => 'Завантажити',
        ]
    ]);?>

    

    <?= $form->field($model, 'subject')->dropDownList(ArrayHelper::map(Subject::find()->all(), 'id', 'title'))  ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Активно', '0' => 'Неактивно'])  ?>



   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Створити') : Yii::t('app', 'Оновити'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
