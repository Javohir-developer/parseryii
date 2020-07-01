<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Yandex */

$this->title = 'Create Yandex';
$this->params['breadcrumbs'][] = ['label' => 'Yandexes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yandex-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
