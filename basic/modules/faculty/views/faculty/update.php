<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\faculty\models\Faculty */

$this->title = Yii::t('app', 'Оновити {modelClass}: ', [
    'modelClass' => 'факультет',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Факультети'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Оновити');
?>
<div class="faculty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
