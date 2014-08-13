<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\scienceStatus\models\ScienceStatus */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Science Status',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Science Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="science-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
