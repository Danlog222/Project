<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';

?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Управление категориями', ['category-admin/index', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <!--  <?= Html::a('Управление товарами', ['admin/product-admin/'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'count',
            'id_user',
            'id_status',
            [
                'class' => ActionColumn::className(),

            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>