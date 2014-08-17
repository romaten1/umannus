<?php
namespace app\modules\comments\widgets\comments\assets;

use yii\web\AssetBundle;

/**
 * Менеджер ресурсов виджета комментариев [[Comments]].
 */
class CommentsAsset extends AssetBundle
{
	public $sourcePath = '@app/modules/comments/widgets/comments/assets';
	public $js = [
		'js/comments.js'
	];
	public $depends = [
	    'app\modules\comments\widgets\comments\assets\CommentsGuestAsset',
		'yii\web\JqueryAsset'
	];
}