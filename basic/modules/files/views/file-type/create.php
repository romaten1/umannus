<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\files\models\FileType */

$this->title = Yii::t('app', 'Створити {modelClass}', [
    'modelClass' => 'тип файлів',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типи файлів'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
