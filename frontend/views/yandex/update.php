<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Yandex */

$this->title = 'Update Yandex: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Yandexes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yandex-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
