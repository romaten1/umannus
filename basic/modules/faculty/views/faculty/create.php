<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\faculty\models\Faculty */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Faculty',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faculties'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
