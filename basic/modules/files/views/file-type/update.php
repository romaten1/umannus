<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\files\models\FileType */

$this->title = Yii::t('app', 'Оновити {modelClass}: ', [
    'modelClass' => 'типи файлів',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типи файлів'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Оновити');
?>
<div class="file-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
