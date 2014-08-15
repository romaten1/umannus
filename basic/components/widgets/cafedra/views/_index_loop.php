<?php
/**
 * Представление цикла последних постов.
 * @var yii\base\View $this Представление
 * @var common\modules\blogs\models\Post $models Массив моделей
 */


use yii\helpers\Html;

if ($models) {
	foreach ($models as $model) {
		echo '<p>'.Html::a(Html::encode('Кафедра '.$model->title), ['/cafedra/cafedra/view', 'id' => $model->id]).'</p>';
	}
}