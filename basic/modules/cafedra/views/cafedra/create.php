<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cafedra\models\Cafedra */

$this->title = Yii::t('app', 'Створити нову {modelClass}', [
    'modelClass' => 'кафедру',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Кафедри'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
