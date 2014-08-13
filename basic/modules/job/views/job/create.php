<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\job\models\Job */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Job',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jobs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
