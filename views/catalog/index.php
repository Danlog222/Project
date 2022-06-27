<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;
$this -> registerCssFile('@web/css/catalog.css');
?>
<div class="product-index" id = '1'>

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(['enablePushState' => false, 'timeout' => '5000','id'=> '1']); ?>
    <?php echo $this->render('_search', ['model' => $searchModel,'dataProvider' => $dataProvider,'query' => $query, ]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'layout' => '{pager}<div class="row">{items}</div>{pager}',
        'pager' => ['class' => \yii\bootstrap4\LinkPager::class],
        'itemView' => function ($model, $key, $index, $widget) {
            $sxte = "<div class=\"card \" style=\"width: 18rem\">" 
                        . Html::a(Html::img("@web/img/{$model->img}", ['alt' => 'Наш логотип', 'class' => 'card-img-top']) , ['view', 'id' => $model->id], ['class' => ''])                 
                        . "<div class=\"card-body\">" 
                        . "<h5 class=\"card-title\">" 
                        . Html::a(Html::encode($model->title), ['view', 'id' => $model->id], ['class' => 'tov-button']) 
                        . "</h5>" 
                        . "<p class=\"card-text\">Цена: $model->price руб.</p>" 
                        . "</div>" 
                        .(!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin ? 
                        Html:: a('В корзину', ['/cart/add', 'id'=>$model->id], ['class' => 'btn btn-success']) : ''  )
                        . "</div>"; 
            return  $sxte;
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
