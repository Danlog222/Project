<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this -> registerCssFile('@web/css/catalogView.css');

?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=Html::img("@web/img/{$model->img}", ['alt' => 'Наш логотип', 'class' => 'card-img-top']) ?>
</div>

<div class="trash">

    <?= (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ? 
    Html:: a('В корзину', ['/cart/add', 'id'=>$model->id], ['class' => 'btn btn-success']) : ''  )?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'year',
            'price',
            'model',
            'country',
            'count',
        ],
    ])
    ?>
    <?= Html::a('Вернуться назад',['index', 'id' => $id], ['class' => 'btn btn-primary']) ?>


