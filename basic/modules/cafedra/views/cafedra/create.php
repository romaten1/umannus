<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\cafedra\models\Cafedra */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Cafedra',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cafedras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cafedra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
