<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\prepod\models\Prepod */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Prepod',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Викладачі'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Оновити');
?>
<div class="prepod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
