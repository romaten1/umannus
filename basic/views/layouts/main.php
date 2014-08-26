<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Репозиторій робіт Уманського НУС',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Головна', 'url' => ['/site/index']],
                    ['label' => 'Про нас', 'url' => ['/site/about']],
                    ['label' => 'Контакти', 'url' => ['/site/contact']],
                    ['label' => 'Gii', 'url' => ['/gii']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Реєстрація', 'url' => ['/user/registration/register']] : 
                        ['label' => 'Профіль', 'url' => ['/user/settings/profile']] ,
                        
                    Yii::$app->user->isGuest ?
                        ['label' => 'Вхід', 'url' => ['/user/security/login']] :
                        ['label' => 'Вихід (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/user/security/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>
        <?php
            NavBar::begin([
                'options' => [
                    'class' => 'navbar-static-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => [
                    ['label' => 'Кафедри', 'url' => ['/cafedra']],
                    ['label' => 'Факультети', 'url' => ['/faculty']],
                    ['label' => 'Викладачі', 'url' => ['/prepod']],
                    ['label' => 'Предмети', 'url' => ['/subject']],
                    ['label' => 'Файли', 'url' => ['/files']],
                    !Yii::$app->user->isGuest ?
                        ['label' => 'Типи файлів', 'url' => ['/files/file-type']] : "",
                    !Yii::$app->user->isGuest ?
                        ['label' => 'Посади', 'url' => ['/job']] : "",
                    !Yii::$app->user->isGuest ?
                        ['label' => 'Наукові ступені', 'url' => ['/scienceStatus']] : "",
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => [
                    'label' => 'Головна',  // required
                    'url' => '/', ],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Репозиторій робіт Уманського НУС <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
