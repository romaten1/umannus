<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\cafedra\models\Cafedra */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cafedra',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cafedras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cafedra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
