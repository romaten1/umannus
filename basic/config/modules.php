<?php

return [
       /*'users' => [
            'class' => 'vova07\users\Module',
            'requireEmailConfirmation' => false, // By default is true. It mean that new user will need to confirm their email address.
            'robotEmail' => 'my@robot.email', // E-mail address from that will be sent all `users` emails.
            'robotName' => 'My Robot Name', // By default is `Yii::$app->name . ' robot'`.
            'activationWithin' => 86400, // The time before a sent activation token becomes invalid.
            'recoveryWithin' => 14400, // The time before a sent recovery token becomes invalid.
            'recordsPerPage' => 10, // Users pe page.
            'adminRoles' => ['superadmin', 'admin'], // User roles that can access backend module.
        ],*/
        'user' => [
            'class' => 'dektrium\user\Module',
            'allowUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],
       'cafedra' => [
            'class' => 'app\modules\cafedra\Module',
            'defaultRoute' => 'cafedra',
        ],
        'faculty' => [
            'class' => 'app\modules\faculty\Module',
            'defaultRoute' => 'faculty',
        ],
        'job' => [
            'class' => 'app\modules\job\Module',
            'defaultRoute' => 'job',
        ],
        'prepod' => [
            'class' => 'app\modules\prepod\Module',
            'defaultRoute' => 'prepod',
        ],
        'scienceStatus' => [
            'class' => 'app\modules\scienceStatus\Module',
            'defaultRoute' => 'science-status',
        ],
        'subject' => [
            'class' => 'app\modules\subject\Module',
            'defaultRoute' => 'subject',
        ],
        'comments' => [
            'class' => 'app\modules\comments\Module',
        ],
    ];
