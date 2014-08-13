<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\scienceStatus\models\ScienceStatus */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Science Status',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Science Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="science-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
