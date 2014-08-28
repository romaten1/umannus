<?php
use yii\helpers\Html;
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'uploadPath' => Yii::$app->basePath . '/uploads/',
    'defaults' => [
    	'image' => [
    		'faculty' => Html::img('@umannus/uploads/defaults/unus.jpg'),
    		'cafedra' => Html::img('@umannus/uploads/defaults/unus.jpg'),
    		'prepod' => Html::img('@umannus/uploads/defaults/user.jpg'),
    	],
    	
    ],
];
